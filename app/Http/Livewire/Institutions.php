<?php

namespace App\Http\Livewire;

use App\Models\Institution;
use Livewire\Component;

class Institutions extends Component
{
    public Institution $institution;
    public bool $showEditModal = false;

    protected $rules = [
        'institution.name' => 'required|string|min:3',
        'institution.description' => 'nullable|string|max:500',
        'institution.ip_address' => 'required|ip',
    ];

    public function mount()
    {
        $this->institution = new Institution();
    }

    public function save()
    {
        $this->validate();

        $this->institution->save();

        $this->showEditModal = false;

        session()->flash('flash.banner', 'Successfully added institution');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->to('/institutions');

    }

    public function create()
    {
        $this->showEditModal = true;
    }

    public function render()
    {
        return view('livewire.institutions');
    }
}
