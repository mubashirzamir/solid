<?php

namespace Database\Seeders;

use Database\Factories\SaleFactory;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SaleFactory::new()->count(10)->create();
    }
}
