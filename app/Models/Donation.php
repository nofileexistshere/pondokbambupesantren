<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donation_campaign_id',
        'donor_name',
        'email',
        'phone',
        'amount',
        'message',
        'is_recurring',
        'payment_method',
        'status',
        'payment_reference',
        'paid_at',
        'is_anonymous',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_recurring' => 'boolean',
        'is_anonymous' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->belongsTo(DonationCampaign::class, 'donation_campaign_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($donation) {
            if ($donation->isDirty('status') && $donation->status === 'paid') {
                $campaign = $donation->campaign;
                if ($campaign) {
                    $campaign->current_amount += $donation->amount;
                    $campaign->donor_count += 1;
                    $campaign->save();
                }
            }
        });
    }
}
