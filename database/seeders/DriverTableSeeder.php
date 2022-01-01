<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver\Driver;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'full_name' => 'sophia',
            'email' => 'laravel3pm@gmail.com',
            'gender' => 'female',
            'phone' => '',
            'mobile' => '',
            'image' => '',
            'citizen_number' => '23432',
        ]);
    }
}
