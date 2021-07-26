<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $file = resource_path('var/permissions.json');

        $permissions =  (File::exists($file)) ? json_decode(file_get_contents($file), true) : [];

        collect($permissions)->each(fn ($permission) => Permission::create(['name' => $permission['name']]));
    }
}
