@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru - Pondok Bambu')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 mt-20">
    <!-- Header -->
    <section class="bg-emerald-600 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Pendaftaran Santri Baru</h1>
            <p class="text-xl text-emerald-100">Bergabunglah dengan Pesantren Pondok Bambu untuk pendidikan Islam berkualitas</p>
        </div>
    </section>

<!-- Registration Form -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Step Indicator -->
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-6">
                <div class="flex justify-between items-center">
                    <div id="step-1" class="step-indicator active flex flex-col items-center">
                        <div class="step-circle">1</div>
                        <span class="text-xs mt-2 hidden md:block">Data Pribadi</span>
                    </div>
                    <div class="flex-1 h-1 bg-emerald-400 mx-2"></div>
                    <div id="step-2" class="step-indicator flex flex-col items-center">
                        <div class="step-circle">2</div>
                        <span class="text-xs mt-2 hidden md:block">Data Orang Tua</span>
                    </div>
                    <div class="flex-1 h-1 bg-emerald-400 mx-2"></div>
                    <div id="step-3" class="step-indicator flex flex-col items-center">
                        <div class="step-circle">3</div>
                        <span class="text-xs mt-2 hidden md:block">Pilihan Program</span>
                    </div>
                    <div class="flex-1 h-1 bg-emerald-400 mx-2"></div>
                    <div id="step-4" class="step-indicator flex flex-col items-center">
                        <div class="step-circle">4</div>
                        <span class="text-xs mt-2 hidden md:block">Upload Dokumen</span>
                    </div>
                    <div class="flex-1 h-1 bg-emerald-400 mx-2"></div>
                    <div id="step-5" class="step-indicator flex flex-col items-center">
                        <div class="step-circle">5</div>
                        <span class="text-xs mt-2 hidden md:block">Konfirmasi</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm" class="p-8 md:p-12">
                @csrf

                <!-- Step 1: Data Pribadi -->
                <div id="form-step-1" class="form-step active">
                    <h2 class="text-2xl font-bold mb-6">Data Pribadi Calon Santri</h2>
                    <p class="text-gray-600 mb-8">Lengkapi data pribadi calon santri dengan benar</p>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap *</label>
                            <input type="text" name="full_name" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                   placeholder="Masukkan nama lengkap sesuai akta kelahiran">
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Tempat Lahir *</label>
                                <input type="text" name="birth_place" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                       placeholder="Kota kelahiran">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Tanggal Lahir *</label>
                                <input type="date" name="birth_date" required
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Jenis Kelamin *</label>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="gender" value="Laki-laki" required class="peer sr-only">
                                    <div class="border-2 border-gray-300 rounded-xl p-4 text-center peer-checked:border-emerald-600 peer-checked:bg-emerald-50 hover:border-emerald-400 transition">
                                        <div class="font-semibold">Laki-laki</div>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="gender" value="Perempuan" required class="peer sr-only">
                                    <div class="border-2 border-gray-300 rounded-xl p-4 text-center peer-checked:border-emerald-600 peer-checked:bg-emerald-50 hover:border-emerald-400 transition">
                                        <div class="font-semibold">Perempuan</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Alamat Lengkap *</label>
                            <textarea name="address" required rows="4"
                                      class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                      placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota, Provinsi"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Data Orang Tua/Wali -->
                <div id="form-step-2" class="form-step hidden">
                    <h2 class="text-2xl font-bold mb-6">Data Orang Tua/Wali</h2>
                    <p class="text-gray-600 mb-8">Informasi orang tua atau wali calon santri</p>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama Orang Tua/Wali *</label>
                            <input type="text" name="parent_name" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                   placeholder="Nama lengkap orang tua/wali">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">No. HP Orang Tua/Wali *</label>
                            <input type="text" name="parent_phone" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email Orang Tua/Wali</label>
                            <input type="email" name="parent_email"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                   placeholder="email@example.com">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pekerjaan Orang Tua/Wali</label>
                            <input type="text" name="parent_occupation"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                   placeholder="Pekerjaan orang tua/wali">
                        </div>
                    </div>
                </div>

                <!-- Step 3: Pilihan Program -->
                <div id="form-step-3" class="form-step hidden">
                    <h2 class="text-2xl font-bold mb-6">Pilihan Program</h2>
                    <p class="text-gray-600 mb-8">Pilih program pendidikan yang diminati</p>

                    <div class="space-y-4 mb-6">
                        @foreach($programs as $program)
                        <label class="relative cursor-pointer block">
                            <input type="radio" name="program_id" value="{{ $program->id }}" required class="peer sr-only">
                            <div class="border-2 border-gray-300 rounded-2xl p-6 peer-checked:border-emerald-600 peer-checked:bg-emerald-50 hover:border-emerald-400 transition">
                                <div class="flex items-start">
                                    <div class="text-4xl mr-4">{{ $program->icon ?? '📖' }}</div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-bold mb-2">{{ $program->name }}</h3>
                                        <p class="text-gray-600 mb-3">{{ $program->description }}</p>
                                        <div class="flex flex-wrap gap-4 text-sm">
                                            @if($program->duration)
                                            <span class="bg-gray-100 px-3 py-1 rounded-full">
                                                <strong>Durasi:</strong> {{ $program->duration }}
                                            </span>
                                            @endif
                                            @if($program->target_age)
                                            <span class="bg-gray-100 px-3 py-1 rounded-full">
                                                <strong>Target:</strong> {{ $program->target_age }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Catatan Tambahan (Opsional)</label>
                        <textarea name="program_notes" rows="4"
                                  class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none"
                                  placeholder="Alasan memilih program ini atau pertanyaan lainnya..."></textarea>
                    </div>
                </div>

                <!-- Step 4: Upload Dokumen -->
                <div id="form-step-4" class="form-step hidden">
                    <h2 class="text-2xl font-bold mb-6">Upload Dokumen</h2>
                    <p class="text-gray-600 mb-8">Unggah dokumen-dokumen yang diperlukan</p>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Pas Foto 3x4
                                <span class="text-sm font-normal text-gray-500">(Max 2MB, JPG/PNG)</span>
                            </label>
                            <input type="file" name="photo" accept="image/*"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Akta Kelahiran
                                <span class="text-sm font-normal text-gray-500">(Max 2MB, PDF/JPG/PNG)</span>
                            </label>
                            <input type="file" name="birth_certificate" accept=".pdf,image/*"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Kartu Keluarga
                                <span class="text-sm font-normal text-gray-500">(Max 2MB, PDF/JPG/PNG)</span>
                            </label>
                            <input type="file" name="family_card" accept=".pdf,image/*"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">
                                Surat Keterangan Sehat
                                <span class="text-sm font-normal text-gray-500">(Max 2MB, PDF/JPG/PNG)</span>
                            </label>
                            <input type="file" name="health_certificate" accept=".pdf,image/*"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-emerald-600 focus:outline-none">
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                            <p class="text-sm text-blue-800">
                                <strong>Catatan:</strong> Dokumen yang belum lengkap dapat dilengkapi kemudian setelah diterima.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Konfirmasi -->
                <div id="form-step-5" class="form-step hidden">
                    <div class="text-center mb-8">
                        <div class="inline-block bg-emerald-100 p-4 rounded-full mb-4">
                            <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Konfirmasi Pendaftaran</h2>
                        <p class="text-gray-600 text-lg">Pastikan semua data yang Anda masukkan sudah benar</p>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                        <h3 class="font-bold text-lg mb-4">Ringkasan Data:</h3>
                        <div id="summary" class="space-y-3 text-gray-700">
                            <!-- Summary will be populated by JavaScript -->
                        </div>
                    </div>

                    <div class="bg-emerald-50 border border-emerald-500 rounded-xl p-6 mb-6">
                        <h4 class="font-semibold text-emerald-900 mb-3">Langkah Selanjutnya:</h4>
                        <ol class="list-decimal list-inside space-y-2 text-sm text-emerald-800">
                            <li>Setelah submit, kami akan mengirim email konfirmasi</li>
                            <li>Tim kami akan menghubungi Anda dalam 1-2 hari kerja</li>
                            <li>Proses verifikasi dokumen memakan waktu 3-5 hari kerja</li>
                            <li>Jika diterima, Anda akan dihubungi untuk proses selanjutnya</li>
                        </ol>
                    </div>

                    <label class="flex items-center mb-6 cursor-pointer">
                        <input type="checkbox" required id="confirmCheck" class="w-5 h-5 text-emerald-600 rounded mr-3">
                        <span class="text-gray-700">
                            Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan
                        </span>
                    </label>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8 pt-8 border-t border-gray-200">
                    <button type="button" id="prevBtn" onclick="changeStep(-1)" class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold hidden">
                        ← Kembali
                    </button>
                    <div class="flex-1"></div>
                    <button type="button" id="nextBtn" onclick="changeStep(1)" class="px-8 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition font-semibold">
                        Lanjut →
                    </button>
                    <button type="submit" id="submitBtn" class="px-8 py-3 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition font-semibold hidden">
                        Submit Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('styles')
<style>
    .step-indicator .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: all 0.3s;
    }
    .step-indicator.active .step-circle {
        background: white;
        color: #0d9488;
        transform: scale(1.1);
    }
    .step-indicator.active span {
        color: white;
        font-weight: 600;
    }
    .step-indicator span {
        color: rgba(255, 255, 255, 0.7);
    }
</style>
@endpush

@push('scripts')
<script>
    let currentStep = 1;
    const totalSteps = 5;

    function changeStep(direction) {
        // Validate current step before moving
        if (direction === 1 && !validateStep(currentStep)) {
            return;
        }

        const currentStepEl = document.getElementById(`form-step-${currentStep}`);
        const currentStepIndicator = document.getElementById(`step-${currentStep}`);
        
        currentStep += direction;

        if (currentStep < 1) currentStep = 1;
        if (currentStep > totalSteps) currentStep = totalSteps;

        // Hide all steps
        document.querySelectorAll('.form-step').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('active');
        });

        // Show current step
        const newStepEl = document.getElementById(`form-step-${currentStep}`);
        newStepEl.classList.remove('hidden');
        newStepEl.classList.add('active');

        // Update step indicators
        document.querySelectorAll('.step-indicator').forEach((el, index) => {
            if (index + 1 <= currentStep) {
                el.classList.add('active');
            } else {
                el.classList.remove('active');
            }
        });

        // Update buttons
        document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
        document.getElementById('nextBtn').classList.toggle('hidden', currentStep === totalSteps);
        document.getElementById('submitBtn').classList.toggle('hidden', currentStep !== totalSteps);

        // Populate summary on last step
        if (currentStep === totalSteps) {
            populateSummary();
        }

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateStep(step) {
        const stepEl = document.getElementById(`form-step-${step}`);
        const inputs = stepEl.querySelectorAll('input[required], select[required], textarea[required]');
        
        for (let input of inputs) {
            if (!input.value && input.type !== 'radio') {
                alert('Mohon lengkapi semua field yang wajib diisi');
                input.focus();
                return false;
            }
            if (input.type === 'radio') {
                const name = input.name;
                const checked = stepEl.querySelector(`input[name="${name}"]:checked`);
                if (!checked) {
                    alert('Mohon pilih salah satu opsi');
                    return false;
                }
            }
        }
        return true;
    }

    function populateSummary() {
        const form = document.getElementById('registrationForm');
        const formData = new FormData(form);
        let summary = '';

        // Personal Data
        summary += '<div class="mb-4"><strong>Data Pribadi:</strong></div>';
        summary += `<div class="ml-4 space-y-1">`;
        summary += `<div>Nama: ${formData.get('full_name') || '-'}</div>`;
        summary += `<div>Tempat, Tanggal Lahir: ${formData.get('birth_place') || '-'}, ${formData.get('birth_date') || '-'}</div>`;
        summary += `<div>Jenis Kelamin: ${formData.get('gender') || '-'}</div>`;
        summary += `</div>`;

        // Parent Data
        summary += '<div class="mt-4 mb-4"><strong>Data Orang Tua:</strong></div>';
        summary += `<div class="ml-4 space-y-1">`;
        summary += `<div>Nama: ${formData.get('parent_name') || '-'}</div>`;
        summary += `<div>No. HP: ${formData.get('parent_phone') || '-'}</div>`;
        summary += `</div>`;

        // Program
        const selectedProgram = document.querySelector('input[name="program_id"]:checked');
        if (selectedProgram) {
            const programName = selectedProgram.closest('label').querySelector('h3').textContent;
            summary += '<div class="mt-4 mb-4"><strong>Program Dipilih:</strong></div>';
            summary += `<div class="ml-4">${programName}</div>`;
        }

        document.getElementById('summary').innerHTML = summary;
    }

    document.addEventListener('DOMContentLoaded', () => {
    const check = document.getElementById('confirmCheck');
    const submitBtn = document.getElementById('submitBtn');

    check.addEventListener('change', () => {
        submitBtn.disabled = !check.checked;

        if (check.checked) {
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    });

    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
});

</script>
@endpush
@endsection
