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
        Permission::create(['name' => 'permission']);
        Permission::create(['name' => 'customer']);


        // create Role

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());


        Role::create(['name' => 'admin'])->givePermissionTo([
            'admin', 'role', 'permission'
        ]);

        Role::create(['name' => 'moderator'])->givePermissionTo([
            'moderator', 'director', 'publisher'
        ]);

        Role::create(['name' => 'director'])->givePermissionTo([
            'director'
        ]);

        Role::create(['name' => 'publisher'])->givePermissionTo([
            'publisher'
        ]);
        Role::create(['name' => 'retailer'])->givePermissionTo([
            'retailer'
        ]);

        Role::create(['name' => 'customer'])->givePermissionTo([
            'customer'
        ]);

    }
}
