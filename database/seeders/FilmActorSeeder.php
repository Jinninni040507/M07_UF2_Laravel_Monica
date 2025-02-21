<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = DB::table('films')->pluck('id')->toArray();
        $actors = DB::table('actors')->pluck('id')->toArray();

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
