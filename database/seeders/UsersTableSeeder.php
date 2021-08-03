<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'admin@cases.com', 'password' => bcrypt('password'), 'admin' => true],
            ['name' => 'John Ndeche', 'email' => 'john@cases.com', 'password' => bcrypt('password'), 'admin' => true],
        ];

        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);

        $admin->syncPermissions(Permission::all()->pluck('id'));

        collect($users)->each(function ($user) use ($admin) {
            $usr = User::create($user);
            $usr->syncRoles($admin->id);
        });
    }
}
