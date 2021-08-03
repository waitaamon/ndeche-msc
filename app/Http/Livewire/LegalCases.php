<?php

namespace App\Http\Livewire;

use App\Jobs\SendNewLegalCaseNotifications;
use App\Models\Institution;
use App\Models\LegalCase;
use App\Models\SystemEvent;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class LegalCases extends Component
{
    public LegalCase $legalCase;
    public bool $showEditModal = false;
    public Collection $institutions;
    public Collection $investigators;
    public $systemEvents = [];
    public $selected_system_events = [];
    public string $search = '';

    protected $rules = [
        'legalCase.title' => 'required|string|max:255',
        'legalCase.institution_id' => 'required|integer',
        'legalCase.investigator_id' => 'required|integer',
        'legalCase.description' => 'required|string',
        'selected_system_events' => 'required'
    ];

    public function mount()
    {
        $this->institutions = Institution::all();

        $this->investigators = User::permission('investigate legal case')->get();

        $this->legalCase = $this->makeBlankLegalCase();
    }

    public function updatedLegalCaseInstitutionId($value)
    {

        $institution = $this->institutions->firstWhere('id', $value);

        $this->setInstitutionSystemEvents($institution);

    }

    public function setInstitutionSystemEvents($institution)
    {
        $this->systemEvents = SystemEvent::query()
            ->where('FromHost', $institution->ip_address)
            ->latest('ReceivedAt')
            ->limit(100)
            ->get();
    }

    public function create()
    {
        if ($this->legalCase->getKey()) $this->legalCase = $this->makeBlankLegalCase();

        $this->showEditModal = true;
    }

    public function makeBlankLegalCase()
    {
        return new LegalCase([
            'institution_id' => '',
            'investigator_id' => '',
        ]);
    }

    public function edit(LegalCase $legalCase)
    {
        if ($this->legalCase->isNot($legalCase)) $this->legalCase = $legalCase;

        $this->setInstitutionSystemEvents($legalCase->institution);

        $this->selected_system_events = array_map('strval', $legalCase->systemEvents->pluck('identifier')->toArray());

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->legalCase->user_id = auth()->id();
        $this->legalCase->save();

        $this->legalCase->systemEvents()->sync($this->selected_system_events);

        SendNewLegalCaseNotifications::dispatch($this->legalCase);

        $this->legalCase = $this->makeBlankLegalCase();
        $this->systemEvents = [];

        session()->flash('success', 'Legal case saved successfully');

        $this->showEditModal = false;
    }

    public function getLegalCasesQueryProperty()
    {
        return LegalCase::query()
            ->with('institution', 'user', 'investigator', 'judicialOfficer', 'systemEvents')
            ->when($this->search, fn($query, $search) => $query->search(['title'], $search));
    }

    public function getLegalCasesProperty()
    {
        return $this->legalCasesQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.legal-cases', [
            'legalCases' => $this->legalCases
        ]);
    }
}
