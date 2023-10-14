<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'wisatawan', 'email' => 'wisatawan@gmail.com', 'password' => 'password', 'role' => 'wisatawan'],
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => 'password', 'role' => 'admin'],
        ];

        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => Hash::make($item['password']),
                'role' => $item['role'],
            ]);
        }
    }
}
