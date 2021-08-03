<?php

namespace App\Jobs;

use App\Models\LegalCase;
use App\Notifications\JudicialOfficerAssignmentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LegalCaseAssignedJudicialOfficer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected LegalCase $legalCase;

    public function __construct(LegalCase $legalCase)
    {
        $this->legalCase = $legalCase;
    }

    public function handle()
    {
        $this->legalCase->judicialOfficer->notify(new JudicialOfficerAssignmentNotification($this->legalCase));
    }
}
