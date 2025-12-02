<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Program;
use App\Models\DonationCampaign;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $latestNews = News::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->take(3)
            ->get();
        $programs = Program::where('is_active', true)
            ->where('name', '!=', 'Komputer & Teknologi')
            ->orderBy('sort_order')
            ->take(3)
            ->get();
        $donationCampaigns = DonationCampaign::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('settings', 'latestNews', 'programs', 'donationCampaigns', 'testimonials'));
    }
}
