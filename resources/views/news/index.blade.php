@extends('layouts.app')

@section('title', 'Berita & Kegiatan - Pondok Bambu')

@section('content')
<!-- Page Header -->
<section class="bg-emerald-50 py-20 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-gray-600 mb-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a>
            <span>></span>
            <span class="text-emerald-600 font-medium">Berita</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Berita & Kegiatan</h1>
        <p class="text-lg text-gray-600">Ikuti perkembangan terkini dan berbagai kegiatan di Pesantren Pondok Bambu</p>
    </div>
</section>

<!-- Category Filter -->
<section class="bg-white shadow-sm sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-wrap gap-3" id="news-filter-bar">
            @foreach($categories as $cat)
            <button type="button"
                class="news-filter px-6 py-2 rounded-full transition text-sm font-semibold {{ $loop->first ? 'bg-emerald-600 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                data-filter="{{ $cat }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" data-category="{{ $item->category }}" class="news-card bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="relative">
                    <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800' }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-56 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-{{ $item->category == 'Prestasi' ? 'emerald' : ($item->category == 'Kegiatan' ? 'orange' : 'pink') }}-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            {{ $item->category }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $item->published_date->format('d F Y') }}
                    </div>
                    <h3 class="text-xl font-bold mb-3 line-clamp-2 hover:text-emerald-600 transition">{{ $item->title }}</h3>
                    <p class="text-gray-600 line-clamp-3 mb-4">{{ $item->excerpt }}</p>
                    <div class="flex items-center text-emerald-600 font-semibold">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <p class="text-gray-500 text-lg">Belum ada berita tersedia</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="mt-12">
            {{ $news->links() }}
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('.news-filter');
        const cards = document.querySelectorAll('.news-card');

        const setActiveButton = (activeBtn) => {
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-emerald-600', 'text-white', 'shadow');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            activeBtn.classList.add('bg-emerald-600', 'text-white', 'shadow');
            activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
        };

        const filterCards = (category) => {
            cards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (category === 'Semua' || cardCategory === category) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-filter');
                setActiveButton(button);
                filterCards(category);
            });
        });
    });
</script>
@endpush
@endsection
