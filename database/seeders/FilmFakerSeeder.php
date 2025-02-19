<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->year(),
                'genre' => $faker->word(),
                'country' => substr($faker->country(), 0, 30),
                'duration' => $faker->numberBetween(80, 180),
                'img_url' => $faker->imageUrl(200, 300, 'movies'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);            
        }
    }
}
?>