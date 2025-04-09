<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition(): array
    {
        $faker = fake();

        $name = $faker->name();
        $surname = $faker->name();
        $birthdate = $faker->date();
        $country = $faker->countryCode();
        $img_url = $faker->url();

        return [
            'name' => $name,
            'surname' => $surname,
            'birthdate' => $birthdate,
            'country' => $country,
            'img_url' => $img_url,
        ];
    }
}
