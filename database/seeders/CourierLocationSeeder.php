<?php

namespace Database\Seeders;

use App\Models\CourierLocation;
use App\Models\Couriers;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CourierLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourierLocation::truncate();
        $couriers = Couriers::all();
        $baseDate = Carbon::parse('2025-05-01 10:00:00');

        foreach ($couriers as $courier) {
            $timestamp = clone $baseDate;

            for ($i = 1; $i <= 4; $i++) {
                CourierLocation::create([
                    'courier_id' => $courier->id,
                    'latitude' => 48.6199742792897 + rand(0, 99) * 0.001,
                    'longitude' => 22.295680738374145 + rand(0, 99) * 0.001,
                    'recorded_at' => $timestamp,
                ]);

                $timestamp->addMinutes(30);
            }
        }
    }
}
