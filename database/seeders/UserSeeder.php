<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row=[
            'name'=>"Kumari",
            'email'=>"sm@gmail.com",
            'email_verified_at'=>Null,
            'password'=> Hash::make('password'),
            'remember_token'=>Str::random(10),
        ];
        User::create($row);
    }
}
