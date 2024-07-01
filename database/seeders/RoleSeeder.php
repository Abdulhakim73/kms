<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::query()->insert([
            'name' => 'admin',
            'label' => 'Administrator',
            'created_at' => now(),
        ]);
        Role::query()->insert([
            'name' => 'limited_admin',
            'label' => 'Admin for one branch',
            'created_at' => now(),
        ]);
        Role::query()->insert([
            'name' => 'user',
            'label' => 'User',
            'created_at' => now(),
        ]);
        Role::query()->insert([
            'name' => 'operator',
            'label' => 'Operator',
            'created_at' => now(),
        ]);


    }
}
