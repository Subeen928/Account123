<?php

namespace Database\Seeders;

use App\Models\User;
use IFRS\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Entity
        $entity = Entity::create([
            'name' => 'Entity 1',
            'currency_id' => null,
            'parent_id' => null,
            'multi_currency' => false,
            'mid_year_balances' => false,
            'year_start' => 1,
            'destroyed_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Now you can access the entity's id
        echo $entity->id;

        // Add more entities as needed
    }
}
