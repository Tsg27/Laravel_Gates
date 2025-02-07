<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tiago',
            'email' => 'tsgo.soares@gmail.com',
            'password' => Hash::make('admin'),
        ]);


        User::create([
            'name' => 'Eleith',
            'email' => 'eleith.ramos@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
    
}
