<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'user_id' => 1,
            'district_id' => 1,
            'region_id' => 1,
            'street' => "Farobiy",
            'email' => 'clientemail@gmail.com',
            'organization' => 'simple',
            'phone' => '+998893456543',
            'certification' => 'certification'
        ]);
    }
}
