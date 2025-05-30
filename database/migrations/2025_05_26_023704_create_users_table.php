<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'tinn1855',
                'email' => 'tinn1855@gmail.com',
                'password' => Hash::make('123'), // mã hóa mật khẩu
                'role' => 'user',
                'full_name' => 'Tin Nguyen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'full_name' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm user mẫu nếu muốn
        ]);
    }
}
