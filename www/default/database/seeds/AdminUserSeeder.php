<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'username' => 'Sucage',
            'email' => 'm.aben@live.nl',
            'password' => password_hash('123', PASSWORD_DEFAULT),
        ]);

        $permission = \MabenDev\Permissions\Models\Permission::create([
            'permission' => '*',
            'description' => 'Wildcard to everything',
        ]);

        $role = \MabenDev\Permissions\Models\Role::create([
            'name' => 'SuperAdmin',
            'description' => 'Role to everything',
        ]);

        $user->roles()->attach($role);
        $role->permissions()->attach($permission);
    }
}
