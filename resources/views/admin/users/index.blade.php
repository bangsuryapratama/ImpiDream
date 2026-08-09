@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna Aplikasi')

@section('content')

{{-- Header Banner --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
    <div>
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Manajemen Pengguna App</h2>
        <p class="text-xs text-slate-500 font-medium mt-0.5">Daftar pengguna terdaftar di platform ImpiDream dan status aktivitasnya.</p>
    </div>
</div>

{{-- Search Bar --}}
<div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
    <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email pengguna..." class="flex-1 px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-900 outline-none focus:border-[#2E7D64]">
        <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all">
            Cari Pengguna
        </button>
    </form>
</div>

{{-- Users Table --}}
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="border-b border-slate-100 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                    <th class="pb-3">Pengguna</th>
                    <th class="pb-3">Email</th>
                    <th class="pb-3">Total Dream</th>
                    <th class="pb-3">Terdaftar</th>
                    <th class="pb-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                @forelse($users as $user)
                <tr class="hover:bg-slate-50/50">
                    <td class="py-3.5 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#2E7D64]/10 text-[#2E7D64] font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <span class="font-bold text-slate-900">{{ $user->name }}</span>
                    </td>
                    <td class="py-3.5 text-slate-600">{{ $user->email }}</td>
                    <td class="py-3.5">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-[#2E7D64] border border-emerald-100">
                            {{ $user->dreams_count }} Impian
                        </span>
                    </td>
                    <td class="py-3.5 text-slate-500">{{ $user->created_at->format('d M Y, H:i') }}</td>
                    <td class="py-3.5 text-right">
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:underline font-bold text-[11px]">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-slate-400 font-medium">Belum ada data pengguna terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    <div class="pt-2">
        {{ $users->links() }}
    </div>
</div>

@endsection
