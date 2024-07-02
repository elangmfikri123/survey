<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nama' => 'Admin',
                'username' => 'admin.ahm',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Scoopy2024!'),
                'roles' => 'admin',
            ],
            [
                'nama' => 'User',
                'username' => 'user.ahm',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'roles' => 'user',
            ],
        ])->each(function ($users) {
            User::create($users);
        });
    }
}
