<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle\VehicleType;
use Illuminate\Support\Carbon;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleTypeData = [
            [
                'type' => 'car',
                'title' => 'Car Rental Service in Nepal',
                'slug' => 'car-rental-service-in-nepal',
                'date' => Carbon::now(),
                'status' => 1,
                'meta_keywords' => "Car Rental in Nepal, Cheap Car Hire in Nepal, Car Rental Nepal Prices",
                'meta_description' => "Cheap car rental in Nepal with driver and without driver.
                 Get car rental Nepal prices. Self drive car rental in Nepal.
                  Nepal Car Rental in cheap cost",
                'image' => 'uploads/vehicle-types/car.jpg',
                'description' => "We offer car rental service in Nepal. If you are looking for rent a car in cheap price,
                 we offer you the cheap and best car on hire with driver or without driver.
                  We arrange car rental from Kathmandu or other major cities like Pokhara,
                  Chiwan, Lumbini, Birgunj, Biratnagar, Bhadrapur, Dharan, Birtamod and other cities.
                    We are focusing our rental service in major cities
                   of Nepal. We have all kinds of brands car for hire in Nepal.
                    Our cost is very reasonable and service is professional.
                    We are open on service and price. Compare the prices
                    for car rental in Nepal from the list of vehicles and hire.
                 We guarantee the cheapest cost and quality service for car
                rental in Nepal. Car rental in Kathmandu is the best way to travel all over Nepal."
            ],

            [
                'type' => 'jeep',
                'title' => "Jeep Rental in Nepal",
                'slug' => "jeep-rental-in-nepal",
                'date' => Carbon::now(),
                'status' => 1,
                'meta_keywords' => "Jeep Rental Service in Nepal, Jeep Hire in Kathmandu, Rent Price",
                'meta_description' => "We offer jeep on rent in Nepal. Hire a jeep from Kathmandu to Pokhara, Chiwan, Lumbini, Birgunj, Biratnagar, Bhadrapur, Dharan, Birtamod. Jeep rental service",
                'image' => 'uploads/vehicle-types/jeep.jpg',
                'description' => "We offer jeep on rent for personal and official trip. If you are looking for rent a jeep in Kathmandu or other major cities like Pokhara, Chiwan, Lumbini, Birgunj, Biratnagar, Bhadrapur, Dharan, Birtamod and other places, we can offer the cheap jeep rental service for you.

                For the off-road trip in Nepal, 4WD Jeep is compulsory because the roads are not so good and muddy. Due to the road condition, 4WD jeep for the hilly transport is best option.

                We have both 2WD and 4WD jeep on rent with experienced drivers. Travelers in a group of 5-9 persons are possible to travel by Jeep in Nepal. Based on the brand, model and features, jeep hire cost depends. We have Jeep of world famous brands like Toyota, Ford, TATA, Land Rover, Mahindra and more.

                We guarantee the cheapest cost and quality service for jeep rental in Nepal. Jeep rental in Kathmandu is the best way to travel all over Nepal. Scorpio Jeep and Land Cruiser are the most popular jeep available on hire with experienced driver."
            ],
            [
                'type' => 'bus',
                'title' => "Bus Rental Service in Nepal",
                'slug' => "bus-rental-service-in-nepal",
                'date' => Carbon::now(),
                'status' => 1,
                'meta_keywords' => "Bus Rental in Nepal, Hire Tourist Bus in Kathmandu, Bus Rent in Nepal",
                'meta_description' => "Bus rental service in Kathmandu Nepal. We offer cheap price bus hire in Nepal. Contact us for hire a bus in Kathmandu to Pokhara, Chitwan, Lumbini",
                'image' => 'uploads/vehicle-types/bus.jpg',
                'description' => "Are you looking for hire a bus for your holiday or business propose in Nepal? We offer best price and bus for rent or hire based in Kathmandu, Nepal.

We have very new, clean and comfortable buses for rental propose in Kathmandu. If you want to rent a bus for sightseeing inside Kathmandu valley or touring outside the valley, then we can arrange a bus for you.

Tourist Bus Ticket Booking
For a single day to multiple days, we offer you tourist buses on hire. If you are on day trip to Nagarkot, Dhulikhel, Pokhara, Lumbini, Chitwan national park or other part in Nepal, our bus rental service is for you.

We offer bus on hire with experienced driver and helping staff. Our bus rental service offer mini bus of 18 seats and big bus of 28 to 35 seats."
            ],


        ];

        foreach ($vehicleTypeData as $vTypes) {
            VehicleType::create($vTypes);
        }
    }
}
