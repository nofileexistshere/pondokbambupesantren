<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationCampaign;
use App\Models\RegularDonor;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $campaigns = DonationCampaign::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        
        // Calculate total stats
        $totalDonation = $campaigns->sum('current_amount');
        $totalDonors = $campaigns->sum('donor_count');
        $avgPercentage = $campaigns->avg('percentage');

        return view('donation.index', compact('campaigns', 'testimonials', 'totalDonation', 'totalDonors', 'avgPercentage'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donation_campaign_id' => 'required|exists:donation_campaigns,id',
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'amount' => 'required|numeric|min:10000',
            'message' => 'nullable|string',
            'payment_method' => 'required|in:QRIS,Transfer,E-Wallet',
            'is_recurring' => 'boolean',
            'is_anonymous' => 'boolean',
        ]);

        $donation = Donation::create($validated);

        // In real application, redirect to payment gateway
        return redirect()->back()->with('success', 'Terima kasih atas donasi Anda!');
    }

    public function storeRegularDonor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'monthly_amount' => 'required|numeric|min:50000',
            'payment_method' => 'required|in:Auto Debit,Transfer,E-Wallet',
        ]);

        $validated['start_date'] = now();
        $validated['is_active'] = true;

        RegularDonor::create($validated);

        return redirect()->back()->with('success', 'Terima kasih telah mendaftar sebagai donatur tetap!');
    }
}
