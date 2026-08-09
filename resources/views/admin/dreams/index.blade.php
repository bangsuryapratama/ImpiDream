@extends('admin.layouts.app')

@section('title', 'Monitoring Rencana Impian')

@section('content')

{{-- Header Banner --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Monitoring Rencana Impian</h2>
        <p class="text-xs text-slate-500 font-medium mt-0.5">Pantau seluruh rencana impian pengguna dan tingkat pencapaiannya.</p>
    </div>
</div>

{{-- Filter Bar --}}
<div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
    <form method="GET" action="{{ route('admin.dreams.index') }}" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama impian atau pemilik..." class="flex-1 px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
        
        <select name="status" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
            <option value="">Semua Status</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Sedang Dikejar (Aktif)</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Tercapai (Completed)</option>
            <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all">
            Filter Data
        </button>
    </form>
</div>

{{-- Dreams Table --}}
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                    <th class="pb-3">Impian</th>
                    <th class="pb-3">Pemilik</th>
                    <th class="pb-3">Kategori</th>
                    <th class="pb-3">Target Rp</th>
                    <th class="pb-3">Progres %</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @forelse($dreams as $dream)
                @php
                    $percentage = $dream->target_amount > 0 ? min(100, round(($dream->current_amount / $dream->target_amount) * 100)) : 0;
                @endphp
                <tr class="hover:bg-slate-50/50">
                    <td class="py-3.5 font-bold text-slate-900 max-w-xs truncate">
                        {{ $dream->name }}
                    </td>
                    <td class="py-3.5 text-slate-600">{{ $dream->user->name ?? 'User' }}</td>
                    <td class="py-3.5 text-slate-500">{{ $dream->category }}</td>
                    <td class="py-3.5 font-bold text-[#2E7D64]">
                        Rp {{ number_format($dream->target_amount, 0, ',', '.') }}
                    </td>
                    <td class="py-3.5">
                        <div class="flex items-center gap-2">
                            <div class="w-16 bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div class="bg-[#2E7D64] h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <span class="font-bold text-[11px] text-slate-800">{{ $percentage }}%</span>
                        </div>
                    </td>
                    <td class="py-3.5">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $dream->status == 'completed' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : ($dream->status == 'overdue' ? 'bg-rose-50 text-rose-700 border border-rose-200' : 'bg-blue-50 text-blue-700 border border-blue-200') }}">
                            {{ strtoupper($dream->status) }}
                        </span>
                    </td>
                    <td class="py-3.5 text-right">
                        <form method="POST" action="{{ route('admin.dreams.destroy', $dream->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus rencana impian ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:underline font-bold text-[11px]">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-slate-400 font-medium">Belum ada rencana impian yang tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="pt-2">
        {{ $dreams->links() }}
    </div>
</div>

@endsection
