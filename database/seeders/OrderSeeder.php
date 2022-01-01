<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order\Order;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'customer_id' => 1,
            'vehicle_id' => 1,
            'ordered_date' =>  Carbon::now(),
            'last_updated' => Carbon::now(),
            'notes'=> 'I need urgent book this trip',
            'trip_id' => 1
        ]);
    }
}
