<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            // Photos
            [
                'title' => 'Kegiatan Tahfidz Pagi',
                'description' => 'Santri sedang melakukan kegiatan tahfidz Al-Quran di pagi hari',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20memorizing%20Quran%20in%20morning%20session%2C%20peaceful%20atmosphere%2C%20natural%20lighting%2C%20focused%20learning%20environment%20with%20green%20accents&width=600&height=800&seq=gal1&orientation=portrait',
                'category' => 'Kegiatan Belajar',
                'views' => 150,
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Kajian Kitab Kuning',
                'description' => 'Santri belajar kitab kuning bersama ustadz',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20students%20studying%20classical%20Arabic%20books%20in%20traditional%20classroom%2C%20scholarly%20atmosphere%2C%20warm%20educational%20setting&width=600&height=800&seq=gal4&orientation=portrait',
                'category' => 'Kegiatan Belajar',
                'views' => 200,
                'sort_order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Kelas Bahasa Arab',
                'description' => 'Pembelajaran bahasa Arab di kelas',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20students%20learning%20Arabic%20language%20in%20modern%20classroom%2C%20interactive%20learning%2C%20educational%20setting%20with%20Arabic%20texts%20on%20board&width=600&height=800&seq=gal7&orientation=portrait',
                'category' => 'Kegiatan Belajar',
                'views' => 180,
                'sort_order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Olahraga Pagi',
                'description' => 'Kegiatan olahraga santri di pagi hari',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20doing%20morning%20exercise%20together%2C%20healthy%20lifestyle%2C%20outdoor%20activity%2C%20energetic%20youth&width=800&height=600&seq=gal8&orientation=landscape',
                'category' => 'Olahraga',
                'views' => 120,
                'sort_order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Wisuda Santri 2024',
                'description' => 'Prosesi wisuda santri tahun 2024',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20graduation%20ceremony%20with%20students%20in%20traditional%20attire%2C%20formal%20celebration%2C%20proud%20moment%2C%20Islamic%20decorations&width=800&height=600&seq=gal3&orientation=landscape',
                'category' => 'Wisuda',
                'views' => 300,
                'sort_order' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Ramadan Bersama',
                'description' => 'Kegiatan berbuka puasa bersama',
                'type' => 'photo',
                'file_path' => 'https://readdy.ai/api/search-image?query=Indonesian%20Islamic%20boarding%20school%20students%20breaking%20fast%20together%20during%20Ramadan%2C%20communal%20iftar%20meal%2C%20warm%20evening%20atmosphere%20with%20lanterns&width=800&height=600&seq=gal5&orientation=landscape',
                'category' => 'Ramadan',
                'views' => 250,
                'sort_order' => 6,
                'is_published' => true,
            ],
            
            // Videos
            [
                'title' => 'Profil Pondok Bambu',
                'description' => 'Video profil pesantren Pondok Bambu',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'thumbnail' => 'https://images.unsplash.com/photo-1564939558297-fc396f18e5c7?w=800&h=600&fit=crop',
                'category' => 'Semua',
                'views' => 2500,
                'duration' => '5:32',
                'sort_order' => 7,
                'is_published' => true,
            ],
            [
                'title' => 'Kegiatan Santri Sehari-hari',
                'description' => 'Dokumentasi kegiatan santri dari pagi hingga malam',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'thumbnail' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&h=600&fit=crop',
                'category' => 'Kegiatan Belajar',
                'views' => 1800,
                'duration' => '8:15',
                'sort_order' => 8,
                'is_published' => true,
            ],
            [
                'title' => 'Prestasi Santri di MTQ Provinsi',
                'description' => 'Santri meraih juara di MTQ tingkat provinsi',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=example3',
                'thumbnail' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=800&h=600&fit=crop',
                'category' => 'Semua',
                'views' => 3200,
                'duration' => '3:45',
                'sort_order' => 9,
                'is_published' => true,
            ],
            [
                'title' => 'Fasilitas Pondok Bambu',
                'description' => 'Tour virtual fasilitas pesantren',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=example4',
                'thumbnail' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
                'category' => 'Fasilitas',
                'views' => 1500,
                'duration' => '6:20',
                'sort_order' => 10,
                'is_published' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
