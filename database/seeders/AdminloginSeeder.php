<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adminlogin;

class AdminloginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['email' => 'admin@galtech.com','username' => 'admin','password' => '$2y$10$d0lZ3rIeE3w.XDrobMc8o.r27H9hELzPDlW2lQTgbe233vXsqBWfq','status' => 1,'created_at' => '2023-04-17','updated_at' => '2023-04-17']
        ];
        Adminlogin::insert($data);
    }
}
