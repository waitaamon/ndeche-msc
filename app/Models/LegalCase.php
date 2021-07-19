<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = ['institution_id', 'user_id', 'investigation_officer_id', 'judicial_officer_id', 'description', 'status'];


}
