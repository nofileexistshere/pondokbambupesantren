@extends('layouts.app')

@section('title', 'Program Pendidikan - Pondok Bambu')

@section('content')
<!-- Page Header -->
<section class="relative py-20 mt-20 overflow-hidden" style="background-image: linear-gradient(rgba(6, 95, 70, 0.9), rgba(6, 95, 70, 0.85)), url('https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20studying%20in%20beautiful%20traditional%20classroom%2C%20peaceful%20learning%20environment%2C%20natural%20lighting%2C%20educational%20atmosphere%20with%20Islamic%20architectural%20elements&width=1920&height=600&seq=prog-hero&orientation=landscape'); background-size: cover; background-position: center;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
        <h1 class="text-5xl font-bold mb-6">Program Pendidikan Pondok Bambu</h1>
        <p class="text-xl text-emerald-50 max-w-3xl mx-auto">Pendidikan Islam terpadu yang menggabungkan ilmu agama dan pengetahuan umum</p>
    </div>
</section>

<!-- Programs Tabs -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl p-6 md:p-10">
            <div id="program-tabs" class="flex flex-wrap gap-3 border-b border-gray-100 pb-4">
                @foreach($programs as $index => $program)
                <button 
                    data-target="program-panel-{{ $program->id }}"
                    class="program-tab px-6 py-2 rounded-full text-sm font-semibold transition {{ $loop->first ? 'bg-emerald-600 text-white shadow' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    {{ $program->name }}
                </button>
                @endforeach
            </div>

            @foreach($programs as $index => $program)
            <div id="program-panel-{{ $program->id }}" class="program-panel {{ $loop->first ? 'block' : 'hidden' }} mt-12">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <div class="bg-emerald-50 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl text-emerald-600 mb-6">
                            {{ $program->icon ?? '📖' }}
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Program {{ $program->name }}</h2>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">{{ $program->description }}</p>

                        @if($program->features)
                        <ul class="space-y-3 mb-8">
                            @foreach($program->features as $feature)
                            <li class="flex items-start text-gray-700">
                                <svg class="w-5 h-5 text-emerald-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        <div class="bg-emerald-50 rounded-2xl p-6 mb-8">
                            <div class="grid sm:grid-cols-3 gap-4 text-center sm:text-left">
                                @if($program->duration)
                                <div>
                                    <div class="text-sm text-gray-500">Durasi</div>
                                    <div class="text-xl font-semibold text-emerald-700">{{ $program->duration }}</div>
                                </div>
                                @endif
                                @if($program->schedule)
                                <div class="sm:col-span-2">
                                    <div class="text-sm text-gray-500">Jadwal</div>
                                    <div class="text-lg font-semibold text-gray-800">{{ $program->schedule }}</div>
                                </div>
                                @endif
                            </div>
                            @if($program->target_age)
                            <div class="mt-4 pt-4 border-t border-emerald-100">
                                <div class="text-sm text-gray-500">Target Peserta</div>
                                <div class="text-lg font-semibold text-gray-800">{{ $program->target_age }}</div>
                            </div>
                            @endif
                        </div>

                        <a href="{{ route('programs.show', $program->slug) }}" class="inline-flex items-center bg-emerald-600 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-emerald-700 transition">
                            Daftar Program Ini
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="relative">
                        <div class="rounded-3xl overflow-hidden shadow-2xl">
                            <img src="{{ $program->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200' }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-white shadow-lg rounded-2xl px-5 py-4 flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 text-lg">★</div>
                            <div>
                                <p class="text-sm text-gray-500">Program Unggulan</p>
                                <p class="font-semibold text-gray-900">Pondok Bambu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.program-tab');
        const panels = document.querySelectorAll('.program-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetId = tab.getAttribute('data-target');

                tabs.forEach(t => t.classList.remove('bg-emerald-600', 'text-white', 'shadow'));
                tabs.forEach(t => t.classList.add('bg-gray-100', 'text-gray-600'));

                tab.classList.add('bg-emerald-600', 'text-white', 'shadow');
                tab.classList.remove('bg-gray-100', 'text-gray-600');

                panels.forEach(panel => panel.classList.add('hidden'));
                document.getElementById(targetId)?.classList.remove('hidden');
            });
        });
    });
</script>
@endpush

<!-- Daily Schedule Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Jadwal Kegiatan Harian</h2>
            <p class="text-lg text-gray-600">Rutinitas santri yang terstruktur untuk membentuk kedisiplinan dan kemandirian</p>
        </div>

        <div class="relative max-w-lg mx-auto">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-0.5 bg-emerald-500"></div>

            <!-- Schedule Items -->
            <div class="space-y-12">
                <!-- 04.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">04.00</div>
                        <div class="text-base font-medium text-gray-900">Bangun Tidur & Sholat Subuh Berjama'ah</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 05.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">05.00</div>
                        <div class="text-base font-medium text-gray-900">Tahfidz Al-Quran & Muraja'ah</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 07.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">07.00</div>
                        <div class="text-base font-medium text-gray-900">Sarapan & Persiapan Sekolah</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 08.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">08.00</div>
                        <div class="text-base font-medium text-gray-900">Kegiatan Belajar Mengajar</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 12.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">12.00</div>
                        <div class="text-base font-medium text-gray-900">Sholat Dzuhur & Istirahat</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 13.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">13.00</div>
                        <div class="text-base font-medium text-gray-900">Pembelajaran Bahasa & Komputer</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 15.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">15.00</div>
                        <div class="text-base font-medium text-gray-900">Sholat Ashar & Kajian Kitab</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 17.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">17.00</div>
                        <div class="text-base font-medium text-gray-900">Olahraga & Kegiatan Ekstrakurikuler</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 18.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">18.00</div>
                        <div class="text-base font-medium text-gray-900">Sholat Maghrib & Makan Malam</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 19.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">19.00</div>
                        <div class="text-base font-medium text-gray-900">Sholat Isya & Kajian Malam</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 21.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">21.00</div>
                        <div class="text-base font-medium text-gray-900">Belajar Mandiri & Istirahat</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>

                <!-- 22.00 -->
                <div class="flex items-center relative">
                    <div class="flex-1 text-right pr-8">
                        <div class="text-3xl font-bold text-emerald-600 mb-1">22.00</div>
                        <div class="text-base font-medium text-gray-900">Tidur Malam</div>
                    </div>
                    <div class="relative flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-lg z-10 relative">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        </div>
                    </div>
                    <div class="flex-1 pl-8"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
