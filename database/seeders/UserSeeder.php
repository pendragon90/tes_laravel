<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'budi',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('budi123')
            ],
            [
                'name' => 'ana',
                'email' => 'ana@gmail.com',
                'password' => Hash::make('ana123')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
