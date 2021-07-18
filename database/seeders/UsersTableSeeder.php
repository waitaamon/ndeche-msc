<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            ['name' => 'Super Admin', 'email' => 'admin@cases.com', 'password' => bcrypt('password'), 'admin' => true, 'category' => 'admin'],
            ['name' => 'John Ndeche', 'email' => 'john@cases.com', 'password' => bcrypt('password'), 'admin' => true, 'category' => 'admin'],
        ];

        collect($users)->each(fn($user) => User::create($user));
    }
}
