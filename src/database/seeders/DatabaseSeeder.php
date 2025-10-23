<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // <-- Import the correct Role model

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create the Roles
        // We don't use factory() here, just create()
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        // 2. Create a Test User
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 3. Assign the 'user' role to the Test User
        $testUser->assignRole($userRole);

        // 4. (Optional but recommended) Create an Admin User
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'kyler.daybell96@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // 5. Assign the 'admin' role to the Admin User
        $adminUser->assignRole($adminRole);
    }
}