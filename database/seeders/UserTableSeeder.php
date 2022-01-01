<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User\User;
use Illuminate\Support\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'sophia',
            'username' => 'sophia',
            'email' => 'laravel3pm@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('sophia'),
            'gender' => 'female',
            'phone' => '',
            'mobile' => '',
            'image' => '',
            'status' => 1,
        ]);
    }
}
