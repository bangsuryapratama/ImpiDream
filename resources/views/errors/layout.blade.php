<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') — ImpiDream</title>
    <meta name="robots" content="noindex, follow">

    <link rel="icon" type="image/webp" href="{{ asset('assets/favicon.webp') }}">
    <meta name="theme-color" content="#2E7D64">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-pattern {
            background-image: radial-gradient(#CBD5E1 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>
</head>

<body class="selection:bg-[#2E7D64] selection:text-white bg-[#FAFAF8] text-slate-900 font-sans min-h-screen flex flex-col justify-between hero-pattern">

    {{-- Minimal Header --}}
    <header class="w-full py-6 px-6 max-w-7xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('assets/logo.webp') }}" alt="ImpiDream" width="36" height="36" class="h-9 w-auto object-contain" />
            <span class="font-heading font-extrabold text-xl tracking-tight text-slate-900">ImpiDream</span>
        </a>
        <a href="{{ route('home') }}" class="text-xs font-bold text-slate-600 hover:text-[#2E7D64] transition-colors">
            &larr; Kembali ke Beranda
        </a>
    </header>

    {{-- Error Content --}}
    <main class="flex-1 flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 shadow-sm text-center space-y-6">
            <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-[#2E7D64] font-heading font-extrabold text-2xl flex items-center justify-center mx-auto">
                @yield('code')
            </div>

            <div class="space-y-2">
                <h1 class="font-heading font-extrabold text-2xl text-slate-900">@yield('heading')</h1>
                <p class="text-sm text-slate-600 leading-relaxed">@yield('message')</p>
            </div>

            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('home') }}" class="w-full sm:w-auto px-6 py-3 bg-[#2E7D64] hover:bg-[#1B5E4B] text-white text-xs font-bold rounded-xl transition-all shadow-sm">
                    Ke Beranda Utama
                </a>
                <a href="{{ route('about') }}" class="w-full sm:w-auto px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl transition-all">
                    Tentang Kami
                </a>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="py-6 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} ImpiDream. All rights reserved.
    </footer>

</body>
</html>
