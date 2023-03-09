<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new User();
        $item ->name = 'thang nguyen';
        $item ->email = 'thang1@gmail.com';
        $item ->password =Hash::make('1123');
        $item->save();
    }
}
