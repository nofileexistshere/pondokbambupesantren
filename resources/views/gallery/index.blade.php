@extends('layouts.app')

@section('title', 'Galeri Foto & Video - Pondok Bambu')

@section('content')
<!-- Page Header -->
<section class="bg-emerald-50 py-20 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-emerald-600 mb-4 flex items-center space-x-2 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-emerald-800 transition">Beranda</a>
            <span>></span>
            <span class="text-emerald-800">Galeri</span>
        </nav>
        <h1 class="text-5xl font-bold text-emerald-900 mb-4">Galeri Foto & Video</h1>
        <p class="text-xl text-emerald-700">Dokumentasi kegiatan dan momen berharga di Pesantren Pondok Bambu</p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="bg-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-3">
            @foreach($categories as $cat)
            <button onclick="filterGallery('{{ $cat }}')" 
               data-category="{{ $cat }}"
               class="filter-btn px-6 py-2.5 rounded-full text-sm font-semibold transition {{ $cat == 'Semua' ? 'bg-emerald-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Photos Gallery -->
@if($photos->count() > 0)
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($photos as $photo)
            <div class="gallery-item group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer aspect-[4/3]" data-category="{{ $photo->category }}">
                <img src="{{ $photo->file_path }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                
                <!-- Hover Overlay with Zoom Icon and Title -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300">
                    <!-- Zoom Icon (Center) -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white rounded-full p-3">
                                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Title and Date Overlay at Bottom (Shows on Hover) -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent p-6 pt-12 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-white font-bold text-lg mb-1 line-clamp-2">{{ $photo->title }}</h3>
                        @if($photo->created_at)
                        <div class="flex items-center text-white/90 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $photo->created_at->format('d F Y') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Video Kegiatan Section -->
@if($videos->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Video Kegiatan</h2>
            <p class="text-lg text-gray-600">Saksikan berbagai kegiatan dan prestasi santri dalam video</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($videos as $video)
            <div class="gallery-item group cursor-pointer" data-category="{{ $video->category }}">
                <!-- Video Thumbnail -->
                <div class="relative overflow-hidden rounded-2xl shadow-lg mb-4 aspect-video">
                    <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    
                    <!-- Play Button -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="bg-emerald-600 rounded-full p-5 group-hover:bg-emerald-700 group-hover:scale-110 transition-all duration-300 shadow-xl">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Duration Badge -->
                    @if($video->duration)
                    <div class="absolute bottom-3 right-3 bg-black/80 text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ $video->duration }}
                    </div>
                    @endif
                </div>

                <!-- Video Info -->
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition">{{ $video->title }}</h3>
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>{{ number_format($video->views) }} views</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Empty State -->
@if($photos->count() == 0 && $videos->count() == 0)
<section class="py-20 bg-white">
    <div class="text-center">
        <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <p class="text-gray-500 text-lg">Belum ada galeri tersedia</p>
    </div>
</section>
@endif

<script>
function filterGallery(category) {
    // Get all gallery items
    const items = document.querySelectorAll('.gallery-item');
    
    // Update filter button styles
    const buttons = document.querySelectorAll('.filter-btn');
    buttons.forEach(btn => {
        if (btn.dataset.category === category) {
            btn.classList.remove('bg-gray-100', 'text-gray-700');
            btn.classList.add('bg-emerald-600', 'text-white', 'shadow-md');
        } else {
            btn.classList.remove('bg-emerald-600', 'text-white', 'shadow-md');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        }
    });
    
    // Filter items
    items.forEach(item => {
        if (category === 'Semua' || item.dataset.category === category) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endsection
