<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class Users extends Component
{
    public User $user;
    public bool $showEditModal = false;
    public string $search = '';
    public Collection $roles;
    public $selected_role = '';
    public string $password = '';

    protected $rules = [
        'user.name' => 'required|string|max:255',
        'user.email' => 'required|string|email|max:255',
        'password' => 'sometimes|string|max:255|min:4',
        'selected_role' => 'required|integer'
    ];

    public function mount()
    {
        $this->user = $this->makeBlankUser();

        $this->roles = Role::all();
    }

    public function create()
    {
        if ($this->user->getKey()) $this->user = $this->makeBlankUser();

        $this->showEditModal = true;
    }

    public function makeBlankUser()
    {
        return new User();
    }

    public function edit(User $user)
    {
        if ($this->user->isNot($user)) $this->user = $user;

        $this->selected_role = $user->roles()->first()->id;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->password ? $this->user->password = bcrypt($this->password) : null;

        $this->user->save();

        $this->user->syncRoles($this->selected_role);

        $this->user = $this->makeBlankUser();

        session()->flash('success', 'User saved successfully');

        $this->showEditModal = false;
    }

    public function getUsersQueryProperty()
    {
        return User::query()
            ->with('roles')
            ->when($this->search, fn($query, $search) => $query->search(['name', 'email'], $search));
    }

    public function getUsersProperty()
    {
        return $this->usersQuery->paginate(10);
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => $this->users
        ]);
    }
}
