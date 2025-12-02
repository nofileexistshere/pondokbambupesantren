@extends('layouts.app')

@section('title', 'Tentang Kami - Pondok Bambu')

@section('content')
<!-- Page Header -->
<section class="relative bg-cover bg-center py-20 md:py-32 mt-20" style="background-image: url('https://readdy.ai/api/search-image?query=beautiful%20modern%20islamic%20boarding%20school%20pesantren%20building%20with%20green%20dome%20and%20minarets%20surrounded%20by%20lush%20tropical%20gardens%20palm%20trees%20and%20mountains%20in%20background%20during%20golden%20hour%20warm%20sunlight%20peaceful%20atmosphere%20architectural%20photography%20wide%20angle%20view&width=1920&height=500&seq=hero-tentang&orientation=landscape')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Tentang Kami</h1>
        <p class="text-base md:text-xl text-white/90">Pesantren Modern yang Memadukan Tradisi Islam Klasik dengan Pendidikan Kontemporer</p>
    </div>
</section>

<!-- Tabs Navigation -->
<section class="bg-white border-b sticky top-20 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto">
            <button onclick="showTab('sejarah')" class="tab-btn px-4 md:px-6 py-4 text-xs md:text-sm font-semibold transition border-b-2 border-emerald-600 text-emerald-600 whitespace-nowrap">
                <svg class="w-5 h-5 hidden md:inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Sejarah
            </button>
            <button onclick="showTab('visi-misi')" class="tab-btn px-4 md:px-6 py-4 text-xs md:text-sm font-semibold text-gray-600 hover:text-emerald-600 transition border-b-2 border-transparent hover:border-emerald-200 whitespace-nowrap">
                <svg class="w-5 h-5 hidden md:inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Visi & Misi
            </button>
            <button onclick="showTab('fasilitas')" class="tab-btn px-4 md:px-6 py-4 text-xs md:text-sm font-semibold text-gray-600 hover:text-emerald-600 transition border-b-2 border-transparent hover:border-emerald-200 whitespace-nowrap">
                <svg class="w-5 h-5 hidden md:inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Fasilitas
            </button>
            <button onclick="showTab('pengurus')" class="tab-btn px-4 md:px-6 py-4 text-xs md:text-sm font-semibold text-gray-600 hover:text-emerald-600 transition border-b-2 border-transparent hover:border-emerald-200 whitespace-nowrap">
                <svg class="w-5 h-5 hidden md:inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                Pengurus
            </button>
            <button onclick="showTab('prestasi')" class="tab-btn px-4 md:px-6 py-4 text-xs md:text-sm font-semibold text-gray-600 hover:text-emerald-600 transition border-b-2 border-transparent hover:border-emerald-200 whitespace-nowrap">
                <svg class="w-5 h-5 hidden md:inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                Prestasi
            </button>
        </div>
    </div>
</section>

@include('about.tabs.sejarah')
@include('about.tabs.visi-misi')
@include('about.tabs.fasilitas')
@include('about.tabs.pengurus')
@include('about.tabs.prestasi')

<!-- CTA Section -->
<section class="bg-emerald-600 py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h2 class="text-2xl md:text-4xl font-bold mb-3 md:mb-4">Bergabunglah Bersama Kami</h2>
        <p class="text-sm md:text-xl mb-6 md:mb-8">Jadilah bagian dari keluarga besar Pesantren Pondok Bambu dan raih masa depan gemilang dengan pendidikan Islam berkualitas</p>
        <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4">
            <a href="{{ route('registration.create') }}" class="bg-white text-emerald-600 px-6 md:px-8 py-3 md:py-4 rounded-full hover:bg-emerald-50 transition font-semibold inline-flex items-center justify-center">
                Daftar Sekarang
                <svg class="w-4 h-4 md:w-5 md:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}" class="bg-emerald-700 text-white px-6 md:px-8 py-3 md:py-4 rounded-full hover:bg-emerald-800 transition font-semibold inline-flex items-center justify-center">
                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<script>
function showTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Show selected tab
    document.getElementById(tabName + '-tab').classList.remove('hidden');
    
    // Update button styles
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('border-emerald-600', 'text-emerald-600');
        btn.classList.add('border-transparent', 'text-gray-600');
    });
    
    // Highlight active button
    event.target.closest('.tab-btn').classList.remove('border-transparent', 'text-gray-600');
    event.target.closest('.tab-btn').classList.add('border-emerald-600', 'text-emerald-600');
}
</script>
@endsection
