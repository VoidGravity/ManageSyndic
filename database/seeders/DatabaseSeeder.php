<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'first_name' => 'AbdellahAdmin',
            'last_name' => 'BardichAdmin',
            'username' => 'UserNameAdmin',
            'email' => 'admin@manage-syndic.com',
            'password' => "password@1234",
            'role' => UserRole::ADMIN->value
            ]);
    }
}
