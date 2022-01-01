<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DestinationRate\DestinationRate;

class DestinationRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinationRate::create([
            'from' => 1,
            'to' => 2,
            'vehicle_type' => 3,
            'cost' => 3000,
            'vehicle_type' => 3
        ]);
    }
}
