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
        User::create([
            'name' => 'Abdallah Abu El Soud',
            'email' => 'abdallah.h.abuelsoud@gmail.com',
            'password' => Hash::make('Mm@123123')
        ]);
    }
}
