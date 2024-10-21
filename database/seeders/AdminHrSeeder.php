<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminHr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminHrSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_hr')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('yourpassword'), // Hash the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}