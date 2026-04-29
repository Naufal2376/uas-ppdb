<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Default
        User::factory()->create([
            'name' => 'Admin PPDB',
            'email' => 'admin@ppdb.test',
            'password' => bcrypt('password'),
            'role' => \App\Enums\UserRole::Admin,
        ]);

        // Student Default
        User::factory()->create([
            'name' => 'Calon Siswa',
            'email' => 'siswa@ppdb.test',
            'password' => bcrypt('password'),
            'role' => \App\Enums\UserRole::Student,
        ]);
    }
}
