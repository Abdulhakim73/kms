<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{

    public function run(): void
    {
        $districts = [
            [
                "region_id" => 1,
                "name" => "Amudaryo tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Beruniy tumani",
                'created_at' => now(),

            ],
            [
                "region_id" => 1,
                "name" => "Kegayli tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Qonliko‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Qorao‘zak tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Qo‘ng‘irot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Mo‘ynoq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Nukus tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Nukus shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Taxiatosh shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Taxtako‘pir tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "To‘rtko‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Xo‘jayli tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "CHimboy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "SHumanay tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 1,
                "name" => "Ellikqal‘a tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Andijon shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Andijon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Asaka tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Baliqchi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Buloqboshi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Bo‘z tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Jalaquduq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Izbosgan tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Qorasuv shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Qo‘rg‘ontepa tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Marhamat tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Oltinko‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Paxtaobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Ulug‘nor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Xonabod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Xo‘jaobod shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 2,
                "name" => "Shaxrixon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Buxoro shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Buxoro tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Vobkent tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "G‘ijduvon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Jondor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Kogon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Kogon shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Qorako‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Qorovulbozor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Olot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Peshku tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Romitan tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 3,
                "name" => "Shofirkon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Arnasoy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Baxmal tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "G‘allaorol tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Do‘stlik tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Sh.Rashidov tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Jizzax shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Zarbdor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Zafarobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Zomin tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Mirzacho‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Paxtakor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Forish tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 4,
                "name" => "Yangiobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "G'uzor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Dehqonobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Qamashi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Qarshi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Qarshi shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Kasbi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Ko'kdala tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Kitob tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Koson tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Mirishkor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Muborak tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Nishon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Chiroqchi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Shahrisabz tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 5,
                "name" => "Yakkabog‘ tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Zarafshon shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Karmana tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Qiziltepa tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Konimex tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Navbahor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Navoiy shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Nurota tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Tomdi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Uchquduq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 6,
                "name" => "Xatirchi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Kosonsoy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Mingbuloq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Namangan tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Namangan shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Norin tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Pop tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "To‘raqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Uychi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Uchqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Chortoq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Chust tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 7,
                "name" => "Yangiqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Bulung‘ur tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Jomboy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Ishtixon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Kattaqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Kattaqo‘rg‘on shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Qo‘shrabot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Narpay tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Nurabod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Oqdaryo tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Payariq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Pastarg‘om tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Paxtachi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Samarqand tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Samarqand shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Toyloq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 8,
                "name" => "Urgut tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Angor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Boysun tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Denov tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Jarqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Qiziriq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Qo‘mqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Muzrabot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Oltinsoy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Sariosiy tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Termiz tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Termiz shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Uzun tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Sherobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Sho‘rchi tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 9,
                "name" => "Bandixon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Boyovut tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Guliston tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Guliston shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Mirzaobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Oqoltin tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Sayxunobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Sardoba tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Sirdaryo tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Xavos tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Shirin shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 10,
                "name" => "Yangier shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Angiren shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Bekabod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Bekabod shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Bo‘ka tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Bo‘stonliq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Zangiota tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Qibray tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Quyichirchiq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Oqqo‘rg‘on tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Olmaliq shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Ohangaron tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Parkent tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Piskent tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "O‘rtachirchiq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Chinoz tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Chirchiq shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Yuqorichirchiq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Yangiyo‘l tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Ohangaron shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Yangiyo‘l shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 11,
                "name" => "Toshkent tumani",
                'created_at' => now(),
            ],

            [
                "region_id" => 12,
                "name" => "Beshariq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Bog‘dod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Buvayda tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Dang‘ara tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Yozyovon tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Quva tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Quvasoy shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Qo‘qon shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Qo‘shtepa tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Marg‘ilon shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Oltiariq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Rishton tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "So‘x tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Toshloq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Uchko‘prik tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "O‘zbekiston tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Farg‘ona tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Farg‘ona shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 12,
                "name" => "Furqat tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Bog‘ot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Gurlan tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Qo‘shko‘pir tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Urganch tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Urganch shahri",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Xiva tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Xazarasp tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Xonqa tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Shavot tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Yangiariq tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Yangibozor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 13,
                "name" => "Tuproqqala tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Bektimer tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "M.Ulug‘bek tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Mirobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Olmazor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Sergeli tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Uchtepa tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Yashnobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Chilonzor tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Shayxontohur tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Yunusobod tumani",
                'created_at' => now(),
            ],
            [
                "region_id" => 14,
                "name" => "Yakkasaroy tumani",
                'created_at' => now(),
            ],
        ];
        foreach ($districts as $key => $district) {
            DB::table('districts')->insert($district);
        }
    }
}
