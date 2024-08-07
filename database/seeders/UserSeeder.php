<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->insert([
            'full_name' => 'User Name',
            'email' => 'adminemail@gmail.com',
            'photo' => '/public/user/icons/user-icon.png',
            'district_id' => '1',
            'region_id' => '1',
            'street' => 'Farobiy',
            'role_id' => 1,
            'password' => Hash::make('pass123'),
            'phone' => '999887212',
            'birthday' => '1999-11-11',
            'created_at' => now(),
        ]);

        User::query()->insert([
            'full_name' => 'User Name',
            'email' => 'limitedemail@gmail.com',
            'photo' => '/public/user/icons/user-icon.png',
            'district_id' => '1',
            'region_id' => '1',
            'street' => 'Farobiy',
            'role_id' => 2,
            'password' => Hash::make('pass123'),
            'phone' => '999887213',
            'birthday' => '1999-11-11',
            'branch_id' => 1,
            'created_at' => now(),
        ]);

        User::query()->insert([
            'full_name' => 'User Name',
            'email' => 'useremail@gmail.com',
            'photo' => '/public/user/icons/user-icon.png',
            'district_id' => '1',
            'region_id' => '1',
            'street' => 'Farobiy',
            'role_id' => 3,
            'password' => Hash::make('pass123'),
            'phone' => '999887214',
            'birthday' => '1999-11-11',
            'branch_id' => 1,
            'created_at' => now(),
        ]);

        User::query()->insert([
            'full_name' => 'User Name',
            'email' => 'operatoremail@gmail.com',
            'photo' => '/public/user/icons/user-icon.png',
            'district_id' => '1',
            'region_id' => '1',
            'street' => 'Farobiy',
            'role_id' => 4,
            'password' => Hash::make('pass123'),
            'phone' => '999887215',
            'birthday' => '1999-11-11',
            'branch_id' => 1,
            'created_at' => now(),
        ]);
    }
}
