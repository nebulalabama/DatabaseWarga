<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Resident extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
        [
            'nik' => '1234567890123456',
            'name' => 'John Doe',
            'pob' => 'Jakarta',
            'dob' => '2000-01-01',
            'gender' => 'L',
            'religion' => 'islam',
            'last_education' => 'Sarjana',
            'citizenship' => 'WNI',
            'marital_status' => 'nikah',
            'sub_district_id' => null,
            'neighborhood_id' => null,
            'community_unit_id' => null,
        ];

        \App\Models\Resident::create($data);
    }
}
