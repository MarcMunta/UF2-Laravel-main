<?php

namespace Database\Factories;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
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
            'name' => $faker->name(),
            'year' => $faker->year(),
            'genre' => $faker->randomElement(["Terror", "Comedia", "Accion", "Suspense", "Ciencia Ficcion", "Romance"]),
            'country' => $faker->country(),
            'duration' => $faker->numberBetween(90, 180),
            'img_url' => $faker->imageUrl(400, 600, 'movies'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Film $film) {
            $actors = Actor::inRandomOrder()->limit(3)->get();
            $film->actors()->attach($actors->pluck('id'));
        });
    }
}