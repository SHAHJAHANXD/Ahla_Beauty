<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ahla Admin',
            'email' => 'admin@ahla.com',
            'role' => 'Admin',
            'email_status' => '1',
            'phone' => '12345678',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Ahla User',
            'email' => 'User@ahla.com',
            'role' => 'User',
            'email_status' => '1',
            'phone' => '12345678',
            'Code' => 'Verified',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Ahla Salon',
            'email' => 'Salon@ahla.com',
            'role' => 'Salon',
            'email_status' => '1',
            'phone' => '12345678',
            'Code' => 'Verified',
            'password' => bcrypt('12345678'),
        ]);
    }
}
