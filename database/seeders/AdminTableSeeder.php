<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            [
                'name' => 'dhan pradad dahal',
                'username' => 'admin',
                'slug' => 'admin',
                'email' => 'dp48dahal@gmail.com',
                'password' => bcrypt('admin002'),
                'gender' => 'male',
                'date_of_birth' => \Illuminate\Support\Carbon::now(),
                'phone' => '9843363725',
                'image' => 'uploads/admins/admin.png',
                'status' => 1,
                'admin_type' => 'super'
            ],

        ];
        foreach ($adminData as $data) {
            Admin::create($data);
        }
    }
}
