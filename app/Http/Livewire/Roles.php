<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public bool $showEditModal = false;
    public string $search = '';
    public Role $role;
    public  $permissions = [];

    protected $rules = [
        'role.name' => 'required|string|max:255',
        'permissions' => 'nullable|array'
    ];

    public function mount()
    {
        $this->role = $this->makeBlankRole();
    }

    public function create()
    {
        if ($this->role->getKey()) $this->role = $this->makeBlankRole();

        $this->showEditModal = true;
    }

    public function makeBlankRole()
    {
        return new Role();
    }

    public function edit(Role $role)
    {
        if ($this->role->isNot($role)) $this->role = $role;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->role->save();

        $this->role->permissions()->sync($this->permissions);

        session()->flash('success', 'Role saved successfully');

        $this->showEditModal = false;
    }

    public function getRolesQueryProperty()
    {
        return Role::query()
            ->withCount('users', 'permissions')
            ->when($this->search, fn($query, $search) => $query->search(['name'], $search));
    }

    public function getRolesProperty()
    {
        return $this->rolesQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.roles', [
            'roles' => $this->roles
        ]);
    }
}
