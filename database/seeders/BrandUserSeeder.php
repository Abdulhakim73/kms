<?php

namespace Database\Seeders;

use App\Models\Branches;
use App\Models\BranchUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandUserSeeder extends Seeder
{
    public function run(): void
    {
        Branches::query()->insert([
            'name' => 'Yunusobod 9 daha',
            'created_at' => now(),
        ]);
    }
}
