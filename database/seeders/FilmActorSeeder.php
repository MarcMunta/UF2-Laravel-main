<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Film;

class FilmActorSeeder extends Seeder {
    public function run(): void {
        $films = Film::pluck('id')->toArray();  
        $actors = Actor::pluck('id')->toArray(); 

        for ($i = 0; $i < 10; $i++) {
            DB::table('actor_film')->insert([
                'film_id' => $films[array_rand($films)], 
                'actor_id' => $actors[array_rand($actors)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

?>