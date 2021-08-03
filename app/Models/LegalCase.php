<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = ['institution_id', 'user_id', 'investigation_officer_id', 'judicial_officer_id', 'description', 'status'];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function investigationOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investigation_officer_id');
    }

    public function judicialOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'judicial_officer_id');
    }

}
