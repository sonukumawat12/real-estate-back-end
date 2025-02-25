<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles for the api guard
        Role::create(['name' => 'admin', 'guard_name' => 'api']);
        // Add other roles as needed
    }
}
