<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        // Load all photos and videos (filtering done client-side)
        $photos = Gallery::where('is_published', true)
            ->where('type', 'photo')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $videos = Gallery::where('is_published', true)
            ->where('type', 'video')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $categories = ['Semua', 'Kegiatan Belajar', 'Olahraga', 'Wisuda', 'Ramadan', 'Fasilitas'];

        return view('gallery.index', compact('photos', 'videos', 'categories'));
    }
}
