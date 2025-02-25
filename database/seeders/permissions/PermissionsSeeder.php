<?php

namespace Database\Seeders\permissions;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles Create for API
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'api']);
        $agentRole = Role::firstOrCreate(['name' => 'agent', 'guard_name' => 'api']);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'api']);

        // Permissions Define
        $permissions = [
            ['name' => 'create blog', 'group_name' => 'Blog', 'guard_name' => 'api'],
            ['name' => 'read blog', 'group_name' => 'Blog', 'guard_name' => 'api'],
            ['name' => 'edit blog', 'group_name' => 'Blog', 'guard_name' => 'api'],
            ['name' => 'delete blog', 'group_name' => 'Blog', 'guard_name' => 'api'],
            ['name' => 'create lead', 'group_name' => 'Lead', 'guard_name' => 'api'],
            ['name' => 'read lead', 'group_name' => 'Lead', 'guard_name' => 'api'],
            ['name' => 'edit lead', 'group_name' => 'Lead', 'guard_name' => 'api'],
            ['name' => 'delete lead', 'group_name' => 'Lead', 'guard_name' => 'api'],
            ['name' => 'create property', 'group_name' => 'Property', 'guard_name' => 'api'],
            ['name' => 'read property', 'group_name' => 'Property', 'guard_name' => 'api'],
            ['name' => 'edit property', 'group_name' => 'Property', 'guard_name' => 'api'],
            ['name' => 'delete property', 'group_name' => 'Property', 'guard_name' => 'api'],
            ['name' => 'approve property', 'group_name' => 'Property', 'guard_name' => 'api'],
            ['name' => 'create agent', 'group_name' => 'Agent', 'guard_name' => 'api'],
            ['name' => 'read agent', 'group_name' => 'Agent', 'guard_name' => 'api'],
            ['name' => 'edit agent', 'group_name' => 'Agent', 'guard_name' => 'api'],
            ['name' => 'delete agent', 'group_name' => 'Agent', 'guard_name' => 'api'],
            ['name' => 'assign lead', 'group_name' => 'Agent', 'guard_name' => 'api'],
            ['name' => 'create client lead', 'group_name' => 'Client Lead', 'guard_name' => 'api'],
            ['name' => 'read client lead', 'group_name' => 'Client Lead', 'guard_name' => 'api'],
            ['name' => 'edit client lead', 'group_name' => 'Client Lead', 'guard_name' => 'api'],
            ['name' => 'delete client lead', 'group_name' => 'Client Lead', 'guard_name' => 'api'],
            ['name' => 'ban client lead', 'group_name' => 'Client Lead', 'guard_name' => 'api'],
            ['name' => 'read inquiry', 'group_name' => 'Inquiry', 'guard_name' => 'api'],
            ['name' => 'delete inquiry', 'group_name' => 'Inquiry', 'guard_name' => 'api'],
            ['name' => 'reply inquiry', 'group_name' => 'Inquiry', 'guard_name' => 'api'],
            ['name' => 'create subscription', 'group_name' => 'Subscription', 'guard_name' => 'api'],
            ['name' => 'read subscription', 'group_name' => 'Subscription', 'guard_name' => 'api'],
            ['name' => 'edit subscription', 'group_name' => 'Subscription', 'guard_name' => 'api'],
            ['name' => 'delete subscription', 'group_name' => 'Subscription', 'guard_name' => 'api'],
            ['name' => 'read payment', 'group_name' => 'Payment', 'guard_name' => 'api'],
            ['name' => 'refund payment', 'group_name' => 'Payment', 'guard_name' => 'api'],
            ['name' => 'read report', 'group_name' => 'Report', 'guard_name' => 'api'],
            ['name' => 'generate report', 'group_name' => 'Report', 'guard_name' => 'api'],
            ['name' => 'export report', 'group_name' => 'Report', 'guard_name' => 'api'],
            ['name' => 'read settings', 'group_name' => 'Settings', 'guard_name' => 'api'],
            ['name' => 'update settings', 'group_name' => 'Settings', 'guard_name' => 'api'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'guard_name' => $permission['guard_name'],
                'group_name' => $permission['group_name'],
            ]);
        }


    }
}
