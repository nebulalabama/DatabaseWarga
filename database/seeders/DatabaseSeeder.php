<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Resident::class);
        $this->call(SubDistrictSeeder::class);
        $this->call(GeneralSeeder::class);

        for ($i=1; $i <= 5; $i++) { 
            $user = $i == 1 ? 'admin' : 'user' . $i;
            User::factory()->create([
                'name' => "$user",
                'email' => "$user@gmail.com",
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '12345678',
                'status' => 'active',
            ]);
        }
    }
}
