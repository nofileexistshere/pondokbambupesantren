<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('is_published', true);

        if ($request->has('category') && $request->category != 'Semua') {
            $query->where('category', $request->category);
        }

        $news = $query->orderBy('published_date', 'desc')->paginate(9);
        $categories = ['Semua', 'Prestasi', 'Kegiatan', 'Pengumuman'];

        return view('news.index', compact('news', 'categories'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('views');
        $relatedNews = News::where('is_published', true)
            ->where('id', '!=', $news->id)
            ->where('category', $news->category)
            ->take(3)
            ->get();

        return view('news.show', compact('news', 'relatedNews'));
    }
}
