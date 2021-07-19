<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Investigators extends Component
{
    public bool $showEditModal = false;
    public string $search = '';
    public User $investigator;
    public string $password = '';

    protected $rules = [
        'investigator.name' => 'required|string|max:255',
        'investigator.email' => 'required|string|email|max:255',
        'password' => 'nullable|string|max:255|min:3',
        'investigator.category' => 'nullable',
        'investigator.admin' => 'nullable',
        'investigator.status' => 'nullable',
    ];

    public function mount()
    {
        $this->investigator = $this->makeBlankInvestigator();
    }

    public function create()
    {
        if ($this->investigator->getKey()) $this->investigator = $this->makeBlankInvestigator();

        $this->showEditModal = true;
    }

    public function makeBlankInvestigator()
    {
        return new User();
    }

    public function edit(User $investigator)
    {
        if ($this->investigator->isNot($investigator)) $this->investigator = $investigator;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->investigator->password = bcrypt($this->password);
        $this->investigator->status = 'active';
        $this->investigator->category = 'investigator';
        $this->investigator->admin = false;
        $this->investigator->save();

        session()->flash('success', 'Investigator saved successfully');

        $this->showEditModal = false;
    }

    public function getInvestigatorsQueryProperty()
    {
        return User::query()
            ->when($this->search, fn($query, $search) => $query->search(['name', 'email'], $search));
    }

    public function getInvestigatorsProperty()
    {
        return $this->investigatorsQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.investigators', [
            'investigators' => $this->investigators
        ]);
    }
}
