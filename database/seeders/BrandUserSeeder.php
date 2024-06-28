<?php

namespace Database\Seeders;

use App\Models\BranchUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandUserSeeder extends Seeder
{
    public function run(): void
    {
        BranchUser::insert([
            'branch_name' => 'Yunusobod 9 daha',
            'created_at' => now(),
        ]);
    }
}
