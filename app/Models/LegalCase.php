<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id', 'user_id', 'investigator_id', 'judicial_officer_id', 'title', 'description',
        'investigator_remarks', 'judicial_officer_remarks', 'judge_remarks', 'status'
    ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function investigator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investigator_id');
    }

    public function judicialOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'judicial_officer_id');
    }

    public function systemEvents(): BelongsToMany
    {
        return $this->belongsToMany(
            SystemEvent::class,
            'legal_case_system_event',
            'legal_case_id',
            'system_event_id',
            'id',
            'identifier'
        );
    }
}
