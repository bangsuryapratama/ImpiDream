<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard') — ImpiDream Enterprise Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="preload" as="image" type="image/webp" href="{{ asset('assets/logo.webp') }}">
    <link rel="icon" type="image/webp" href="{{ asset('assets/favicon.webp') }}">
    <meta name="theme-color" content="#0F172A">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #F8FAFC;
            color: #0F172A;
            -webkit-font-smoothing: antialiased;
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Toast Slide-in Animation */
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .toast-animate {
            animation: slideInRight 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col lg:flex-row antialiased selection:bg-[#2E7D64] selection:text-white">

    {{-- Floating Enterprise Toast Container (Top Right) --}}
    <div id="toast-container" class="fixed top-5 right-5 z-50 flex flex-col gap-3 max-w-sm w-full pointer-events-none px-4 sm:px-0">
        
        @if (session('success'))
            <div id="toast-success" class="pointer-events-auto toast-animate bg-white border border-emerald-200 rounded-2xl p-4 shadow-xl flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-[#2E7D64] flex items-center justify-center flex-shrink-0 font-bold">
                    ✓
                </div>
                <div class="flex-1 pr-2">
                    <div class="text-xs font-bold text-slate-900">Operasi Berhasil</div>
                    <div class="text-xs text-slate-600 mt-0.5">{{ session('success') }}</div>
                </div>
                <button onclick="dismissToast('toast-success')" class="text-slate-400 hover:text-slate-600 text-xs font-bold p-1">✕</button>
            </div>
        @endif

        @if (session('error'))
            <div id="toast-error" class="pointer-events-auto toast-animate bg-white border border-red-200 rounded-2xl p-4 shadow-xl flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 font-bold">
                    ⚠️
                </div>
                <div class="flex-1 pr-2">
                    <div class="text-xs font-bold text-slate-900">Peringatan Sistem</div>
                    <div class="text-xs text-slate-600 mt-0.5">{{ session('error') }}</div>
                </div>
                <button onclick="dismissToast('toast-error')" class="text-slate-400 hover:text-slate-600 text-xs font-bold p-1">✕</button>
            </div>
        @endif

        @if (session('info'))
            <div id="toast-info" class="pointer-events-auto toast-animate bg-white border border-blue-200 rounded-2xl p-4 shadow-xl flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0 font-bold">
                    ℹ️
                </div>
                <div class="flex-1 pr-2">
                    <div class="text-xs font-bold text-slate-900">Informasi</div>
                    <div class="text-xs text-slate-600 mt-0.5">{{ session('info') }}</div>
                </div>
                <button onclick="dismissToast('toast-info')" class="text-slate-400 hover:text-slate-600 text-xs font-bold p-1">✕</button>
            </div>
        @endif

    </div>

    {{-- Corporate Sidebar --}}
    <aside class="hidden lg:flex w-64 bg-slate-900 text-white flex-col fixed inset-y-0 z-40">
        
        {{-- Brand Header --}}
        <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-800">
            <div class="bg-white p-1.5 rounded-xl flex items-center justify-center">
                <img src="{{ asset('assets/logo.webp') }}" alt="ImpiDream" width="24" height="24" class="h-6 w-auto object-contain" />
            </div>
            <div class="flex flex-col">
                <span class="font-extrabold text-sm tracking-tight text-white">ImpiDream</span>
                <span class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest">Enterprise Console</span>
            </div>
        </div>

        {{-- Navigation Menu --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <div class="px-3 pb-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Ikhtisar Platform</div>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#2E7D64] text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <span>Dashboard Utama</span>
            </a>

            <div class="px-3 pt-4 pb-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Manajemen Sistem</div>

            <a href="{{ route('admin.marketplace.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-bold transition-all {{ request()->routeIs('admin.marketplace.*') ? 'bg-[#2E7D64] text-white shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <svg class="w-4 h-4 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span>Produk Marketplace</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition-all">
                <svg class="w-4 h-4 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span>Kelola User App</span>
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition-all">
                <svg class="w-4 h-4 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <span>Monitoring Dream</span>
            </a>
        </nav>

        {{-- User Footer --}}
        <div class="p-4 border-t border-slate-800 space-y-3">
            <div class="flex items-center gap-3 px-2">
                <div class="w-8 h-8 rounded-full bg-[#2E7D64] text-white flex items-center justify-center text-xs font-bold">
                    A
                </div>
                <div class="flex flex-col truncate">
                    <span class="text-xs font-bold text-white truncate">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</span>
                    <span class="text-[10px] text-slate-400">admin@impidream.id</span>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white rounded-xl text-xs font-semibold transition-all">
                    <svg class="w-3.5 h-3.5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar Sesi</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Area --}}
    <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">

        {{-- Header Bar --}}
        <header class="h-16 bg-white border-b border-slate-200 sticky top-0 z-30 px-4 sm:px-8 flex items-center justify-between glass-header">
            <div class="flex items-center gap-3">
                <button id="admin-mobile-toggle" aria-label="Buka Sidebar" class="lg:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                
                {{-- Breadcrumb --}}
                <div class="flex items-center gap-2 text-xs text-slate-500 font-medium">
                    <span>Console</span>
                    <span>/</span>
                    <span class="font-bold text-slate-900">@yield('title', 'Dashboard')</span>
                </div>
            </div>

            {{-- System Status Badge --}}
            <div class="flex items-center gap-3">
                <div class="hidden sm:flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Normal</span>
                </div>
            </div>
        </header>

        {{-- Mobile Drawer Overlay --}}
        <div id="admin-mobile-drawer" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden lg:hidden">
            <div class="w-64 bg-slate-900 text-white h-full flex flex-col p-4 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                    <span class="font-bold text-sm text-white">Menu Administrator</span>
                    <button id="admin-mobile-close" class="p-1 rounded-lg text-slate-400 hover:text-white">✕</button>
                </div>
                <nav class="space-y-1.5 flex-1 text-xs">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2.5 rounded-xl font-bold bg-[#2E7D64] text-white">Dashboard Utama</a>
                    <a href="#" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-300 hover:bg-slate-800">Produk Marketplace</a>
                    <a href="#" class="block px-3 py-2.5 rounded-xl font-semibold text-slate-300 hover:bg-slate-800">Kelola User App</a>
                </nav>
                <form method="POST" action="{{ route('admin.logout') }}" class="pt-3 border-t border-slate-800">
                    @csrf
                    <button type="submit" class="w-full text-center py-2.5 bg-slate-800 text-red-400 rounded-xl text-xs font-bold">Keluar</button>
                </form>
            </div>
        </div>

        {{-- Content Area --}}
        <main class="flex-1 p-4 sm:p-8 space-y-6">
            @yield('content')
        </main>

        {{-- Corporate Footer --}}
        <footer class="px-8 py-4 bg-white border-t border-slate-200 text-center text-xs text-slate-500 font-medium">
            &copy; {{ date('Y') }} ImpiDream Corporate Platform. Terenkripsi & Terlindungi.
        </footer>

    </div>

    {{-- JS Utilities --}}
    <script>
        function dismissToast(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Auto dismiss toast after 5 seconds
            setTimeout(function() {
                ['toast-success', 'toast-error', 'toast-info'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.remove();
                });
            }, 5000);

            // Mobile Drawer Toggle
            const toggle = document.getElementById('admin-mobile-toggle');
            const close = document.getElementById('admin-mobile-close');
            const drawer = document.getElementById('admin-mobile-drawer');

            if (toggle && drawer) toggle.addEventListener('click', () => drawer.classList.remove('hidden'));
            if (close && drawer) close.addEventListener('click', () => drawer.classList.add('hidden'));
        });
    </script>

</body>
</html>
