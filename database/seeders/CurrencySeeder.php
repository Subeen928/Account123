<?php

namespace Database\Seeders;

use IFRS\Models\Currency;
use IFRS\Models\Entity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the currencies data
        $currencies = [
            [
                'entity_id' => 1,
                'name' => 'United States Dollar',
                'currency_code' => 'USD',
                'destroyed_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entity_id' => 1,
                'name' => 'Euro',
                'currency_code' => 'EUR',
                'destroyed_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more currencies as needed
        ];

        // Insert the currencies into the database
        DB::table(config('ifrs.table_prefix') . 'currencies')->insert($currencies);
    }
}
