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
        $faker = Fake();
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert(array(
                "name" => $faker->sentence(3),
                "year" => $faker->year(),
                "genre" => $faker->randomElement(['romance', 'comedia', 'tragedia', 'terror', 'historica']),
                "country" => $faker->countryCode(),
                "duration" => $faker->numberBetween(57, 200),
                "img_url" => $faker->url()
            ));
        }
    }
}
