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

        // create permissions
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'moderator']);
        Permission::create(['name' => 'director']);
        Permission::create(['name' => 'publisher']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('admin');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['moderator', 'director', 'publisher']);

        $role = Role::create(['name' => 'director']);
        $role->givePermissionTo('director');

        $role = Role::create(['name' => 'publisher']);
        $role->givePermissionTo('publisher');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::findByID(1);
        $user->assignRole('admin');
    }
}
