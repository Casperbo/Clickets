<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('create events');

        $role = Role::create(['name' => 'company']);
        $role->givePermissionTo(['create events', 'edit events', 'delete events']);

        $role = Role::create(['name' => 'verified-company']);
        $role->givePermissionTo(['create events', 'edit events', 'delete events']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['create events', 'edit events', 'delete events']);

        \App\User::find(1)->assignRole('user');
        \App\User::find(2)->assignRole('company');
        \App\User::find(3)->assignRole('verified-company');

    }
}