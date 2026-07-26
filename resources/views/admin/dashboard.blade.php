@extends('admin.layouts.app')

@section('title', 'Dashboard Utama')

@section('content')

    {{-- Header Banner --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Ringkasan Operasional</h2>
            <p class="text-xs text-slate-500 font-medium mt-0.5">Metrik performa dan aktivitas platform ImpiDream terkini.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs text-slate-500 font-medium">Terakhir diperbarui: {{ date('H:i') }} WIB</span>
        </div>
    </div>
    
    {{-- Metric Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        {{-- Total Users --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3 shadow-sm hover:border-slate-300 transition-all">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Total User App</span>
                <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($stats['total_users']) }}</div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+100% Aktif</span>
            </div>
            <div class="text-[11px] text-slate-500 font-medium">Pengguna terverifikasi</div>
        </div>

        {{-- Total Dreams --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3 shadow-sm hover:border-slate-300 transition-all">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Total Dream</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-50 text-[#2E7D64] flex items-center justify-center font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($stats['total_dreams']) }}</div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">{{ $stats['active_dreams'] }} Aktif</span>
            </div>
            <div class="text-[11px] text-slate-500 font-medium">{{ $stats['completed_dreams'] }} impian telah berhasil dicapai</div>
        </div>

        {{-- Marketplace Products --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3 shadow-sm hover:border-slate-300 transition-all">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Produk Referensi</span>
                <div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($stats['total_products']) }}</div>
                @if($stats['outdated_products'] > 0)
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">{{ $stats['outdated_products'] }} Outdated</span>
                @else
                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Up to date</span>
                @endif
            </div>
            <div class="text-[11px] text-slate-500 font-medium">Katalog harga marketplace</div>
        </div>

        {{-- Security Status --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3 shadow-sm hover:border-slate-300 transition-all">
            <div class="flex items-center justify-between text-slate-500">
                <span class="text-xs font-bold uppercase tracking-wider">Status Keamanan</span>
                <div class="w-8 h-8 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-xl font-extrabold text-[#2E7D64]">Encrypted</div>
                <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Secure</span>
            </div>
            <div class="text-[11px] text-slate-500 font-medium">Session Guard: <code class="text-slate-900 font-bold">admin</code></div>
        </div>

    </div>

    {{-- Corporate Data Tables --}}
    <div class="grid lg:grid-cols-2 gap-6 pt-2">

        {{-- Registered Users Table --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="font-bold text-sm text-slate-900">User Terdaftar Terbaru</h3>
                    <p class="text-[11px] text-slate-500 font-medium">Aktivitas pendaftaran pengguna terbaru</p>
                </div>
                <span class="text-[10px] font-bold text-[#2E7D64] bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">User Log</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead class="text-[10px] font-bold text-slate-400 uppercase bg-slate-50 border-y border-slate-100">
                        <tr>
                            <th class="px-4 py-3">Nama User</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentUsers as $user)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-4 py-3.5 font-bold text-slate-900 flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                    <span>{{ $user->name }}</span>
                                </td>
                                <td class="px-4 py-3.5 text-slate-600 font-medium">{{ $user->email }}</td>
                                <td class="px-4 py-3.5 text-slate-400 font-medium">{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-slate-400 font-medium">Belum ada data user terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Dreams Created Table --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="font-bold text-sm text-slate-900">Dream Dibuat Terbaru</h3>
                    <p class="text-[11px] text-slate-500 font-medium">Aktivitas pembuatan impian oleh pengguna</p>
                </div>
                <span class="text-[10px] font-bold text-[#2E7D64] bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">Dream Log</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead class="text-[10px] font-bold text-slate-400 uppercase bg-slate-50 border-y border-slate-100">
                        <tr>
                            <th class="px-4 py-3">Nama Impian</th>
                            <th class="px-4 py-3">Target Nominal</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentDreams as $dream)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-4 py-3.5 font-bold text-slate-900">{{ $dream->name }}</td>
                                <td class="px-4 py-3.5 text-[#2E7D64] font-extrabold">Rp {{ number_format($dream->target_amount, 0, ',', '.') }}</td>
                                <td class="px-4 py-3.5">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $dream->status === 'active' ? 'bg-emerald-100 text-[#2E7D64]' : 'bg-slate-100 text-slate-600' }}">
                                        {{ $dream->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-slate-400 font-medium">Belum ada data Dream dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
