@extends('admin.layouts.app')

@section('title', 'Kelola Katalog Marketplace')

@section('content')

{{-- Header Banner --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Katalog Produk Marketplace</h2>
        <p class="text-xs text-slate-500 font-medium mt-0.5">Kelola data referensi produk Tokopedia, Shopee, & Lazada untuk pengguna ImpiDream.</p>
    </div>
    <div>
        <button onclick="document.getElementById('addModal').classList.remove('hidden')" class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#2E7D64] hover:bg-[#1B5E4B] text-white font-bold text-xs rounded-xl shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Produk Baru</span>
        </button>
    </div>
</div>

{{-- Flash Message --}}
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold px-4 py-3 rounded-xl flex items-center justify-between">
    <span>{{ session('success') }}</span>
    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">&times;</button>
</div>
@endif

{{-- Search & Filter Bar --}}
<div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
    <form method="GET" action="{{ route('admin.marketplace.index') }}" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..." class="flex-1 px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
        
        <select name="provider" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
            <option value="">Semua Provider</option>
            <option value="tokopedia" {{ request('provider') == 'tokopedia' ? 'selected' : '' }}>Tokopedia</option>
            <option value="shopee" {{ request('provider') == 'shopee' ? 'selected' : '' }}>Shopee</option>
            <option value="lazada" {{ request('provider') == 'lazada' ? 'selected' : '' }}>Lazada</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all">
            Cari
        </button>
    </form>
</div>

{{-- Products Table --}}
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                    <th class="pb-3">Produk</th>
                    <th class="pb-3">Provider</th>
                    <th class="pb-3">Kategori</th>
                    <th class="pb-3">Harga (Rp)</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @forelse($products as $product)
                <tr class="hover:bg-slate-50/50">
                    <td class="py-3.5 font-bold text-slate-900 max-w-xs truncate">
                        {{ $product->product_name }}
                    </td>
                    <td class="py-3.5">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700 border border-slate-200 uppercase">
                            {{ $product->marketplace_provider }}
                        </span>
                    </td>
                    <td class="py-3.5 text-slate-500">{{ $product->category }}</td>
                    <td class="py-3.5 font-bold text-[#2E7D64]">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>
                    <td class="py-3.5">
                        <form method="POST" action="{{ route('admin.marketplace.toggle', $product->id) }}">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $product->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="py-3.5 text-right space-x-2">
                        <a href="{{ $product->product_url }}" target="_blank" class="text-blue-600 hover:underline font-bold text-[11px]">Buka Link</a>
                        <form method="POST" action="{{ route('admin.marketplace.destroy', $product->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:underline font-bold text-[11px]">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-slate-400 font-medium">Belum ada data produk referensi marketplace.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="pt-2">
        {{ $products->links() }}
    </div>
</div>

{{-- Add Product Modal --}}
<div id="addModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-6 max-w-md w-full shadow-2xl space-y-5 border border-slate-100">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <h3 class="font-bold text-slate-900 text-sm">Tambah Produk Marketplace Baru</h3>
            <button onclick="document.getElementById('addModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 font-bold">&times;</button>
        </div>

        <form method="POST" action="{{ route('admin.marketplace.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Produk</label>
                <input type="text" name="product_name" required placeholder="Contoh: MacBook Air M2 256GB" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Harga (Rp)</label>
                <input type="number" name="price" required placeholder="16000000" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Provider</label>
                    <select name="marketplace_provider" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
                        <option value="tokopedia">Tokopedia</option>
                        <option value="shopee">Shopee</option>
                        <option value="lazada">Lazada</option>
                        <option value="blibli">Blibli</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Kategori</label>
                    <select name="category" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
                        <option value="Elektronik">Elektronik</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Travel & Liburan">Travel & Liburan</option>
                        <option value="Life Milestone">Life Milestone</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">URL Produk Marketplace</label>
                <input type="url" name="product_url" required placeholder="https://tokopedia.com/..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
            </div>

            <div class="pt-3 flex justify-end gap-2">
                <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl">Batal</button>
                <button type="submit" class="px-4 py-2 bg-[#2E7D64] hover:bg-[#1B5E4B] text-white font-bold text-xs rounded-xl shadow-sm">Simpan Produk</button>
            </div>
        </form>
    </div>
</div>

@endsection
