<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subDistricts = [
            ['name' => 'test', 'head' => 'test'],
            ['name' => 'contoh', 'head' => 'contoh'],
        ];

        foreach ($subDistricts as $subDistrict) {
            \App\Models\SubDistrict::create($subDistrict);  
        }
    }
}
