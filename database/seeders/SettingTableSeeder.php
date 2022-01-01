<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingData = [
            'company_name' => 'easyvehiclerental',
            'company_email' => 'info@easyvehiclerental.com',
            'company_address' => 'Kathmandu',
            'company_phone' => '+9779749411470',
            'company_mobile' => '+9779749411470',
            'company_logo' => 'logo.png',
            'company_fax' => '',
            'company_post_box' => '',
            'company_website' => '',
            'meta_keywords' => 'car rental in nepal, nepal cars, jeep hire in nepal',
            'meta_description' => 'Easy Vehicle Rental offers car on rent
            in Kathmandu Nepal. Contact for jeep, van, hiace,
             tourist bus hire in Nepal. Car hire in
              Kathmandu Nepal in cheap cost'

        ];
        Setting::create($settingData);
    }
}
