<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create the 'admin' role
        $role = Role::create(['name' => 'admin']);

        // Create the 'delete website' permission
        $permission = Permission::create(['name' => 'delete websites']);

        // Assign the permission to the role
        $role->givePermissionTo($permission);

        // assign admin to the first created user
        $user = User::where('email', 'fasanyakolawole1@yahoo.com')->first();

        $user->assignRole('admin');
    }
}
