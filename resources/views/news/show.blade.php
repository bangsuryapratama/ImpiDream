@extends('layouts.app')

@section('title', $article['title'] . ' — ImpiDream News')
@section('meta_description', $article['excerpt'])
@section('canonical_url', route('news.show', $article['slug']))

@section('extra_seo')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $article['title'] }}">
    <meta property="og:description" content="{{ $article['excerpt'] }}">
    <meta property="og:url" content="{{ route('news.show', $article['slug']) }}">
    <meta property="og:image" content="{{ asset($article['image']) }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article['title'] }}">
    <meta name="twitter:description" content="{{ $article['excerpt'] }}">

    @verbatim
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{ $article['title'] }}",
      "description": "{{ $article['excerpt'] }}",
      "author": {
        "@type": "Organization",
        "name": "ImpiDream"
      }
    }
    </script>
    @endverbatim
@endsection

@section('content')

    <section class="pt-28 pb-20 hero-pattern">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            {{-- Breadcrumbs & Back Link --}}
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400 pt-4">
                <a href="{{ route('news.index') }}" class="hover:text-[#2E7D64] dark:hover:text-[#6FBF9A] transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span>Kembali ke Berita</span>
                </a>
                <span>/</span>
                <span class="text-slate-900 dark:text-white truncate max-w-xs">{{ $article['title'] }}</span>
            </div>

            {{-- Article Header Card --}}
            <header class="space-y-4 text-left">
                <div class="flex items-center gap-3">
                    <span class="px-3.5 py-1 rounded-full bg-[#2E7D64]/10 text-[#2E7D64] dark:text-[#6FBF9A] text-xs font-bold uppercase tracking-wider">
                        {{ $article['category'] }}
                    </span>
                    <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                        {{ $article['date'] }} &bull; {{ $article['read_time'] }}
                    </span>
                </div>

                <h1 class="font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight">
                    {{ $article['title'] }}
                </h1>

                <div class="flex items-center gap-3 pt-2 text-xs text-slate-600 dark:text-slate-400">
                    <span class="font-semibold text-slate-900 dark:text-white">Penulis:</span> {{ $article['author'] }}
                </div>
            </header>

            {{-- Featured Hero Cover Image --}}
            <div class="w-full h-64 sm:h-96 rounded-3xl overflow-hidden shadow-lg border border-slate-200 dark:border-slate-800 bg-slate-900">
                <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" width="800" height="450" decoding="sync" fetchpriority="high" class="w-full h-full object-cover block" />
            </div>

            {{-- Main Article Content Body --}}
            <div class="bg-white dark:bg-slate-900 p-8 sm:p-12 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm text-slate-700 dark:text-slate-300 text-base leading-relaxed space-y-4">
                {!! $article['content'] !!}
            </div>

            {{-- Related Articles Section --}}
            @if ($relatedArticles->count() > 0)
                <div class="space-y-6 pt-8 border-t border-slate-200 dark:border-slate-800">
                    <h3 class="font-heading text-2xl font-bold text-slate-900 dark:text-white">
                        Artikel Terkait Lainnya
                    </h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($relatedArticles as $rel)
                            <a href="{{ route('news.show', $rel['slug']) }}" class="block bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 overflow-hidden hover:border-[#2E7D64] dark:hover:border-[#6FBF9A] transition-all group">
                                <div class="h-36 w-full overflow-hidden bg-slate-900">
                                    <img src="{{ asset($rel['image']) }}" alt="{{ $rel['title'] }}" width="400" height="200" decoding="sync" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 block" />
                                </div>
                                <div class="p-5 space-y-2">
                                    <span class="text-[10px] font-bold text-[#2E7D64] dark:text-[#6FBF9A] uppercase tracking-wider block">{{ $rel['category'] }}</span>
                                    <h4 class="font-heading font-bold text-base text-slate-900 dark:text-white group-hover:text-[#2E7D64] dark:group-hover:text-[#6FBF9A] transition-colors leading-snug">
                                        {{ $rel['title'] }}
                                    </h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2">
                                        {{ $rel['excerpt'] }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection
