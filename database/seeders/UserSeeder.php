<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Admin Langlang',
            'role' => 'admin',
            'email' => 'langlang.admin@gmail.com',
            'password' => bcrypt('Fatahil1691'),
            'remember_token' => Str::random(60),
        ]);
    }
}
