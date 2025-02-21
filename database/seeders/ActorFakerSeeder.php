<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Fake();
        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert(array(
                "name" => $faker->name(),
                "surname" => $faker->name(),
                "birthdate" => $faker->date(),
                "country" => $faker->countryCode(),
                "img_url" => $faker->url()
            ));
        }
    }
}
