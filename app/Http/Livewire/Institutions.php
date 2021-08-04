<?php

namespace App\Http\Livewire;

use App\Models\SystemEvent;
use Livewire\Component;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Collection;

class Institutions extends Component
{
    public Institution $institution;
    public $ipAddresses = [];
    public bool $showEditModal = false;
    public string $search = '';

    protected $rules = [
        'institution.name' => 'required|string|max:255',
        'institution.description' => 'nullable|string',
        'institution.email' => 'required|string|email|max:255',
        'institution.address' => 'required|string|max:255',
        'institution.ip_address' => 'required|string',
    ];

    public function mount()
    {
        $this->institution = $this->makeBlankInstitution();
//        $this->ipAddresses =
    }

    public function create()
    {
        if ($this->institution->getKey()) $this->institution = $this->makeBlankInstitution();

        $this->showEditModal = true;
    }

    public function makeBlankInstitution()
    {
        return new Institution();
    }

    public function edit(Institution $institution)
    {
        if ($this->institution->isNot($institution)) $this->institution = $institution;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->institution->save();

        $this->institution = $this->makeBlankInstitution();

        session()->flash('success', 'Institution saved successfully');

        $this->showEditModal = false;
    }

    public function getInstitutionsQueryProperty()
    {
        return Institution::query()
            ->withCount('legalCases')
            ->when($this->search, fn($query, $search) => $query->search(['name'], $search));
    }

    public function getInstitutionsProperty()
    {
        return $this->institutionsQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.institutions', [
            'institutions' => $this->institutions
        ]);
    }
}
