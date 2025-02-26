<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = DB::table('ratings')->pluck('id')->toArray();

        $faker = Fake();
        for ($i = 0; $i < 10; $i++) {
            $randomRating = $faker->randomElement($ratings);
            DB::table('films')->insert(array(
                "name" => $faker->sentence(3),
                "year" => $faker->year(),
                "genre" => $faker->randomElement(['romance', 'comedia', 'tragedia', 'terror', 'historica']),
                "country" => $faker->countryCode(),
                "duration" => $faker->numberBetween(60, 240),
                "img_url" => $faker->url(),
                "rating" => $randomRating
            ));
        }
    }
}
