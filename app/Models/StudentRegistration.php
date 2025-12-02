<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    protected $fillable = [
        'full_name',
        'birth_place',
        'birth_date',
        'gender',
        'address',
        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_occupation',
        'program_id',
        'program_notes',
        'photo',
        'birth_certificate',
        'family_card',
        'health_certificate',
        'status',
        'admin_notes',
        'submitted_at',
        'verified_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'submitted_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
