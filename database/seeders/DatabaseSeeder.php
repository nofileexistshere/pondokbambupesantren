<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@pondokbambu.ac.id',
            'password' => bcrypt('password'),
        ]);

        // Site Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Pondok Bambu', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Pesantren Modern', 'type' => 'text', 'group' => 'general'],
            ['key' => 'hero_title', 'value' => 'Membentuk Generasi Qurani Berakhlak Mulia', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Pendidikan Islam terpadu yang menggabungkan ilmu agama dan pengetahuan umum untuk mencetak generasi yang beriman, berilmu, dan berakhlak mulia', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'vision', 'value' => 'Menjadi pesantren modern yang unggul dalam mencetak generasi Qurani yang berakhlak mulia, berilmu luas, dan bermanfaat bagi umat', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'mission_1', 'value' => 'Menyelenggarakan pendidikan Islam yang komprehensif dan berkualitas', 'type' => 'text', 'group' => 'general'],
            ['key' => 'mission_2', 'value' => 'Membina santri menjadi hafidz Al-Quran yang berakhlak mulia', 'type' => 'text', 'group' => 'general'],
            ['key' => 'mission_3', 'value' => 'Mengintegrasikan ilmu agama dengan pengetahuan umum dan teknologi', 'type' => 'text', 'group' => 'general'],
            ['key' => 'mission_4', 'value' => 'Membangun karakter santri yang mandiri dan berdaya saing global', 'type' => 'text', 'group' => 'general'],
            ['key' => 'stat_students', 'value' => '850', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'stat_since', 'value' => '1998', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'stat_teachers', 'value' => '45', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'stat_programs', 'value' => '12', 'type' => 'number', 'group' => 'stats'],
            ['key' => 'whatsapp_number', 'value' => '6281234567890', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '+62 812-3456-7890', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'info@pondokbambu.ac.id', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address', 'value' => 'Jl. Raya Tajur No. 168, Bogor, Jawa Barat 16320', 'type' => 'textarea', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            \App\Models\SiteSetting::create($setting);
        }

        // Programs
        $programs = [
            [
                'name' => 'Tahfidz Al-Quran',
                'slug' => 'tahfidz-al-quran',
                'icon' => '📖',
                'description' => 'Program menghafal Al-Quran 30 juz dengan metode terbukti efektif dan bimbingan ustadz berpengalaman',
                'image' => 'https://readdy.ai/api/search-image?query=Young%20Indonesian%20students%20memorizing%20and%20reciting%20Quran%20in%20peaceful%20mosque%20setting%2C%20focused%20concentration%2C%20beautiful%20Islamic%20interior%20with%20green%20accents%2C%20spiritual%20learning%20atmosphere%2C%20soft%20natural%20lighting&width=600&height=800&seq=prog1&orientation=portrait',
                'duration' => '6 tahun',
                'schedule' => 'Senin - Jumat, 05.00 - 07.00 & 15.00 - 17.00',
                'target_age' => 'Santri usia 12-18 tahun',
                'features' => ['Metode talaqqi dan muroja\'ah intensif', 'Bimbingan ustadz hafidz berpengalaman', 'Target hafalan 1 juz per 2 bulan', 'Tahsin dan tajwid setiap minggu', 'Sertifikat hafidz setelah menyelesaikan 30 juz'],
                'sort_order' => 1,
            ],
            [
                'name' => 'Kitab Kuning',
                'slug' => 'kitab-kuning',
                'icon' => '📚',
                'description' => 'Kajian mendalam kitab-kitab klasik Islam dengan metode sorogan dan bandongan',
                'image' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20students%20studying%20classical%20Arabic%20books%20and%20kitab%20kuning%20in%20traditional%20pesantren%20classroom%2C%20scholarly%20atmosphere%2C%20warm%20lighting%2C%20educational%20setting%20with%20Islamic%20texts%20and%20manuscripts&width=800&height=400&seq=prog2&orientation=landscape',
                'duration' => '3 tahun',
                'schedule' => 'Senin - Sabtu, 13.00 - 15.00',
                'target_age' => 'Santri usia 15-20 tahun',
                'features' => [
                    'Kajian Fiqih, Tafsir, Hadits, dan Aqidah',
                    'Metode sorogan dan bandongan',
                    "Pembahasan kitab-kitab mu'tabar",
                    'Diskusi dan tanya jawab interaktif',
                    'Ujian kompetensi berkala',
                ],
                'sort_order' => 2,
            ],
            [
                'name' => 'Bahasa Arab & Inggris',
                'slug' => 'bahasa-arab-inggris',
                'icon' => '🌐',
                'description' => 'Penguasaan bahasa Arab dan Inggris untuk komunikasi global dan studi lanjut',
                'image' => 'https://readdy.ai/api/search-image?query=Indonesian%20students%20learning%20English%20and%20Arabic%20languages%20in%20modern%20classroom%20with%20technology%2C%20interactive%20learning%20environment%2C%20bright%20educational%20space%2C%20multilingual%20education%20setting&width=800&height=400&seq=prog3&orientation=landscape',
                'duration' => '3 tahun',
                'schedule' => 'Senin - Jumat, 13.00 - 15.00',
                'target_age' => 'Santri semua tingkat',
                'features' => [
                    'Pembelajaran 4 skill: listening, speaking, reading, writing',
                    'Conversation practice dengan native speaker',
                    'Persiapan TOEFL dan TOAFL',
                    'English dan Arabic day setiap minggu',
                    'Sertifikat kompetensi bahasa',
                ],
                'sort_order' => 3,
            ],
            [
                'name' => 'Teknologi & Komputer',
                'slug' => 'teknologi-komputer',
                'icon' => '💻',
                'description' => 'Pembelajaran teknologi informasi dan keterampilan digital untuk era modern',
                'duration' => '2 tahun',
                'schedule' => 'Rabu & Jumat, 15.00 - 17.00',
                'target_age' => 'Santri usia 13-20 tahun',
                'features' => [
                    'Microsoft Office dan Google Workspace',
                    'Desain grafis dan multimedia',
                    'Pemrograman dasar',
                    'Digital marketing dan media sosial',
                    'Sertifikat kompetensi IT',
                ],
                'sort_order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }

        // News
        $newsData = [
            [
                'title' => 'Santri Pondok Bambu Juara 1 MTQ Tingkat Provinsi',
                'slug' => 'santri-pondok-bambu-juara-1-mtq-tingkat-provinsi',
                'category' => 'Prestasi',
                'image' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20winning%20Quran%20recitation%20competition%20with%20trophy%20and%20certificates%2C%20celebration%20moment%2C%20proud%20achievement%2C%20formal%20event%20setting%20with%20Islamic%20decorations&width=600&height=400&seq=news1&orientation=landscape',
                'excerpt' => 'Muhammad Rizki berhasil meraih juara 1 Cabang Tilawah Quran tingkat provinsi yang diselenggarakan di Masjid Agung...',
                'content' => 'Alhamdulillah, santri Pondok Bambu atas nama Muhammad Rizki berhasil meraih juara 1 dalam cabang Tilawah Quran tingkat provinsi. Kompetisi yang diselenggarakan di Masjid Agung ini diikuti oleh lebih dari 50 peserta dari berbagai pesantren di seluruh provinsi. Prestasi ini merupakan buah dari pembelajaran dan pembinaan yang konsisten di Pondok Bambu.',
                'published_date' => now()->subDays(5),
                'is_published' => true,
            ],
            [
                'title' => 'Persiapan Menyambut Bulan Ramadan 1446 H',
                'slug' => 'persiapan-menyambut-bulan-ramadan-1446-h',
                'category' => 'Kegiatan',
                'image' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20Ramadan%20activities%20with%20students%20breaking%20fast%20together%2C%20communal%20iftar%20meal%2C%20spiritual%20gathering%2C%20warm%20evening%20atmosphere%20with%20lanterns%20and%20Islamic%20decorations&width=600&height=400&seq=news2&orientation=landscape',
                'excerpt' => 'Pesantren Pondok Bambu telah memulai persiapan menyambut bulan suci Ramadan dengan berbagai kegiatan spiritual dan pembinaan akhlak untuk seluruh santri...',
                'content' => 'Dalam rangka menyambut bulan suci Ramadan 1446 H, Pesantren Pondok Bambu telah mempersiapkan berbagai program dan kegiatan spiritual. Mulai dari kajian intensif, tadarus bersama, hingga persiapan untuk pelaksanaan tarawih dan qiyamul lail.',
                'published_date' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'title' => 'Pembukaan Fasilitas Perpustakaan Digital Modern',
                'slug' => 'pembukaan-fasilitas-perpustakaan-digital-modern',
                'category' => 'Pengumuman',
                'image' => 'https://readdy.ai/api/search-image?query=New%20modern%20facilities%20at%20Indonesian%20Islamic%20boarding%20school%20including%20library%2C%20computer%20lab%2C%20and%20study%20rooms%2C%20contemporary%20educational%20infrastructure%2C%20bright%20clean%20spaces%20with%20Islamic%20architectural%20elements&width=600&height=400&seq=news3&orientation=landscape',
                'excerpt' => 'Pondok Bambu meresmikan perpustakaan digital dengan koleksi ribuan buku Islam dan umum yang dapat diakses secara online maupun offline...',
                'content' => 'Hari ini, Pondok Bambu resmi meresmikan perpustakaan digital modern dengan koleksi lebih dari 5.000 buku Islam dan pengetahuan umum. Fasilitas ini dilengkapi dengan teknologi terkini untuk mendukung proses pembelajaran santri.',
                'published_date' => now()->subDays(1),
                'is_published' => true,
            ],
        ];

        foreach ($newsData as $news) {
            \App\Models\News::create($news);
        }

        // Donation Campaigns
        $campaigns = [
            [
                'name' => 'Beasiswa Santri',
                'slug' => 'beasiswa-santri',
                'icon' => '📖',
                'description' => 'Bantu santri kurang mampu mendapatkan pendidikan berkualitas',
                'target_amount' => 50000000,
                'current_amount' => 32500000,
                'donor_count' => 247,
                'percentage' => 65,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Pembangunan Asrama',
                'slug' => 'pembangunan-asrama',
                'icon' => '🏢',
                'description' => 'Renovasi dan pembangunan asrama santri yang nyaman',
                'target_amount' => 200000000,
                'current_amount' => 145000000,
                'donor_count' => 523,
                'percentage' => 72,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Perpustakaan Digital',
                'slug' => 'perpustakaan-digital',
                'icon' => '💻',
                'description' => 'Pengadaan buku dan fasilitas perpustakaan modern',
                'target_amount' => 30000000,
                'current_amount' => 18500000,
                'donor_count' => 156,
                'percentage' => 62,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Konsumsi Santri',
                'slug' => 'konsumsi-santri',
                'icon' => '🍽️',
                'description' => 'Penyediaan makanan bergizi untuk santri setiap hari',
                'target_amount' => 100000000,
                'current_amount' => 78000000,
                'donor_count' => 892,
                'percentage' => 78,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($campaigns as $campaign) {
            \App\Models\DonationCampaign::create($campaign);
        }

        // Testimonials
        $testimonials = [
            [
                'name' => 'Ahmad Hidayat',
                'avatar_initial' => 'AH',
                'avatar_color' => '#10B981',
                'message' => 'Semoga donasi ini bermanfaat untuk pendidikan santri. Barakallah.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Siti Fatimah',
                'avatar_initial' => 'SF',
                'avatar_color' => '#F59E0B',
                'message' => 'Alhamdulillah bisa ikut berkontribusi untuk pendidikan Islam.',
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }

        // Gallery
        $this->call(GallerySeeder::class);
    }
}
