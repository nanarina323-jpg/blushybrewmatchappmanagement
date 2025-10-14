<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // ✅ Add this line

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

       User::create([
            'name' => 'Nur Syahrina',
            'email' => 'rina@example.com',
            'password' => Hash::make('rina123'),
        ]);

        User::create([
            'name' =>'Nur Syahrina',
            'email'=>'nanarina323@gmail.com',
            'password'=>'$2y$10$7z0mhw2Z.4Pyzj9gYyPSe.Tk4e0R1D6u6KxvI3bE5bXWpN0VjFzFi',
        ]);
    }
}
