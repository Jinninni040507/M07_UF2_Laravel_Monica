<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $val = $i;
            DB::table('ratings')->insert(array(
                "rating_value" => $val + 1,
            ));
        }
    }
}
