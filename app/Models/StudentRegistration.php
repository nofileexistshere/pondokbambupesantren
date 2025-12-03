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

    protected $appends = [
        'photo_url',
        'birth_certificate_url',
        'family_card_url',
        'health_certificate_url',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('uploads/' . $this->photo) : null;
    }

    public function getBirthCertificateUrlAttribute()
    {
        return $this->birth_certificate ? asset('uploads/' . $this->birth_certificate) : null;
    }

    public function getFamilyCardUrlAttribute()
    {
        return $this->family_card ? asset('uploads/' . $this->family_card) : null;
    }

    public function getHealthCertificateUrlAttribute()
    {
        return $this->health_certificate ? asset('uploads/' . $this->health_certificate) : null;
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
