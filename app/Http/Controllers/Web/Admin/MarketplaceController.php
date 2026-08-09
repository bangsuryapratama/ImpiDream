<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceProduct;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = MarketplaceProduct::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('product_name', 'like', "%{$search}%");
        }

        if ($request->filled('provider')) {
            $query->where('marketplace_provider', strtolower($request->provider));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->paginate(10);

        return view('admin.marketplace.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:150',
            'category' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'marketplace_provider' => 'required|in:tokopedia,shopee,blibli,lazada,tiktokshop',
            'product_url' => 'required|url|max:500',
        ]);

        MarketplaceProduct::create([
            'product_name' => $request->product_name,
            'category' => $request->category,
            'price' => $request->price,
            'marketplace_provider' => $request->marketplace_provider,
            'product_url' => $request->product_url,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Produk referensi marketplace berhasil ditambahkan!');
    }

    public function toggleStatus($id)
    {
        $product = MarketplaceProduct::findOrFail($id);
        $product->is_active = !$product->is_active;
        $product->save();

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = MarketplaceProduct::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk referensi marketplace berhasil dihapus!');
    }
}
