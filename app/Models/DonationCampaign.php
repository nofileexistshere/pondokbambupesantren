<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DonationCampaign extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'target_amount',
        'current_amount',
        'donor_count',
        'percentage',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($campaign) {
            if (empty($campaign->slug)) {
                $campaign->slug = Str::slug($campaign->name);
            }
        });

        static::saving(function ($campaign) {
            if ($campaign->target_amount > 0) {
                $campaign->percentage = min(100, round(($campaign->current_amount / $campaign->target_amount) * 100));
            }
        });
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
