@extends('layouts.app')

@section('title', 'Pondok Bambu - Pesantren Modern Terpercaya')

@section('content')
<!-- Hero Section -->
<section class="bg-hero min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-6">
            <span class="text-sm font-medium">Pesantren Modern Terpercaya</span>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
            {{ $settings['hero_title'] ?? 'Membentuk Generasi Qurani Berakhlak Mulia' }}
        </h1>
        <p class="text-xl md:text-2xl text-gray-100 max-w-4xl mx-auto mb-10 leading-relaxed">
            {{ $settings['hero_subtitle'] ?? 'Pendidikan Islam terpadu yang menggabungkan ilmu agama dan pengetahuan umum untuk mencetak generasi yang beriman, berilmu, dan berakhlak mulia' }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('registration.create') }}" class="bg-emerald-600 text-white px-10 py-4 rounded-full hover:bg-emerald-700 transition font-semibold text-lg">
                Daftar Santri Baru
            </a>
            <a href="{{ route('programs.index') }}" class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-full hover:bg-white hover:text-emerald-600 transition font-semibold text-lg">
                Lihat Program
            </a>
        </div>
    </div>
</section>

<!-- Visi & Misi Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20in%20traditional%20Islamic%20attire%20reading%20and%20studying%20together%20in%20bright%20classroom%2C%20focused%20learning%20atmosphere%2C%20natural%20daylight%2C%20educational%20setting%20with%20Islamic%20calligraphy%20decorations&width=600&height=800&seq=visi1&orientation=portrait" alt="Santri" class="rounded-2xl shadow-xl">
            </div>
            <div class="bg-gray-900 text-white p-12 rounded-2xl">
                <div class="inline-block bg-emerald-600 p-3 rounded-lg mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mb-6">Visi & Misi</h2>
                
                <div class="mb-8">
                    <h3 class="text-emerald-400 font-semibold text-lg mb-3">Visi</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $settings['vision'] ?? 'Menjadi pesantren modern yang unggul dalam mencetak generasi Qurani yang berakhlak mulia, berilmu luas, dan bermanfaat bagi umat' }}
                    </p>
                </div>

                <div>
                    <h3 class="text-emerald-400 font-semibold text-lg mb-3">Misi</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300">{{ $settings['mission_1'] ?? 'Menyelenggarakan pendidikan Islam yang komprehensif dan berkualitas' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300">{{ $settings['mission_2'] ?? 'Membina santri menjadi hafidz Al-Quran yang berakhlak mulia' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300">{{ $settings['mission_3'] ?? 'Mengintegrasikan ilmu agama dengan pengetahuan umum dan teknologi' }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-emerald-400 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-300">{{ $settings['mission_4'] ?? 'Membangun karakter santri yang mandiri dan berdaya saing global' }}</span>
                        </li>
                    </ul>
                </div>
                
                <a href="{{ route('about.index') }}" class="inline-block mt-8 bg-pink-500 text-white px-8 py-3 rounded-full hover:bg-pink-600 transition font-semibold">
                    Selengkapnya →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-emerald-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-5xl font-bold text-emerald-600 mb-2">{{ $settings['stat_students'] ?? '850' }}+</div>
                <div class="text-gray-600 font-medium">Santri Aktif</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-emerald-600 mb-2">{{ $settings['stat_since'] ?? '1998' }}</div>
                <div class="text-gray-600 font-medium">Tahun Berdiri</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-emerald-600 mb-2">{{ $settings['stat_teachers'] ?? '45' }}+</div>
                <div class="text-gray-600 font-medium">Ustadz Berpengalaman</div>
            </div>
            <div>
                <div class="text-5xl font-bold text-emerald-600 mb-2">{{ $settings['stat_programs'] ?? '12' }}</div>
                <div class="text-gray-600 font-medium">Program Unggulan</div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Program <span class="text-emerald-600">Unggulan</span> Kami</h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">Berbagai program pendidikan berkualitas untuk membentuk santri yang beriman, berilmu, dan berakhlak mulia</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($programs as $index => $program)
            <a href="{{ route('programs.show', $program->slug) }}" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition {{ $index === 0 ? 'md:row-span-2' : '' }}">
                <div class="relative {{ $index === 0 ? 'h-[500px]' : 'h-[240px]' }} overflow-hidden">
                    <img src="{{ $program->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800' }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 p-8 flex flex-col justify-end text-white">
                        <div class="bg-white/20 backdrop-blur-sm w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-2xl">{{ $program->icon ?? '📖' }}</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">{{ $program->name }}</h3>
                        <p class="text-white/90 text-sm mb-4 line-clamp-2">{{ $program->description }}</p>
                        <div class="text-white font-medium flex items-center">
                            Selengkapnya
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-4xl font-bold mb-2">Berita Terkini</h2>
                <p class="text-gray-600">Update kegiatan dan prestasi santri Pondok Bambu</p>
            </div>
            <a href="{{ route('news.index') }}" class="bg-white border-2 border-emerald-600 text-emerald-600 px-6 py-3 rounded-full hover:bg-emerald-600 hover:text-white transition font-semibold flex items-center">
                Lihat Semua
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($latestNews as $news)
            <a href="{{ route('news.show', $news->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="relative">
                    <img src="{{ $news->image ?? 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800' }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-{{ $news->category == 'Prestasi' ? 'emerald' : ($news->category == 'Kegiatan' ? 'orange' : 'pink') }}-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            {{ $news->category }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 line-clamp-2">{{ $news->title }}</h3>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $news->published_date->format('d F Y') }}
                    </div>
                    <p class="text-gray-600 line-clamp-3">{{ $news->excerpt }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Donation CTA Section -->
<section class="bg-emerald-600 py-16" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <div class="inline-block bg-emerald-500/30 backdrop-blur-sm p-6 rounded-3xl mb-6">
            <i class="ri-hand-heart-fill text-5xl text-white"></i>
        </div>
        <h2 class="text-4xl font-bold mb-4">Dukung Pendidikan Santri</h2>
        <p class="text-xl text-emerald-100 max-w-2xl mx-auto mb-8">Setiap donasi Anda sangat berarti untuk membantu santri mendapatkan pendidikan Islam berkualitas dan fasilitas yang memadai</p>
        <a href="{{ route('donation.index') }}" class="inline-block bg-orange-500 text-white px-10 py-4 rounded-full hover:bg-orange-600 transition font-semibold text-lg">
            Donasi Sekarang →
        </a>
    </div>
</section>
@endsection
