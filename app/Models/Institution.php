<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany};

class Institution extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'address', 'description', 'ip_address'];

    public function legalCases(): HasMany
    {
        return $this->hasMany(LegalCase::class);
    }

    public function systemEvents(): HasMany
    {
        return $this->hasMany(SystemEvent::class, 'FromHost', 'ip_address');
    }
}
