<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder {
    public function run(): void {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('actors')->insert([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'birthdate' => $faker->date(),
                'country' => substr($faker->country(), 0, 30), 
                'img_url' => $faker->imageUrl(200, 300, 'people'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);            
        }
    }
}
?>