<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegularDonor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'monthly_amount',
        'payment_method',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'monthly_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];
}
