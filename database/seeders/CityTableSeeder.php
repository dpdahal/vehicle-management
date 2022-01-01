<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cityData = [
            [
                'city_name' => 'Kathmandu',
                'city_slug' => 'kathmandu',
                'meta_title' => 'kathmandu',
                'meta_description' => 'Kathmandu vehicle ',
                'description' => "If you are looking for a car
                 rental in Kathmandu then we provide you the car
                  rental service in Nepal. Car rental in Kathmandu
                  in cheap cost for your holiday package is possible
                   from our service. We have various types of cars
                    for rental in Kathmandu. Our car rental service
                    offers branded and luxurious cars with driver
                     for your use in very reasonable price.
                 We can provide cars on rent based in Kathmandu",
                'is_footer' => 1
            ],
            [
                'city_name' => 'Pokhara',
                'city_slug' => 'pokhara',
                'meta_title' => 'pokhara',
                'meta_description' => 'pokhara vehicle ',
                'description' => "We offer Car Rental in Pokhara
                with driver on various branded cars for your luxury trip inside and around Pokhara valley in cheap price. Hire car for Pokhara sightseeing and tour package. We have many brands cars on hire based in Pokhara city Nepal. Pokhara is the second busy city of Nepal as a tourism point of view. So you can rent a cheap and best car with us. You can hire a latest model to vintage car, latest branded cars and luxurious car on rent.
                We offer you cheap and best car rental service in Pokhara.
                We are the number one car rental company based in Pokhara, Nepal",
                'is_footer' => 1
            ],

        ];

        foreach ($cityData as $city) {
            City::create($city);
        }
    }
}
