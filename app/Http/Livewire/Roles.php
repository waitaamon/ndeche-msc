<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public bool $showEditModal = false;
    public string $search = '';
    public Role $role;
    public  Collection $permissions;
    public $selected_permissions = [];

    protected $rules = [
        'role.name' => 'required|string|max:255',
        'selected_permissions' => 'nullable|array'
    ];

    public function mount()
    {
        $this->role = $this->makeBlankRole();
        $this->permissions = Permission::all();
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

        $this->selected_permissions = array_map('strval', $role->permissions->pluck('id')->toArray());

        $this->showEditModal = true;
    }

    public function save()
    {

        $this->validate();

        $this->role->guard_name = 'web';
        $this->role->save();

        $this->role->syncPermissions($this->selected_permissions);

        session()->flash('success', 'Role saved successfully');

        $this->showEditModal = false;
    }

    public function getRolesQueryProperty()
    {
        return Role::query()
            ->withCount('permissions')
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
