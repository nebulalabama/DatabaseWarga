<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Generals;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Generals::create([
            'name' => 'Suka Suka',
            'address' => 'Jalan Emas Antam no. 24 Karat',
            'head' => 'Bapak Wahyono',
            'deputy_head' => 'Ibu Wahyuni',
            'treasurer' => 'Bapak Kastelo',
            'secretary' => 'Ibu Zondah',
        ]);
    }
}
