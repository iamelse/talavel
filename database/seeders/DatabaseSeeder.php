<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
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
        $this->call(PermissionSeeder::class);

        // Create Master user
        $master = User::factory()->create([
            'name' => 'Master',
            'username' => 'master',
            'email' => 'master@example.com',
            'email_verified_at' => now(),
        ]);
        $master->assignRole(RoleEnum::MASTER->value);

        // Create Author user
        $author = User::factory()->create([
            'name' => 'Author',
            'username' => 'author',
            'email' => 'author@example.com',
            'email_verified_at' => now(),
        ]);
        $author->assignRole(RoleEnum::AUTHOR->value);
    }
}
