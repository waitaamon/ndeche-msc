<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};
use Illuminate\Support\Str;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id', 'user_id', 'investigator_id', 'judicial_officer_id', 'title', 'slug', 'description',
        'investigator_remarks', 'judicial_officer_remarks', 'judge_remarks', 'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(fn(LegalCase $legalCase) => $legalCase->title = Str::slug($legalCase->title));
    }

    CONST STATUSES = ['new', 'published to judiciary', 'assigned judicial officer', 'concluded', 'published to public'];

    public function scopeUnderInvestigations(Builder $builder):Builder
    {
        return $builder->where('status', '!=', 'concluded')->where('status', '!=', 'published to public');
    }

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
