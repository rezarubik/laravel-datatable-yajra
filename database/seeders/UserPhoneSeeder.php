<?php

namespace Database\Seeders;

use App\Models\UserPhone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 99; $i++) {
            $data = [
                'user_id' => $faker->numberBetween(1, 100),
                'phone' => $faker->phoneNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            UserPhone::create($data);
        }
    }
}
