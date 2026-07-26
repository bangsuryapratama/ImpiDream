@extends('layouts.app')

@section('title', 'Berita & Artikel Finansial — ImpiDream')
@section('meta_description', 'Kumpulan artikel, tips menabung harian, edukasi bebas utang, dan panduan perencanaan impian finansial dari ImpiDream.')
@section('canonical_url', route('news.index'))

@section('content')

    <section class="pt-28 pb-20 hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            {{-- Hero Header --}}
            <div class="text-center space-y-4 max-w-3xl mx-auto pt-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#2E7D64]/10 text-[#2E7D64] dark:text-[#6FBF9A] text-xs font-bold">
                    <span data-i18n="news_badge">Edukasi & Insight Finansial</span>
                </div>
                <h1 class="font-heading text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight" data-i18n="news_title">
                    Berita & Tips <span class="text-[#2E7D64] dark:text-[#6FBF9A]">Perencanaan Impian</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 leading-relaxed font-normal" data-i18n="news_subtitle">
                    Temukan artikel pilihan seputar tips menabung harian, strategi bebas utang, dan pengelolaan alokasi keuangan yang cerdas.
                </p>
            </div>

            {{-- News Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <article class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="space-y-4">
                            
                            {{-- Cover Card Image Container --}}
                            <div class="relative h-52 w-full overflow-hidden bg-slate-900">
                                <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" width="400" height="225" decoding="sync" fetchpriority="high" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 block" />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent p-4 flex flex-col justify-between">
                                    <div class="flex items-center justify-between">
                                        <span class="px-3 py-1 bg-slate-900/80 backdrop-blur-md rounded-full text-[10px] font-bold text-white uppercase tracking-wider border border-slate-700/60">
                                            {{ $article['category'] }}
                                        </span>
                                        <span class="text-[10px] font-medium text-slate-200 bg-slate-900/60 backdrop-blur-sm px-2.5 py-0.5 rounded-full">
                                            {{ $article['read_time'] }}
                                        </span>
                                    </div>
                                    <div class="text-xs font-medium text-slate-300">
                                        {{ $article['date'] }}
                                    </div>
                                </div>
                            </div>

                            {{-- Content Body --}}
                            <div class="p-6 space-y-3">
                                <h2 class="font-heading font-bold text-xl text-slate-900 dark:text-white group-hover:text-[#2E7D64] dark:group-hover:text-[#6FBF9A] transition-colors leading-snug">
                                    <a href="{{ route('news.show', $article['slug']) }}">
                                        {{ $article['title'] }}
                                    </a>
                                </h2>
                                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed line-clamp-3">
                                    {{ $article['excerpt'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Card Footer --}}
                        <div class="p-6 pt-0 flex items-center justify-between border-t border-slate-100 dark:border-slate-800/80 mt-4">
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                                {{ $article['author'] }}
                            </span>
                            <a href="{{ route('news.show', $article['slug']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#2E7D64] dark:text-[#6FBF9A] hover:underline">
                                <span>Baca Artikel</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Newsletter & App CTA Banner --}}
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
