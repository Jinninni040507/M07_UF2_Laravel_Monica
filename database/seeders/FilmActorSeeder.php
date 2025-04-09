<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Film;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = Film::pluck('id')->toArray();
        $actors = Actor::pluck('id')->toArray();

        foreach ($films as $filmId) {
            $actorIds = array_map(fn($key) => $actors[$key], (array)array_rand($actors, rand(1, 3)));

            foreach ($actorIds as $actorId) {
                DB::table('films_actors')->insert(array(
                    "film_id" => $filmId,
                    "actor_id" => $actorId,
                ));
            }
        }
    }
}
