<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['district_name' => 'Thiruvananthapuram','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Kollam','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Pathanamthitta','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Alappuzha','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Kottayam','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Idukki','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Ernakulam','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Thrissur','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Palakkad','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Malappuram','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Kozhikode','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Wayanad','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Kannur','created_at' => '2023-05-05','updated_at' => '2023-05-05'],
            ['district_name' => 'Kasargod','created_at' => '2023-05-05','updated_at' => '2023-05-05']
        ];
        District::insert($data);
    }
}
