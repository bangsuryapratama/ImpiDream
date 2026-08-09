<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketplaceProductResource;
use App\Models\MarketplaceProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
     * Search and list active marketplace product references.
     */
    public function index(Request $request): JsonResponse
    {
        $query = MarketplaceProduct::where('is_active', true);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('product_name', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('provider')) {
            $query->where('marketplace_provider', strtolower($request->provider));
        }

        $products = $query->latest()->paginate(15);

        return response()->json([
            'status' => 'success',
            'data' => MarketplaceProductResource::collection($products),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    /**
     * Display a single marketplace product detail.
     */
    public function show(int $id): JsonResponse
    {
        $product = MarketplaceProduct::where('is_active', true)->find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk referensi tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new MarketplaceProductResource($product),
        ]);
    }
}
