<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RecordProgressApiRequest;
use App\Http\Requests\Api\V1\StoreDreamApiRequest;
use App\Http\Requests\Api\V1\UpdateDreamApiRequest;
use App\Http\Resources\DreamProgressResource;
use App\Http\Resources\DreamResource;
use App\Repositories\Contracts\DreamRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DreamController extends Controller
{
    public function __construct(
        protected DreamRepositoryInterface $dreamRepository
    ) {}

    /**
     * Display a listing of the user's dreams.
     */
    public function index(Request $request): JsonResponse
    {
        $dreams = $this->dreamRepository->getForUser(
            $request->user()->id,
            $request->only(['status', 'category'])
        );

        return response()->json([
            'status' => 'success',
            'data' => DreamResource::collection($dreams),
        ]);
    }

    /**
     * Store a newly created dream in storage.
     */
    public function store(StoreDreamApiRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['current_amount'] = $data['current_amount'] ?? 0;
        $data['status'] = 'active';

        $dream = $this->dreamRepository->create($data);
        $dream->load(['marketplaceProduct', 'wallets', 'progresses']);

        return response()->json([
            'status' => 'success',
            'message' => 'Rencana impian berhasil dibuat',
            'data' => new DreamResource($dream),
        ], 201);
    }

    /**
     * Display the specified dream with calculations.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $dream = $this->dreamRepository->findForUser($id, $request->user()->id);

        if (!$dream) {
            return response()->json([
                'status' => 'error',
                'message' => 'Impian tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new DreamResource($dream),
        ]);
    }

    /**
     * Update the specified dream.
     */
    public function update(UpdateDreamApiRequest $request, int $id): JsonResponse
    {
        $dream = $this->dreamRepository->findForUser($id, $request->user()->id);

        if (!$dream) {
            return response()->json([
                'status' => 'error',
                'message' => 'Impian tidak ditemukan',
            ], 404);
        }

        $updatedDream = $this->dreamRepository->update($dream, $request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Impian berhasil diperbarui',
            'data' => new DreamResource($updatedDream),
        ]);
    }

    /**
     * Remove the specified dream from storage.
     */
    public function destroy(Request $request, int $id): JsonResponse
    {
        $dream = $this->dreamRepository->findForUser($id, $request->user()->id);

        if (!$dream) {
            return response()->json([
                'status' => 'error',
                'message' => 'Impian tidak ditemukan',
            ], 404);
        }

        $this->dreamRepository->delete($dream);

        return response()->json([
            'status' => 'success',
            'message' => 'Impian berhasil dihapus',
        ]);
    }

    /**
     * Record progress top-up towards a dream.
     */
    public function recordProgress(RecordProgressApiRequest $request, int $id): JsonResponse
    {
        $dream = $this->dreamRepository->findForUser($id, $request->user()->id);

        if (!$dream) {
            return response()->json([
                'status' => 'error',
                'message' => 'Impian tidak ditemukan',
            ], 404);
        }

        $validated = $request->validated();
        $amount = (float) $validated['amount'];

        // Record Progress
        $progress = $dream->progresses()->create([
            'wallet_id' => $validated['wallet_id'] ?? null,
            'amount' => $amount,
            'note' => $validated['note'] ?? 'Setoran tabungan impian',
            'recorded_at' => now(),
        ]);

        // Increment current amount
        $newCurrentAmount = (float) $dream->current_amount + $amount;
        $status = $newCurrentAmount >= (float) $dream->target_amount ? 'completed' : $dream->status;

        $updatedDream = $this->dreamRepository->update($dream, [
            'current_amount' => $newCurrentAmount,
            'status' => $status,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Setoran tabungan berhasil dicatat',
            'data' => [
                'progress' => new DreamProgressResource($progress),
                'dream' => new DreamResource($updatedDream),
            ],
        ]);
    }
}
