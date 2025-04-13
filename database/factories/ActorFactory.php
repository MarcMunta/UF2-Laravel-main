<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'name' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'birthdate' => $faker->date(),
            'country' => $faker->country(),
            'img_url' => $faker->imageUrl(400, 600, 'people'),
        ];
    }
}