<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TripPage\TripPage;
use Carbon\Carbon;

class TripPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripPage::create([
            'title' => 'ktm to chitwan',
            'slug' => 'ktm_to_chitwan',
            'start_from' =>  Carbon::now(),
            'ends_at' => Carbon::now(),
            'description' =>'massa pharetra sem lobortis laoreet at vitae est. Ut non pulvinar elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam scelerisque, ligula sed mattis suscipit, sem magna aliquam eros, non molestie neque ipsum malesuada felis. Phasellus sed pulvinar orci, a ullamcorper orci. Etiam in finibus felis, ac vulputate libero. Nulla at mauris sit amet ante lobortis efficitur ac eget justo. Nunc malesuada felis a arcu scelerisque, maximus bibendum velit rutrum. Vivamus ac mi quis risus scelerisque tristique eget in dolor. Nam ultricies nulla vel mauris suscipit varius. Etiam non ante nunc. In porttitor purus eget elementum faucibus. Maecenas laoreet fermentum justo sit amet eleifend.',
            'trip_mode' => 'one_way',
            'trip_cost' => 1,
            'status' => 1,
        ]);
    }
}
