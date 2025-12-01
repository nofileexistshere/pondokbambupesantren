@extends('layouts.app')

@section('title', 'Donasi - Pondok Bambu')

@section('content')
<!-- Header -->
<section class="bg-emerald-600 py-20 mt-20 relative overflow-hidden" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-emerald-900/30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
        <h1 class="text-5xl font-bold mb-6">Berbagi Kebaikan untuk Santri</h1>
        <p class="text-xl text-emerald-50 max-w-3xl mx-auto">Setiap donasi Anda sangat berarti untuk membantu santri mendapatkan pendidikan Islam berkualitas dan fasilitas yang memadai</p>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-white py-12 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold text-emerald-600 mb-2">
                    <span class="hidden sm:inline">Rp {{ number_format($totalDonation, 0, ',', '.') }}</span>
                    <span class="sm:hidden">Rp {{ format_number_short($totalDonation) }}</span>
                </div>
                <div class="text-gray-600">Total Donasi Terkumpul</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-emerald-600 mb-2">{{ number_format($totalDonors) }}</div>
                <div class="text-gray-600">Donatur Bergabung</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-emerald-600 mb-2">{{ number_format($avgPercentage) }}%</div>
                <div class="text-gray-600">Target Tercapai</div>
            </div>
        </div>
    </div>
</section>

<!-- Donation Campaigns -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Program Donasi</h2>
        <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Pilih program yang ingin Anda dukung</p>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($campaigns as $campaign)
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">
                <div class="text-center mb-6">
                    <div class="inline-block bg-emerald-100 p-4 rounded-full mb-4">
                        <span class="text-4xl">{{ $campaign->icon }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $campaign->name }}</h3>
                    <p class="text-gray-600 text-sm">{{ $campaign->description }}</p>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600">Terkumpul</span>
                        <span class="font-bold text-emerald-600">{{ $campaign->percentage }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-emerald-600 h-3 rounded-full transition-all duration-500" style="width: {{ $campaign->percentage }}%"></div>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs text-gray-500">Terkumpul</span>
                        <span class="font-semibold text-gray-800">
                            <span class="hidden sm:inline">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                            <span class="sm:hidden">Rp {{ format_number_short($campaign->current_amount) }}</span>
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">
                            <span class="hidden sm:inline">dari Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            <span class="sm:hidden">dari Rp {{ format_number_short($campaign->target_amount) }}</span>
                        </span>
                    </div>
                </div>

                <button onclick="openDonationModal({{ $campaign->id }}, '{{ $campaign->name }}')" 
                        class="w-full bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition font-semibold">
                    Donasi Sekarang
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Inline Donation Form Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Left Column - Form -->
            <div class="md:col-span-2">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Formulir Donasi</h2>
                
                <form action="{{ route('donation.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="donation_campaign_id" value="">

                    <!-- Pilih Nominal Donasi -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">Pilih Nominal Donasi</label>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <button type="button" onclick="setInlineAmount(50000)" class="inline-nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 50.000
                            </button>
                            <button type="button" onclick="setInlineAmount(100000)" class="inline-nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 100.000
                            </button>
                            <button type="button" onclick="setInlineAmount(500000)" class="inline-nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 500.000
                            </button>
                            <button type="button" onclick="setInlineAmount(1000000)" class="inline-nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 1.000.000
                            </button>
                        </div>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                            <input type="number" name="amount" id="inline_amount" placeholder="Nominal lainnya" required
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none">
                        </div>
                    </div>

                    <!-- Donasi Rutin Bulanan -->
                    <div>
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" name="is_recurring" value="1" class="mt-1 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <span class="ml-3">
                                <span class="block font-semibold text-gray-900">Donasi Rutin Bulanan</span>
                                <span class="text-sm text-gray-500">Donasi akan dipotong otomatis setiap bulan</span>
                            </span>
                        </label>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">Metode Pembayaran</label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="QRIS" required class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">QRIS</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="Transfer" class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">Transfer</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="E-Wallet" class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">E-Wallet</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Data Donatur -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                        <input type="text" name="donor_name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="Masukkan nama lengkap">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="email@example.com">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">No. HP *</label>
                        <input type="text" name="phone" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Pesan (Optional)</label>
                        <textarea name="message" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                                  placeholder="Tulis pesan atau doa untuk santri..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3.5 rounded-xl hover:bg-orange-600 transition font-bold text-base shadow-lg">
                        Lanjutkan Pembayaran
                    </button>
                </form>
            </div>

            <!-- Right Column - Summary & Testimonials -->
            <div class="md:col-span-1">
                <div class="bg-emerald-50 rounded-2xl p-6 sticky top-24">
                    <h4 class="font-bold text-lg text-gray-900 mb-4">Ringkasan Donasi</h4>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Nominal Donasi</span>
                            <span class="font-bold text-emerald-600" id="inline_summary_amount">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Biaya Admin</span>
                            <span class="font-semibold text-gray-900">Gratis</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-emerald-200 pt-3 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-900">Total</span>
                            <span class="text-2xl font-bold text-emerald-600" id="inline_total_display">Rp 0</span>
                        </div>
                    </div>

                    @if($testimonials->count() > 0)
                    <div class="pt-6 border-t border-emerald-200">
                        <h5 class="font-bold text-base text-gray-900 mb-3">Testimoni Donatur</h5>
                        <div class="space-y-3">
                            @foreach($testimonials->take(2) as $testimonial)
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold text-sm" style="background-color: {{ $testimonial->avatar_color }}">
                                        {{ $testimonial->avatar_initial }}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="font-semibold text-sm text-gray-900">{{ $testimonial->name }}</h6>
                                    <p class="text-xs text-gray-600 mt-0.5 line-clamp-2">"{{ $testimonial->message }}"</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Regular Donor Section -->
<section class="py-16 bg-gradient-to-br from-yellow-50 to-orange-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-10 md:p-12 border-4 border-orange-400 shadow-xl text-center">
            <!-- Crown Icon -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-500 rounded-2xl mb-6">
                <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Menjadi Donatur Tetap</h2>
            
            <!-- Description -->
            <p class="text-base md:text-lg text-gray-700 mb-10 max-w-2xl mx-auto">
                Bergabunglah dengan para donatur tetap yang <span class="text-orange-600 font-semibold">konsisten</span> mendukung pendidikan santri setiap bulan
            </p>
            
            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-10">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center">
                    <div class="bg-orange-100 p-4 rounded-2xl mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Donasi Otomatis</div>
                    <div class="text-sm text-gray-600">Dipotong setiap bulan</div>
                </div>

                <!-- Feature 2 -->
                <div class="flex flex-col items-center">
                    <div class="bg-orange-100 p-4 rounded-2xl mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Laporan Rutin</div>
                    <div class="text-sm text-gray-600">Update penggunaan dana</div>
                </div>

                <!-- Feature 3 -->
                <div class="flex flex-col items-center">
                    <div class="bg-orange-100 p-4 rounded-2xl mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Apresiasi Khusus</div>
                    <div class="text-sm text-gray-600">Sertifikat & penghargaan</div>
                </div>
            </div>

            <!-- CTA Button -->
            <button onclick="openRegularDonorModal()" class="bg-orange-500 text-white px-10 py-4 rounded-full hover:bg-orange-600 transition font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Daftar Sebagai Donatur Tetap
            </button>
        </div>
    </div>
</section>

<!-- Donation Modal -->
<div id="donationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl max-w-5xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 md:px-8 py-6 flex justify-between items-center rounded-t-3xl">
            <h3 class="text-2xl font-bold text-gray-900">Formulir Donasi</h3>
            <button onclick="closeDonationModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form action="{{ route('donation.store') }}" method="POST" class="p-6 md:p-8">
            @csrf
            <input type="hidden" name="donation_campaign_id" id="campaign_id">

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Left Column - Form Fields -->
                <div class="md:col-span-2 space-y-5">

                    <!-- Pilih Nominal Donasi -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">Pilih Nominal Donasi</label>
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <button type="button" onclick="setAmount(50000)" class="nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 50.000
                            </button>
                            <button type="button" onclick="setAmount(100000)" class="nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 100.000
                            </button>
                            <button type="button" onclick="setAmount(500000)" class="nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 500.000
                            </button>
                            <button type="button" onclick="setAmount(1000000)" class="nominal-btn border-2 border-gray-300 rounded-lg py-3 text-sm font-medium hover:border-emerald-600 hover:bg-emerald-50 transition">
                                Rp 1.000.000
                            </button>
                        </div>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                            <input type="number" name="amount" id="amount" placeholder="Nominal lainnya" required
                                   class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none">
                        </div>
                    </div>

                    <!-- Donasi Rutin Bulanan -->
                    <div>
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" name="is_recurring" value="1" class="mt-1 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <span class="ml-3">
                                <span class="block font-semibold text-gray-900">Donasi Rutin Bulanan</span>
                                <span class="text-sm text-gray-500">Donasi akan dipotong otomatis setiap bulan</span>
                            </span>
                        </label>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3">Metode Pembayaran</label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="QRIS" required class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">QRIS</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="Transfer" class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">Transfer</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="payment_method" value="E-Wallet" class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-lg p-3 text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-400 transition">
                                    <svg class="w-10 h-10 mx-auto mb-1 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="font-semibold text-sm">E-Wallet</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Data Donatur -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                        <input type="text" name="donor_name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="Masukkan nama lengkap">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="email@example.com">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">No. HP *</label>
                        <input type="text" name="phone" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                               placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Pesan (Optional)</label>
                        <textarea name="message" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-1 focus:ring-emerald-600 focus:outline-none"
                                  placeholder="Tulis pesan atau doa untuk santri..."></textarea>
                    </div>
                </div>

                <!-- Right Column - Summary -->
                <div class="md:col-span-1">
                    <div class="bg-emerald-50 rounded-2xl p-6 sticky top-24">
                        <h4 class="font-bold text-lg text-gray-900 mb-4">Ringkasan Donasi</h4>
                        
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Nominal Donasi</span>
                                <span class="font-bold text-emerald-600" id="summary_amount">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Biaya Admin</span>
                                <span class="font-semibold text-gray-900">Gratis</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-emerald-200 pt-3 mb-6">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-emerald-600" id="total_display">Rp 0</span>
                            </div>
                        </div>

                        <div id="selected_campaign" class="mb-4 text-sm text-gray-700"></div>

                        <button type="submit" class="w-full bg-orange-500 text-white px-6 py-3.5 rounded-xl hover:bg-orange-600 transition font-bold text-base shadow-lg">
                            Lanjutkan Pembayaran
                        </button>

                        @if($testimonials->count() > 0)
                        <div class="mt-6 pt-6 border-t border-emerald-200">
                            <h5 class="font-bold text-base text-gray-900 mb-3">Testimoni Donatur</h5>
                            <div class="space-y-3">
                                @foreach($testimonials->take(2) as $testimonial)
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold text-sm" style="background-color: {{ $testimonial->avatar_color }}">
                                            {{ $testimonial->avatar_initial }}
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="font-semibold text-sm text-gray-900">{{ $testimonial->name }}</h6>
                                        <p class="text-xs text-gray-600 mt-0.5 line-clamp-2">"{{ $testimonial->message }}"</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Regular Donor Modal -->
<div id="regularDonorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-3xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 px-8 py-6 flex justify-between items-center rounded-t-3xl">
            <h3 class="text-2xl font-bold">Daftar Donatur Tetap</h3>
            <button onclick="closeRegularDonorModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form action="{{ route('donation.regular') }}" method="POST" class="p-8">
            @csrf

            <div class="bg-orange-50 border border-orange-200 rounded-xl p-4 mb-6">
                <p class="text-sm text-orange-800">
                    <strong>Info:</strong> Sebagai donatur tetap, donasi Anda akan dipotong secara otomatis setiap bulan dan Anda akan mendapatkan laporan rutin penggunaan dana.
                </p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">Nama Lengkap *</label>
                    <input type="text" name="name" required
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">Email *</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">No. HP *</label>
                    <input type="text" name="phone" required
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                </div>
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">Alamat</label>
                    <textarea name="address" rows="3"
                              class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">Nominal Donasi Bulanan *</label>
                    <input type="number" name="monthly_amount" required min="50000"
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                           placeholder="Minimal Rp 50.000">
                </div>
                <div>
                    <label class="block text-emerald-700 font-semibold mb-2">Metode Pembayaran *</label>
                    <select name="payment_method" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                        <option value="">Pilih metode pembayaran</option>
                        <option value="Auto Debit">Auto Debit</option>
                        <option value="Transfer">Transfer Manual</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full mt-6 bg-orange-500 text-white px-8 py-4 rounded-xl hover:bg-orange-600 transition font-semibold text-lg">
                Daftar Sekarang
            </button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openDonationModal(campaignId, campaignName) {
        document.getElementById('campaign_id').value = campaignId;
        document.getElementById('selected_campaign').innerHTML = `
            <div class="bg-white border border-emerald-200 rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Program yang dipilih:</div>
                <div class="font-semibold text-gray-900">${campaignName}</div>
            </div>
        `;
        document.getElementById('donationModal').classList.remove('hidden');
        document.getElementById('donationModal').classList.add('flex');
    }

    function closeDonationModal() {
        document.getElementById('donationModal').classList.add('hidden');
        document.getElementById('donationModal').classList.remove('flex');
    }

    function openRegularDonorModal() {
        document.getElementById('regularDonorModal').classList.remove('hidden');
        document.getElementById('regularDonorModal').classList.add('flex');
    }

    function closeRegularDonorModal() {
        document.getElementById('regularDonorModal').classList.add('hidden');
        document.getElementById('regularDonorModal').classList.remove('flex');
    }

    function setAmount(amount) {
        document.getElementById('amount').value = amount;
        updateTotal();
        
        // Highlight selected button
        document.querySelectorAll('.nominal-btn').forEach(btn => {
            btn.classList.remove('border-emerald-600', 'bg-emerald-50');
            btn.classList.add('border-gray-300');
        });
        event.target.classList.remove('border-gray-300');
        event.target.classList.add('border-emerald-600', 'bg-emerald-50');
    }

    // Update total display when amount changes
    document.addEventListener('DOMContentLoaded', function() {
        const amountInput = document.getElementById('amount');
        if (amountInput) {
            amountInput.addEventListener('input', updateTotal);
        }
    });

    function updateTotal() {
        const amount = parseInt(document.getElementById('amount').value) || 0;
        const formattedAmount = 'Rp ' + amount.toLocaleString('id-ID');
        document.getElementById('total_display').textContent = formattedAmount;
        document.getElementById('summary_amount').textContent = formattedAmount;
    }

    // Close modal when clicking outside
    document.getElementById('donationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDonationModal();
        }
    });

    document.getElementById('regularDonorModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeRegularDonorModal();
        }
    });

    // Inline form functions
    function setInlineAmount(amount) {
        document.getElementById('inline_amount').value = amount;
        updateInlineTotal();
        
        // Highlight selected button
        document.querySelectorAll('.inline-nominal-btn').forEach(btn => {
            btn.classList.remove('border-emerald-600', 'bg-emerald-50');
            btn.classList.add('border-gray-300');
        });
        event.target.classList.remove('border-gray-300');
        event.target.classList.add('border-emerald-600', 'bg-emerald-50');
    }

    // Update inline total display when amount changes
    document.addEventListener('DOMContentLoaded', function() {
        const inlineAmountInput = document.getElementById('inline_amount');
        if (inlineAmountInput) {
            inlineAmountInput.addEventListener('input', updateInlineTotal);
        }
    });

    function updateInlineTotal() {
        const amount = parseInt(document.getElementById('inline_amount').value) || 0;
        const formattedAmount = 'Rp ' + amount.toLocaleString('id-ID');
        document.getElementById('inline_total_display').textContent = formattedAmount;
        document.getElementById('inline_summary_amount').textContent = formattedAmount;
    }
</script>
@endpush
@endsection
