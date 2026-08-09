<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ImpiDream — Ubah Impian Jadi Rencana Menabung Terukur')</title>
    <meta name="description" content="@yield('meta_description', 'Platform Perencanaan Impian Finansial #1 di Indonesia. Hitung alokasi tabungan harian, lacak progres impian, dan capai targetmu secara terstruktur.')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    {{-- Instant Zero-Flicker Theme & Language Initialization Script --}}
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && systemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            window.initialAppLang = localStorage.getItem('lang') || 'id';
        })();
    </script>

    {{-- Preload Brand Assets --}}
    <link rel="preload" as="image" type="image/webp" href="{{ asset('assets/logo.webp') }}" fetchpriority="high">
    <link rel="icon" type="image/webp" href="{{ asset('assets/favicon.webp') }}">
    <meta name="theme-color" content="#2E7D64">

    @yield('extra_seo')

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .hero-pattern {
            background-image: radial-gradient(#CBD5E1 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .dark .hero-pattern {
            background-image: radial-gradient(#1E293B 1px, transparent 1px);
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .dark .glass-header {
            background: rgba(9, 13, 22, 0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .device-container {
            position: relative;
            width: 100%;
            max-width: 290px;
            aspect-ratio: 9 / 19;
            background: #090D16;
            border-radius: 44px;
            padding: 8px;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25), 0 0 30px rgba(46, 125, 100, 0.12);
            margin: 0 auto;
            contain-intrinsic-size: 290px 612px;
        }

        @media (min-width: 640px) {
            .device-container {
                max-width: 320px;
                border-radius: 48px;
                padding: 10px;
                contain-intrinsic-size: 320px 675px;
            }
        }

        .device-screen {
            position: relative;
            width: 100%;
            height: 100%;
            background: #FAFAF8;
            border-radius: 36px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .device-island {
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 18px;
            background: #000;
            border-radius: 20px;
            z-index: 50;
        }
    </style>
</head>
<body class="selection:bg-[#2E7D64] selection:text-white bg-[#FAFAF8] dark:bg-[#090D16] text-slate-900 dark:text-slate-100 font-sans antialiased min-h-screen flex flex-col justify-between transition-colors duration-200">

    {{-- Unified Corporate Header --}}
    <header class="fixed top-0 w-full z-50 glass-header border-b border-slate-200 dark:border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                {{-- Brand Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo.webp') }}" alt="ImpiDream" width="36" height="36" decoding="sync" fetchpriority="high" class="h-9 w-auto rounded-xl object-contain flex-shrink-0" />
                    <div class="flex flex-col">
                        <span class="font-heading font-extrabold text-xl tracking-tight text-slate-900 dark:text-white">ImpiDream</span>
                        <span class="text-[10px] font-bold text-[#2E7D64] uppercase tracking-wider -mt-1">Dream Platform</span>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('features') }}" class="text-sm font-semibold {{ request()->routeIs('features') ? 'text-[#2E7D64] dark:text-[#6FBF9A] font-bold' : 'text-slate-600 dark:text-slate-300 hover:text-[#2E7D64] dark:hover:text-[#6FBF9A]' }} transition-colors" data-i18n="nav_features">Fitur</a>
                    <a href="{{ route('calculator') }}" class="text-sm font-semibold {{ request()->routeIs('calculator') ? 'text-[#2E7D64] dark:text-[#6FBF9A] font-bold' : 'text-slate-600 dark:text-slate-300 hover:text-[#2E7D64] dark:hover:text-[#6FBF9A]' }} transition-colors" data-i18n="nav_calc">Kalkulator</a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold {{ request()->routeIs('about') ? 'text-[#2E7D64] dark:text-[#6FBF9A] font-bold' : 'text-slate-600 dark:text-slate-300 hover:text-[#2E7D64] dark:hover:text-[#6FBF9A]' }} transition-colors" data-i18n="nav_about">Tentang Kami</a>
                    <a href="{{ route('news.index') }}" class="text-sm font-semibold {{ request()->routeIs('news.*') ? 'text-[#2E7D64] dark:text-[#6FBF9A] font-bold' : 'text-slate-600 dark:text-slate-300 hover:text-[#2E7D64] dark:hover:text-[#6FBF9A]' }} transition-colors" data-i18n="nav_news">Berita</a>
                    <a href="{{ route('home') }}#faq" class="text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-[#2E7D64] dark:hover:text-[#6FBF9A]' }} transition-colors" data-i18n="nav_faq">FAQ</a>
                </nav>

                {{-- Right Actions: Language Switcher + Theme Toggle + CTA --}}
                <div class="flex items-center gap-3">
                    
                    {{-- Language Switcher Button (Temporarily Hidden) --}}
                    <button id="lang-toggle" aria-label="Ganti Bahasa" class="hidden px-2.5 py-1.5 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/60 transition-all active:scale-95 flex items-center gap-1">
                        <span id="lang-text">ID</span>
                    </button>

                    {{-- Dark/Light Theme Switcher Button --}}
                    <button id="theme-toggle" aria-label="Ganti Tema Tampilan" class="p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-slate-100 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700/60 transition-all active:scale-95">
                        <svg id="theme-icon-sun" class="w-4 h-4 hidden dark:block fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" clip-rule="evenodd"/>
                        </svg>
                        <svg id="theme-icon-moon" class="w-4 h-4 block dark:hidden fill-current" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </button>

                    <a href="{{ route('home') }}#download" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-[#2E7D64] hover:bg-[#1B5E4B] shadow-sm transition-all active:scale-95" data-i18n="nav_download">
                        <span>Unduh Aplikasi</span>
                    </a>

                    {{-- Mobile Menu Trigger --}}
                    <button id="mobile-toggle" aria-label="Buka Menu" class="md:hidden p-2 text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white bg-slate-100 dark:bg-slate-800/80 rounded-xl transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>

            </div>
        </div>

        {{-- Mobile Drawer Navigation --}}
        <div id="mobile-menu" class="hidden md:hidden border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-4 pt-3 pb-6 space-y-3">
            <a href="{{ route('features') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#2E7D64]" data-i18n="nav_features">Fitur Utama</a>
            <a href="{{ route('calculator') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#2E7D64]" data-i18n="nav_calc">Kalkulator Impian</a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#2E7D64]" data-i18n="nav_about">Tentang Kami</a>
            <a href="{{ route('news.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#2E7D64]" data-i18n="nav_news">Berita</a>
            <a href="{{ route('home') }}#faq" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#2E7D64]" data-i18n="nav_faq">FAQ</a>
            <div class="pt-2">
                <a href="{{ route('home') }}#download" class="block w-full text-center px-5 py-3 rounded-xl text-sm font-bold text-white bg-[#2E7D64]" data-i18n="nav_download">
                    Unduh Aplikasi
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content Injection --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Unified Corporate Footer --}}
    <footer class="bg-slate-900 dark:bg-slate-950 text-white py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-12 gap-8 pb-12 border-b border-slate-800">
                
                <div class="md:col-span-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="bg-white dark:bg-slate-900 p-1.5 rounded-xl flex items-center justify-center border border-slate-200 dark:border-slate-800">
                            <img src="{{ asset('assets/logo.webp') }}" alt="ImpiDream" width="28" height="28" decoding="sync" fetchpriority="high" class="h-7 w-auto rounded-xl object-contain" />
                        </div>
                        <span class="font-heading font-bold text-xl text-white">ImpiDream</span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-sm leading-relaxed" data-i18n="footer_tagline">
                        Dream Planning Platform — Ubah impian abstrak menjadi rencana yang jelas, terukur, dan dapat dipantau setiap hari.
                    </p>
                </div>

                <div class="md:col-span-3 space-y-3">
                    <div class="font-heading font-semibold text-xs text-slate-400 uppercase tracking-wider" data-i18n="footer_nav">Navigasi</div>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors" data-i18n="nav_about">Tentang Kami</a></li>
                        <li><a href="{{ route('features') }}" class="hover:text-white transition-colors" data-i18n="nav_features">Fitur Utama</a></li>
                        <li><a href="{{ route('news.index') }}" class="hover:text-white transition-colors" data-i18n="nav_news">Berita</a></li>
                        <li><a href="{{ route('home') }}#kalkulator" class="hover:text-white transition-colors" data-i18n="nav_calc">Kalkulator</a></li>
                        <li><a href="{{ route('home') }}#faq" class="hover:text-white transition-colors" data-i18n="nav_faq">FAQ</a></li>
                    </ul>
                </div>

                <div class="md:col-span-3 space-y-3">
                    <div class="font-heading font-semibold text-xs text-slate-400 uppercase tracking-wider" data-i18n="footer_legal">Legal & Kontak</div>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li><a href="#" class="hover:text-white transition-colors" data-i18n="footer_privacy">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition-colors" data-i18n="footer_terms">Syarat & Ketentuan</a></li>
                        <li><span class="text-slate-400">support@impidream.id</span></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <div>&copy; {{ date('Y') }} ImpiDream. All rights reserved.</div>
                <div class="text-slate-400 font-medium">Dream Planning Platform</div>
            </div>
        </div>
    </footer>

    {{-- Native JS for Theme Switching, Language Switcher & Mobile Toggle --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Menu Drawer
            const toggleBtn = document.getElementById('mobile-toggle');
            const menu = document.getElementById('mobile-menu');

            if (toggleBtn && menu) {
                toggleBtn.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                });
            }

            // Theme Switcher Logic
            const themeBtn = document.getElementById('theme-toggle');
            if (themeBtn) {
                themeBtn.addEventListener('click', function () {
                    const isDark = document.documentElement.classList.contains('dark');
                    if (isDark) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    }
                });
            }

            // Multi-Language Dictionary System (ID / EN)
            const dictionary = {
                id: {
                    nav_features: "Fitur",
                    nav_calc: "Kalkulator",
                    nav_about: "Tentang Kami",
                    nav_news: "Berita",
                    nav_faq: "FAQ",
                    nav_download: "Unduh Aplikasi",
                    footer_tagline: "Dream Planning Platform — Ubah impian abstrak menjadi rencana yang jelas, terukur, dan dapat dipantau setiap hari.",
                    footer_nav: "Navigasi",
                    footer_legal: "Legal & Kontak",
                    footer_privacy: "Kebijakan Privasi",
                    footer_terms: "Syarat & Ketentuan",

                    // Landing Page
                    hero_badge: "Platform Perencanaan Impian",
                    hero_title_1: "Wujudkan Impianmu dengan ",
                    hero_title_2: "Target Menabung Terstruktur",
                    hero_desc: "Ubah impian mahal menjadi alokasi harian yang realistis. ImpiDream menghitung sisa hari, alokasi tabungan harian, dan menghubungkanmu dengan referensi harga marketplace.",
                    store_play_sub: "Temukan di",
                    store_play_title: "Google Play",
                    store_app_sub: "Unduh di",
                    store_app_title: "App Store",

                    fitur_title: "Didesain untuk Kepastian Finansialmu",
                    fitur_subtitle: "ImpiDream membantu kamu merencanakan setiap langkah dari ide impian hingga tercapai.",
                    fitur_c1_title: "Kalkulator Harian Presisi",
                    fitur_c1_desc: "Sistem otomatis membagi sisa target dengan sisa hari. Kamu selalu tahu persis nominal yang harus ditabung setiap hari.",
                    fitur_c2_title: "Referensi Marketplace",
                    fitur_c2_desc: "Pilih produk referensi dari Tokopedia, Shopee, atau Lazada sebagai patokan harga barang impianmu.",
                    fitur_c3_title: "Multi-Wallet Tracking",
                    fitur_c3_desc: "Pantau alokasi dari berbagai pos dana (Bank, E-Wallet, Tunai) dalam satu tampilan terpusat.",

                    calc_title: "Hitung Rencana Impianmu",
                    calc_subtitle: "Tentukan nama barang, harga, dan waktu pencapaianmu.",
                    calc_lbl_name: "Nama Impian",
                    calc_lbl_price: "Estimasi Harga (Rp)",
                    calc_lbl_months: "Target Waktu (Bulan)",
                    calc_res_title: "Hasil Perhitungan",
                    calc_res_daily: "Target Menabung Harian",
                    calc_res_monthly: "Per Bulan",
                    calc_res_total: "Total Nominal",
                    calc_res_btn: "Mulai Rencana Ini",

                    faq_title: "Pertanyaan Umum",
                    faq_q1: "Apakah ImpiDream aplikasi pinjaman atau kredit?",
                    faq_a1: "Bukan. ImpiDream murni aplikasi perencanaan dan pemantauan tabungan pribadi. Kami tidak menyediakan pinjaman, bunga, maupun cicilan kredit.",
                    faq_q2: "Apakah data tabungan saya terhubung otomatis ke bank?",
                    faq_a2: "Pada versi MVP saat ini, seluruh pencatatan dilakukan secara manual demi menjaga privasi dan keamanan pengguna 100%. Integrasi otomatis disiapkan untuk versi mendatang.",
                    faq_q3: "Apakah aplikasi ImpiDream gratis?",
                    faq_a3: "Ya, ImpiDream dapat diunduh dan digunakan 100% gratis tanpa biaya berlangganan.",

                    // About Page
                    about_badge: "Kisah & Cerita ImpiDream",
                    about_title_1: "Menabung Jadi Lebih Mudah & ",
                    about_title_2: "Pasti Tercapai",
                    about_desc: "ImpiDream dibuat untuk siapa saja yang punya barang impian — gadget, motor, tas, atau liburan — tanpa harus pusing memikirkan utang atau cicilan.",
                    st_1_val: "100% Gratis",
                    st_1_lbl: "Tanpa Biaya & Iklan",
                    st_2_val: "0 Rupiah",
                    st_2_lbl: "Bunga / Pinjaman",
                    st_3_val: "Otomatis",
                    st_3_lbl: "Hitung Harian",
                    st_4_val: "Aman",
                    st_4_lbl: "Privasi Terjaga",
                    ab_m1_title: "Membantu Kamu Fokus",
                    ab_m1_desc: "Nominal besar sering bikin kita kaget. Dengan ImpiDream, nominal belasan juta dipecah jadi puluhan ribu sehari yang terasa ringan dan bisa kamu tabung tanpa beban.",
                    ab_m2_title: "Bangga Beli Pakai Uang Sendiri",
                    ab_m2_desc: "Tidak ada pinjaman online atau cicilan berbunga. Kami ingin kamu merasakan kebahagiaan sejati saat berhasil membeli barang impianmu secara tunai dari hasil keringatmu sendiri.",

                    // News Page i18n
                    news_badge: "Edukasi & Insight Finansial",
                    news_title: "Berita & Tips Perencanaan Impian",
                    news_subtitle: "Temukan artikel pilihan seputar tips menabung harian, strategi bebas utang, dan pengelolaan alokasi keuangan yang cerdas.",

                    // Features Page & Goals Tracker Showcase
                    feat_badge: "Spesifikasi & Fitur Platform",
                    feat_title: "Arsitektur Canggih untuk Perencanaan Impian",
                    feat_subtitle: "ImpiDream dirancang dengan fondasi teknis yang kokoh, memisahkan logika bisnis, abstraksi wallet, dan kalkulasi harian secara presisi.",
                    gt_section_title: "3 Contoh Real-World Goals Tracker",
                    gt_section_sub: "Lihat bagaimana ImpiDream memecah berbagai impian menjadi target harian yang nyata dan mudah dicapai.",
                    gt_card1_tag: "Gadget & Produktivitas",
                    gt_card1_title: "MacBook Pro / iPhone 15 Pro",
                    gt_card1_desc: "Target Rp 21.000.000 dalam 10 Bulan. Alokasi Harian: Rp 70.000/hari.",
                    gt_card1_detail: "Cocok untuk mahasiswa, freelancer, dan profesional yang membutuhkan perangkat kerja baru tanpa merusak arus kas harian.",
                    gt_card2_tag: "Kendaraan & Mobilitas",
                    gt_card2_title: "Motor Matic Impian",
                    gt_card2_desc: "Target Rp 28.500.000 dalam 10 Bulan. Alokasi Harian: Rp 95.000/hari.",
                    gt_card2_detail: "Membantu pekerja muda membeli kendaraan operasional harian secara tunai tanpa cicilan kredit berbunga tinggi.",
                    gt_card3_tag: "Momen & Life Milestone",
                    gt_card3_title: "Dana Liburan / Tabungan Nikah",
                    gt_card3_desc: "Target Rp 50.000.000 dalam 18 Bulan. Alokasi Harian: Rp 92.500/hari.",
                    gt_card3_detail: "Perencanaan jangka menengah untuk momen penting hidup dengan kepastian angka tanpa ketergantungan utang pinjaman.",
                    f1_title: "Kalkulator Harian Presisi",
                    f1_desc: "Algoritma otomatis membagi sisa kebutuhan target dengan sisa waktu dalam hari. Menghasilkan alokasi menabung harian, mingguan, dan bulanan secara real-time.",
                    f1_tag: "Realtime Formula Recalculation",
                    f2_title: "Abstraksi Multi-Wallet",
                    f2_desc: "Mendukung alokasi dari berbagai pos dana (Bank BCA, Mandiri, E-Wallet GoPay, OVO, DANA, Tunai) dengan struktur arsitektur interface extensible.",
                    f2_tag: "Extensible Provider Architecture",
                    f3_title: "Referensi Produk Marketplace",
                    f3_desc: "Menautkan barang impian dengan referensi harga dari Tokopedia, Shopee, atau Lazada agar target nominal yang ditentukan terverifikasi dan akurat.",
                    f3_tag: "Verified Price Reference",
                    f4_title: "Laravel Clean Architecture",
                    f4_desc: "Backend dibangun menggunakan Service Layer & Repository Pattern di atas Laravel 13 (PHP 8.3), memisahkan query data dari aturan bisnis.",
                    f4_tag: "Repository & Service Pattern",
                    f5_title: "Keamanan Sanctum & Rate Limiting",
                    f5_desc: "Autentikasi berbasis token Sanctum dengan proteksi rate limiting ketat pada login request dan enkripsi kata sandi menggunakan bcrypt.",
                    f5_tag: "Token Sanctum & Rate Limiter",
                    f6_title: "Filosofi 0% Bunga & Utang",
                    f6_desc: "Murni memfasilitasi tabungan mandiri tanpa fitur pinjaman, paylater, atau bunga. Mendorong kepemilikan tunai dan disiplin finansial.",
                    f6_tag: "100% Debt-Free Commitment",
                    cta_title: "Siap Memulai Rencana Impianmu?",
                    cta_desc: "Unduh ImpiDream sekarang dan rasakan kemudahan mengontrol alokasi tabungan harian kamu.",
                    cta_btn: "Unduh ImpiDream Sekarang"
                },
                en: {
                    nav_features: "Features",
                    nav_calc: "Calculator",
                    nav_about: "About Us",
                    nav_news: "News",
                    nav_faq: "FAQ",
                    nav_download: "Download App",
                    footer_tagline: "Dream Planning Platform — Turn abstract dreams into clear, measurable, and daily trackable plans.",
                    footer_nav: "Navigation",
                    footer_legal: "Legal & Contact",
                    footer_privacy: "Privacy Policy",
                    footer_terms: "Terms & Conditions",

                    // Landing Page
                    hero_badge: "Dream Planning Platform",
                    hero_title_1: "Achieve Your Dreams with ",
                    hero_title_2: "Structured Saving Goals",
                    hero_desc: "Turn expensive dreams into realistic daily allocations. ImpiDream calculates remaining days, daily saving goals, and links you to real marketplace price references.",
                    store_play_sub: "Get it on",
                    store_play_title: "Google Play",
                    store_app_sub: "Download on",
                    store_app_title: "App Store",

                    fitur_title: "Designed for Your Financial Certainty",
                    fitur_subtitle: "ImpiDream helps you plan every single step from dream idea until achievement.",
                    fitur_c1_title: "Precision Daily Calculator",
                    fitur_c1_desc: "Automated system divides target balance by remaining days. You always know exactly how much to save every day.",
                    fitur_c2_title: "Marketplace References",
                    fitur_c2_desc: "Choose reference products from Tokopedia, Shopee, or Lazada as a benchmark for your dream item price.",
                    fitur_c3_title: "Multi-Wallet Tracking",
                    fitur_c3_desc: "Monitor fund allocations from various accounts (Bank, E-Wallet, Cash) in one centralized view.",

                    calc_title: "Calculate Your Dream Plan",
                    calc_subtitle: "Set item name, price, and target timeframe.",
                    calc_lbl_name: "Dream Item Name",
                    calc_lbl_price: "Estimated Price (Rp)",
                    calc_lbl_months: "Target Timeframe (Months)",
                    calc_res_title: "Calculation Results",
                    calc_res_daily: "Daily Saving Goal",
                    calc_res_monthly: "Per Month",
                    calc_res_total: "Total Amount",
                    calc_res_btn: "Start This Plan",

                    faq_title: "Frequently Asked Questions",
                    faq_q1: "Is ImpiDream a loan or credit app?",
                    faq_a1: "No. ImpiDream is purely a personal dream planning and savings tracking app. We do not provide loans, interest, or installment credit.",
                    faq_q2: "Is my savings data automatically connected to my bank?",
                    faq_a2: "In the current MVP version, all logging is done manually for 100% user privacy and security. Automatic sync is planned for future releases.",
                    faq_q3: "Is the ImpiDream app free?",
                    faq_a3: "Yes, ImpiDream can be downloaded and used 100% free with zero subscription fees.",

                    // About Page
                    about_badge: "The ImpiDream Story",
                    about_title_1: "Saving Made Simple & ",
                    about_title_2: "Truly Achievable",
                    about_desc: "ImpiDream was built for anyone who has a dream item — gadgets, bikes, bags, or trips — without worrying about debt or loans.",
                    st_1_val: "100% Free",
                    st_1_lbl: "No Fees or Ads",
                    st_2_val: "Rp 0 / $0",
                    st_2_lbl: "Interest or Debt",
                    st_3_val: "Automated",
                    st_3_lbl: "Daily Breakdown",
                    st_4_val: "Secure",
                    st_4_lbl: "Guaranteed Privacy",
                    ab_m1_title: "Helping You Stay Focused",
                    ab_m1_desc: "Big numbers can feel overwhelming. With ImpiDream, millions are broken down into small daily amounts that feel easy and effortless to save.",
                    ab_m2_title: "Pride of Buying Cash",
                    ab_m2_desc: "No online loans or high-interest installments. We want you to feel real pride when buying your dream item in cash from your own effort.",

                    // News Page i18n
                    news_badge: "Financial Insights & Education",
                    news_title: "News & Dream Planning Tips",
                    news_subtitle: "Discover curated articles on daily savings tips, debt-free strategies, and smart financial management.",

                    // Features Page & Goals Tracker Showcase
                    feat_badge: "Platform Specs & Features",
                    feat_title: "Advanced Architecture for Dream Planning",
                    feat_subtitle: "ImpiDream is engineered with a robust technical foundation, decoupling business logic, wallet abstractions, and daily calculations with precision.",
                    gt_section_title: "3 Real-World Goals Tracker Examples",
                    gt_section_sub: "See how ImpiDream breaks down various dreams into clear, achievable daily goals.",
                    gt_card1_tag: "Gadget & Productivity",
                    gt_card1_title: "MacBook Pro / iPhone 15 Pro",
                    gt_card1_desc: "Target Rp 21,000,000 in 10 Months. Daily Goal: Rp 70,000/day.",
                    gt_card1_detail: "Perfect for students, freelancers, and professionals needing new work equipment without ruining daily cash flow.",
                    gt_card2_tag: "Mobility & Asset",
                    gt_card2_title: "Dream Scooter / Vehicle",
                    gt_card2_desc: "Target Rp 28,500,000 in 10 Months. Daily Goal: Rp 95,000/day.",
                    gt_card2_detail: "Helps young workers buy daily operational vehicles in cash without high-interest loan installments.",
                    gt_card3_tag: "Life Milestones & Travel",
                    gt_card3_title: "Vacation Fund / Wedding Savings",
                    gt_card3_desc: "Target Rp 50,000,000 in 18 Months. Daily Goal: Rp 92,500/day.",
                    gt_card3_detail: "Medium-term planning for major life milestones with price certainty and zero loan dependence.",
                    f1_title: "Precision Daily Calculator",
                    f1_desc: "Automated algorithm divides target balance by remaining days, delivering daily, weekly, and monthly saving allocations in real-time.",
                    f1_tag: "Realtime Formula Recalculation",
                    f2_title: "Multi-Wallet Abstraction",
                    f2_desc: "Supports fund tracking across BCA, Mandiri, GoPay, OVO, DANA, and Cash via an extensible interface architecture.",
                    f2_tag: "Extensible Provider Architecture",
                    f3_title: "Marketplace Product References",
                    f3_desc: "Links dream items with verified price references from Tokopedia, Shopee, or Lazada to validate target amounts.",
                    f3_tag: "Verified Price Reference",
                    f4_title: "Laravel Clean Architecture",
                    f4_desc: "Backend built using Service Layer & Repository Pattern on Laravel 13 (PHP 8.3), decoupling data queries from business rules.",
                    f4_tag: "Repository & Service Pattern",
                    f5_title: "Sanctum Security & Rate Limiting",
                    f5_desc: "Sanctum token-based authentication with strict rate-limiting on login requests and bcrypt password hashing.",
                    f5_tag: "Token Sanctum & Rate Limiter",
                    f6_title: "0% Interest & Debt-Free Philosophy",
                    f6_desc: "Purely facilitates self-saving without loans, paylater, or interest. Encourages cash ownership and financial discipline.",
                    f6_tag: "100% Debt-Free Commitment",
                    cta_title: "Ready to Start Your Dream Plan?",
                    cta_desc: "Download ImpiDream now and experience seamless control over your daily saving goals.",
                    cta_btn: "Download ImpiDream Now"
                }
            };

            const langBtn = document.getElementById('lang-toggle');
            const langText = document.getElementById('lang-text');

            function applyLanguage(lang) {
                const currentDict = dictionary[lang] || dictionary.id;
                document.querySelectorAll('[data-i18n]').forEach(el => {
                    const key = el.getAttribute('data-i18n');
                    if (currentDict[key]) {
                        if (el.children.length === 0 || el.querySelector('span')) {
                            el.textContent = currentDict[key];
                        } else {
                            el.childNodes[0].nodeValue = currentDict[key];
                        }
                    }
                });
                if (langText) langText.textContent = lang.toUpperCase();
                localStorage.setItem('lang', lang);
            }

            const initialLang = localStorage.getItem('lang') || 'id';
            applyLanguage(initialLang);

            if (langBtn) {
                langBtn.addEventListener('click', function () {
                    const current = localStorage.getItem('lang') || 'id';
                    const next = current === 'id' ? 'en' : 'id';
                    applyLanguage(next);
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
