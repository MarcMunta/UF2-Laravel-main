<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    public function run(): void
    {
        $decades = [
            '1980-01-01' => '1980-12-31',
            '1990-01-01' => '1990-12-31',
            '2000-01-01' => '2000-12-31',
            '2010-01-01' => '2010-12-31',
            '2020-01-01' => '2020-12-31',
        ];

        foreach ($decades as $start => $end) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('actors')->insert([
                    'name' => "Nombre$i",
                    'surname' => "Apellido$i",
                    'birthdate' => fake()->dateTimeBetween($start, $end)->format('Y-m-d'),
                    'country' => 'España',
                    'img_url' => 'https://via.placeholder.com/100x120.png?text=Actor',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
