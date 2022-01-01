<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            AdminTableSeeder::class,
            VehicleTypeTableSeeder::class,
            CityTableSeeder::class,
            UserTableSeeder::class,
            SettingTableSeeder::class,
            DriverTableSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
