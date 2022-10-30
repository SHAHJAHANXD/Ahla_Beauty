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
            'password' => bcrypt('12345678'),
        ]);
    }
}
