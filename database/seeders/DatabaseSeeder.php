<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Currencies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $currencies = [
            ['iso3' => "EUR" , 'status' => 1],
            ['iso3' => "USD" , 'status' => 0],
            ['iso3' => "NIS" , 'status' => 0],
            ['iso3' => "GBP" , 'status' => 1],

        ];

        DB::table('currencies')->insert($currencies);
    }
}
