@extends('layouts.app')

@section('title', $news->title . ' - Pondok Bambu')

@section('content')
<!-- Article Header -->
<article class="py-12 bg-white mt-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="text-gray-600 mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a>
            <span>></span>
            <a href="{{ route('news.index') }}" class="hover:text-emerald-600">Berita</a>
            <span>></span>
            <span class="text-emerald-600 font-medium">{{ Str::limit($news->title, 30) }}</span>
        </nav>

        <!-- Category Badge -->
        <div class="mb-4">
            <span class="bg-{{ $news->category == 'Prestasi' ? 'emerald' : ($news->category == 'Kegiatan' ? 'orange' : 'pink') }}-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                {{ $news->category }}
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">{{ $news->title }}</h1>

        <!-- Meta Info -->
        <div class="flex items-center text-gray-600 mb-8 space-x-6">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                {{ $news->published_date->format('d F Y') }}
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                {{ $news->views }} views
            </div>
        </div>

        <!-- Featured Image -->
        <img src="{{ $news->image ?? 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1200' }}" alt="{{ $news->title }}" class="w-full rounded-2xl shadow-xl mb-8">

        <!-- Content -->
        <div class="prose prose-lg max-w-none mb-12">
            {!! nl2br(e($news->content)) !!}
        </div>

        <!-- Share Buttons -->
        <div class="border-t border-b border-gray-200 py-6 mb-12">
            <p class="text-sm text-gray-600 mb-3">Bagikan artikel ini:</p>
            <div class="flex space-x-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $news->slug)) }}" target="_blank" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('news.show', $news->slug)) }}&text={{ urlencode($news->title) }}" target="_blank" class="bg-sky-500 text-white px-6 py-2 rounded-lg hover:bg-sky-600 transition">
                    Twitter
                </a>
                <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . route('news.show', $news->slug)) }}" target="_blank" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">
                    WhatsApp
                </a>
            </div>
        </div>

        <!-- Related News -->
        @if($relatedNews->count() > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold mb-8">Berita Terkait</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedNews as $related)
                <a href="{{ route('news.show', $related->slug) }}" class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition">
                    <img src="{{ $related->image ? Storage::url($related->image) : 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400' }}" 
                         alt="{{ $related->title }}" 
                         class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold mb-2 line-clamp-2 hover:text-emerald-600">{{ $related->title }}</h3>
                        <p class="text-sm text-emerald-400">{{ $related->published_date->format('d M Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</article>
@endsection
