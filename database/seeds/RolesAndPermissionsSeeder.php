<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create Permission
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'moderator']);
        Permission::create(['name' => 'director']);
        Permission::create(['name' => 'publisher']);
        Permission::create(['name' => 'retailer']);
        Permission::create(['name' => 'role']);
        Permission::create(['name' => 'advertisement']);
        Permission::create(['name' => 'video']);
        Permission::create(['name' => 'customer']);

        // create Role

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());


        Role::create(['name' => 'admin'])->givePermissionTo([
            'admin', 'director', 'publisher', 'retailer', 'video', 'advertisement'
        ]);

        Role::create(['name' => 'moderator'])->givePermissionTo([
            'admin', 'director', 'publisher', 'retailer', 'video', 'advertisement'
        ]);

        Role::create(['name' => 'director'])->givePermissionTo([
            'director', 'advertisement', 'video'
        ]);

        Role::create(['name' => 'publisher'])->givePermissionTo([
            'publisher'
        ]);
        Role::create(['name' => 'retailer'])->givePermissionTo([
            'retailer', 'advertisement'
        ]);

        Role::create(['name' => 'customer'])->givePermissionTo([
            'customer'
        ]);

    }
}
