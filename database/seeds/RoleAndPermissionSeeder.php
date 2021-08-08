<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create parametrage permissions
        Permission::truncate();
        Role::truncate();
        Permission::create(['name' => 'edit parametrage']);
        Permission::create(['name' => 'delete parametrage']);
        Permission::create(['name' => 'create parametrage']);
        Permission::create(['name' => 'show parametrage']);
        Permission::create(['name' => 'parametrage']);

        // create articles permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'show articles']);
        Permission::create(['name' => 'articles']);

        // create articles permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'users']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'utilisateur']);

        // or may be done by chaining

        // secretaire
        $role = Role::create(['name' => 'secretaire'])
            ->givePermissionTo(['create articles', 'edit articles', 'delete articles', 'show articles', 'articles']);

        // manager
        $role = Role::create(['name' => 'manager'])
            ->givePermissionTo(['create articles', 'edit articles', 'delete articles', 'create users', 'delete users', 'edit users', 'edit parametrage', 'create parametrage', 'delete parametrage', 'show parametrage', 'articles', 'parametrage', 'users']);

        // super-admin
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
