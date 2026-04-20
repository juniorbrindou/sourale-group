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
        Permission::firstOrCreate(['name' => 'edit parametrage']);
        Permission::firstOrCreate(['name' => 'delete parametrage']);
        Permission::firstOrCreate(['name' => 'create parametrage']);
        Permission::firstOrCreate(['name' => 'show parametrage']);
        Permission::firstOrCreate(['name' => 'parametrage']);

        // create articles permissions
        Permission::firstOrCreate(['name' => 'create articles']);
        Permission::firstOrCreate(['name' => 'edit articles']);
        Permission::firstOrCreate(['name' => 'delete articles']);
        Permission::firstOrCreate(['name' => 'show articles']);
        Permission::firstOrCreate(['name' => 'articles']);

        // create articles permissions
        Permission::firstOrCreate(['name' => 'create users']);
        Permission::firstOrCreate(['name' => 'edit users']);
        Permission::firstOrCreate(['name' => 'delete users']);
        Permission::firstOrCreate(['name' => 'show users']);
        Permission::firstOrCreate(['name' => 'users']);

        // tableau de bord et location (metier)
        Permission::firstOrCreate(['name' => 'dashboard']);
        Permission::firstOrCreate(['name' => 'location']);
        Permission::firstOrCreate(['name' => 'metier']);

        //flux de stock
        Permission::firstOrCreate(['name' => 'stock']);
        Permission::firstOrCreate(['name' => 'entree stock']);
        Permission::firstOrCreate(['name' => 'sortie stock']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::firstOrCreate(['name' => 'utilisateur']);

        // or may be done by chaining

        // secretaire
        // $role = Role::firstOrCreate(['name' => 'secretaire'])
        //     ->givePermissionTo(['metier', 'stock']);

        // manager
        // $role = Role::firstOrCreate(['name' => 'manager'])
        //     ->givePermissionTo(['articles', 'parametrage']);

        // admin
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->syncPermissions(Permission::all());


        // super-admin
        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $role->syncPermissions(Permission::all());
    }
}
