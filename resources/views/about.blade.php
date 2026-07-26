@extends('layouts.app')

@section('title', 'Tentang Kami — ImpiDream Platform Perencanaan Impian Finansial')
@section('meta_description', 'Pelajari kisah dan misi ImpiDream dalam membantu masyarakat Indonesia mengubah impian finansial menjadi rencana menabung terukur dan mudah dijalani.')
@section('canonical_url', route('about'))

@section('extra_seo')
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tentang Kami — ImpiDream Platform Perencanaan Impian">
    <meta property="og:description" content="Kisah dan misi ImpiDream dalam membantu setiap individu mencapai impian finansial secara terstruktur.">
    <meta property="og:url" content="{{ route('about') }}">
    <meta property="og:image" content="{{ asset('assets/logo.webp') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tentang Kami — ImpiDream Platform Perencanaan Impian">
    <meta name="twitter:description" content="Kisah dan misi ImpiDream dalam membantu setiap individu mencapai impian finansial secara terstruktur.">

    @verbatim
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "ImpiDream",
      "url": "http://localhost:8000",
      "logo": "http://localhost:8000/assets/logo.webp",
      "description": "Platform Perencanaan Impian Finansial Indonesia"
    }
    </script>
    @endverbatim
@endsection

@section('content')

    <section class="pt-28 pb-20 hero-pattern">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            {{-- Clean Hero Header (No Phone Visual Mockup) --}}
            <div class="text-center space-y-6 max-w-3xl mx-auto pt-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#2E7D64]/10 text-[#2E7D64] dark:text-[#6FBF9A] text-xs font-bold">
                    <span data-i18n="about_badge">Kisah & Cerita ImpiDream</span>
                </div>
                <h1 class="font-heading text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight" data-i18n="about_title_1">
                    Menabung Jadi Lebih Mudah & <span class="text-[#2E7D64] dark:text-[#6FBF9A]" data-i18n="about_title_2">Pasti Tercapai</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 leading-relaxed font-normal" data-i18n="about_desc">
                    ImpiDream dibuat untuk siapa saja yang punya barang impian — gadget, motor, tas, atau liburan — tanpa harus pusing memikirkan utang atau cicilan.
                </p>

                <div class="pt-2">
                    <a href="{{ route('home') }}#download" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-sm font-bold text-white bg-[#2E7D64] hover:bg-[#1B5E4B] shadow-sm transition-all active:scale-95" data-i18n="nav_download">
                        <span>Unduh Aplikasi</span>
                    </a>
                </div>
            </div>

            {{-- Stats Banner --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm text-center">
                <div class="space-y-1">
                    <div class="font-heading text-3xl font-extrabold text-[#2E7D64] dark:text-[#6FBF9A]" data-i18n="st_1_val">100% Gratis</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider" data-i18n="st_1_lbl">Tanpa Biaya & Iklan</div>
                </div>
                <div class="space-y-1 border-l border-slate-100 dark:border-slate-800">
                    <div class="font-heading text-3xl font-extrabold text-slate-900 dark:text-white" data-i18n="st_2_val">0 Rupiah</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider" data-i18n="st_2_lbl">Bunga / Pinjaman</div>
                </div>
                <div class="space-y-1 border-l border-slate-100 dark:border-slate-800">
                    <div class="font-heading text-3xl font-extrabold text-[#2E7D64] dark:text-[#6FBF9A]" data-i18n="st_3_val">Otomatis</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider" data-i18n="st_3_lbl">Hitung Harian</div>
                </div>
                <div class="space-y-1 border-l border-slate-100 dark:border-slate-800">
                    <div class="font-heading text-3xl font-extrabold text-slate-900 dark:text-white" data-i18n="st_4_val">Aman</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider" data-i18n="st_4_lbl">Privasi Terjaga</div>
                </div>
            </div>

            {{-- Human-Friendly Mission & Values --}}
            <div class="grid md:grid-cols-2 gap-8 items-stretch">
                <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                    <h2 class="font-heading text-2xl font-bold text-slate-900 dark:text-white" data-i18n="ab_m1_title">Membantu Kamu Fokus</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed" data-i18n="ab_m1_desc">
                        Nominal besar sering bikin kita kaget. Dengan ImpiDream, nominal belasan juta dipecah jadi puluhan ribu sehari yang terasa ringan dan bisa kamu tabung tanpa beban.
                    </p>
                </div>

                <div class="bg-white dark:bg-slate-900 p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-3">
                    <h2 class="font-heading text-2xl font-bold text-slate-900 dark:text-white" data-i18n="ab_m2_title">Bangga Beli Pakai Uang Sendiri</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed" data-i18n="ab_m2_desc">
                        Tidak ada pinjaman online atau cicilan berbunga. Kami ingin kamu merasakan kebahagiaan sejati saat berhasil membeli barang impianmu secara tunai dari hasil keringatmu sendiri.
                    </p>
                </div>
            </div>

            {{-- Call to Action --}}
            <div class="bg-slate-900 dark:bg-slate-950 text-white rounded-3xl p-8 sm:p-12 text-center space-y-6 shadow-xl border border-slate-800">
                <h2 class="font-heading text-3xl font-extrabold text-white" data-i18n="cta_title">Mulai Rencana Impian Pertama Kamu</h2>
                <p class="text-slate-400 max-w-xl mx-auto text-sm leading-relaxed" data-i18n="cta_desc">
                    Unduh ImpiDream sekarang dan rasakan kemudahan mengontrol alokasi tabungan harian kamu.
                </p>
                <div class="pt-2">
                    <a href="{{ route('home') }}#download" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#2E7D64] hover:bg-[#1B5E4B] text-white font-bold text-sm rounded-xl transition-all shadow-md" data-i18n="cta_btn">
                        Unduh ImpiDream Sekarang
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
