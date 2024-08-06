<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'first_name' => 'HRM Admin',
            'email' => 'admin@swiss.com',
            'password'  => Hash::make('password'),
            'employee_id'  => Str::uuid()
        ]);

        User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);
    }
}
