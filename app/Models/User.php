<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = ['name', 'email', 'password', 'category', 'admin', 'status'];

    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret',];

    protected $casts = ['email_verified_at' => 'datetime',];

    protected $appends = ['profile_photo_url',];

    public function investigatorCases(): HasMany
    {
        return $this->hasMany(LegalCase::class, 'investigation_officer_id');
    }
}
