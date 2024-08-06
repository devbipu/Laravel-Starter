<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Permissions
        Permission::create(
            [
                'name'      => 'Dashboard',
                'slug'      => 'dashboard',
                'values'   => Permission::make_permission_array('dashboard'),
                'created_by'    => User::first()->id
            ]
        );
        // Seed Permissions
        Permission::create(
            [
                'name'      => 'Users',
                'slug'      => 'user',
                'values'   => Permission::make_permission_array('user'),
                'created_by'    => User::first()->id
            ]
        );
        // Seed Permissions
        Permission::create(
            [
                'name'      => 'Setting',
                'slug'      => 'setting',
                'values'   => Permission::make_permission_array('setting'),
                'created_by'    => User::first()->id
            ]
        );

        Role::create([
            'name'          => 'Super Admin',
            'super_admin'   => 1,
            'created_by'    => User::first()->id,
        ]);
    }
}
