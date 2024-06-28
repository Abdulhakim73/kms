<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{

    public function run(): void
    {
        $regions = [
            [
                "name" => "Qoraqalpog‘iston Respublikasi",
                'created_at' => now(),
            ],
            [
                "name" => "Andijon viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Buxoro viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Jizzax viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Qashqadaryo viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Navoiy viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Namangan viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Samarqand viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Surxandaryo viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Sirdaryo viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Toshkent viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Farg‘ona viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Xorazm viloyati",
                'created_at' => now(),
            ],
            [
                "name" => "Toshkent shahri",
                'created_at' => now(),
            ],
        ];

        foreach ($regions as $key => $region) {
            DB::table("regions")->insert($region);
        }
    }
}

