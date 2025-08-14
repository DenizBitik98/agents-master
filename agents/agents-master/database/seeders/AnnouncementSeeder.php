<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;
use App\Models\User;
use Faker\Factory as Faker;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            Announcement::create([
                'type' => $faker->randomElement(['error', 'warning', 'info']),
                'text' => $faker->sentence,
                'date_start' => $faker->dateTimeThisMonth,
                'date_end' => $faker->dateTimeThisMonth,
                'user_id' => $faker->randomElement($userIds),
                'is_active' => $faker->randomElement([true, false, null]),
            ]);
        }
    }
}
