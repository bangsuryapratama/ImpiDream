<?php

namespace App\Repositories\Eloquent;

use App\Models\Dream;
use App\Repositories\Contracts\DreamRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DreamRepository implements DreamRepositoryInterface
{
    public function getForUser(int $userId, array $filters = []): Collection
    {
        $query = Dream::where('user_id', $userId)
            ->with(['marketplaceProduct', 'wallets', 'progresses']);

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        return $query->latest()->get();
    }

    public function getPaginatedForUser(int $userId, int $perPage = 15): LengthAwarePaginator
    {
        return Dream::where('user_id', $userId)
            ->with(['marketplaceProduct', 'wallets', 'progresses'])
            ->latest()
            ->paginate($perPage);
    }

    public function findForUser(int $id, int $userId): ?Dream
    {
        return Dream::where('id', $id)
            ->where('user_id', $userId)
            ->with(['marketplaceProduct', 'wallets', 'progresses' => function ($q) {
                $q->latest()->take(10);
            }])
            ->first();
    }

    public function create(array $data): Dream
    {
        return Dream::create($data);
    }

    public function update(Dream $dream, array $data): Dream
    {
        $dream->update($data);
        return $dream->fresh(['marketplaceProduct', 'wallets', 'progresses']);
    }

    public function delete(Dream $dream): bool
    {
        return (bool) $dream->delete();
    }
}
