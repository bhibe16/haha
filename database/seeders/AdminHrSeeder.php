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
<<<<<<< HEAD
            'password' => bcrypt('admin1'), // Hash the password
=======
            'password' => bcrypt('hatdog'), // Hash the password
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}