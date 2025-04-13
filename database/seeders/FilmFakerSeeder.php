<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmFakerSeeder extends Seeder {
    public function run() {
        Film::factory()->count(10)->create(); // Corrected syntax
    }
}
?>