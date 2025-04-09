<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Film;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        $faker = fake();

        $ratings = DB::table('ratings')->pluck('id')->toArray();
        $randomRating = $faker->randomElement($ratings);

        $name = $faker->sentence(3);
        $year = $faker->year();
        $genre = $faker->randomElement(['romance', 'comedia', 'tragedia', 'terror', 'historica']);
        $country = $faker->countryCode();
        $duration = $faker->numberBetween(60, 240);
        $img_url = $faker->url();
        $rating = $randomRating;

        return [
            "name" => $name,
            "year" => $year,
            "genre" => $genre,
            "country" => $country,
            "duration" => $duration,
            "img_url" => $img_url,
            "rating" => $rating
        ];
    }
}
