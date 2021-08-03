<?php

namespace App\Http\Livewire;

use App\Jobs\LegalCaseAssignedJudicialOfficer;
use App\Models\LegalCase;
use App\Models\User;
use App\Notifications\JudicialOfficerAssignmentNotification;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class JudicialAdminActions extends Component
{
    public LegalCase $legalCase;
    public Collection $judicialOfficers;
    public bool $showEditModal = false;

    protected $rules = [
        'legalCase.judicial_officer_id' => 'required|integer'
    ];

    public function mount(LegalCase $legalCase)
    {
        $this->judicialOfficers = User::permission('prosecute legal case')->get();

        $this->legalCase = $legalCase;
    }

    public function create()
    {
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->legalCase->save();

        LegalCaseAssignedJudicialOfficer::dispatch($this->legalCase);

        session()->flash('flash.banner', 'Successfully updated legal case');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->to('/legal-cases/'.$this->legalCase->id);

    }
    public function render()
    {
        return view('livewire.judicial-admin-actions');
    }
}
