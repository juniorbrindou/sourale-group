<?php

use App\User;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::whereLogin('manager')->first()->assignRole('manager');
        User::whereLogin('administrateur')->first()->assignRole('admin');
        User::whereLogin('root')->first()->assignRole('super-admin');
        // User::whereLogin('secretaire')->first()->assignRole('secretaire');
    }
}
