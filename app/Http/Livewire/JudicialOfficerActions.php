<?php

namespace App\Http\Livewire;

use App\Models\LegalCase;
use Livewire\Component;

class JudicialOfficerActions extends Component
{
    public LegalCase $legalCase;
    public bool $showEditModal = false;

    protected $rules = [
        'legalCase.judicial_officer_remarks' => 'required|string'
    ];

    public function mount(LegalCase $legalCase)
    {
        $this->legalCase = $legalCase;
    }

    public function create()
    {
        $this->showEditModal = true;
    }

    public function publish()
    {
        $this->legalCase->status = 'concluded';
        $this->legalCase->save();

        session()->flash('flash.banner', 'Successfully updated legal case');
        session()->flash('flash.bannerStyle', 'success');


        return redirect()->to('/legal-cases/'.$this->legalCase->id);
    }

    public function save()
    {
        $this->validate();
        $this->legalCase->save();

        session()->flash('flash.banner', 'Successfully updated legal case');
        session()->flash('flash.bannerStyle', 'success');


        return redirect()->to('/legal-cases/'.$this->legalCase->id);
    }

    public function render()
    {
        return view('livewire.judicial-officer-actions');
    }
}
