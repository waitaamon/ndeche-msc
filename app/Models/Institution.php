<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'description', 'ip_address'];

    public function legalCases()
    {
        return $this->hasMany(LegalCase::class);
    }
}
