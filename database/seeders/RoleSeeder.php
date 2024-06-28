<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            'name' => 'admin',
            'label' => 'Administrator',
            'created_at' => now(),
        ]);
        Role::insert([
            'name' => 'limited_admin',
            'label' => 'Admin for one branch',
            'created_at' => now(),
        ]);
        Role::insert([
            'name' => 'user',
            'label' => 'User',
            'created_at' => now(),
        ]);
        Role::insert([
            'name' => 'operator',
            'label' => 'Operator',
            'created_at' => now(),
        ]);


    }
}
