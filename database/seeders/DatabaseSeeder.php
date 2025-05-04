<?php

namespace Database\Seeders;

use App\Models\Couriers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Couriers::factory(10)->create();
    }
}
