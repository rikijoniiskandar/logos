<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username'=>'adminhafidz',
                'name'=>'Hafidz Admin',
                'email'=>'admin_hafidz@gmail.com',
                'password'=>Hash::make('rahasia123'),
            ],
        ];


        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
