<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Actor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
        $filmsBBDD = Film::all()->toArray();

        $arraybbdd = array_map(function ($film) {
            return (array) $film;
        }, $filmsBBDD);
        $filmsJuntas = array_merge($films, $arraybbdd);
        return $filmsJuntas;
    }

    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }

    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }

    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function filmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis x Año";
        $films = FilmController::readFilms();

        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function sortFilms()
    {
        $title = "Listado de todas las pelis x Año Descendentemente";
        $films = FilmController::readFilms();

        $sorted_films = collect($films)->sortByDesc('year');

        return view("films.list", ["films" => $sorted_films, "title" => $title]);
    }



    public function filmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis x Categoria";
        $films = FilmController::readFilms();

        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view('films.list', ["films" => $films, "title" => $title]);
    }


    public function countFilm()
    {
        $title = "Cantidad de Peliculas Registradas";
        $films = FilmController::readFilms();

        $contador = count($films);

        return view("films.count", [
            "contador" => $contador,
            "title" => $title,
            "films" => $films
        ]);
    }

    public function isFilm($id)
    {
        $film = Film::with('actors')->findOrFail($id);
        return response()->json($film, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function createFilm(Request $request)
    {
        $film = Film::create([
            'title' => $request->input('title'),
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'duration' => $request->input('duration'),
            'img_url' => $request->input('img_url'),
        ]);

        return response()->json([
            'message' => 'Película creada correctamente',
            'film' => $film
        ], 201);
    }

    public function index()
    {
        $films = Film::all();
        $filmsWithActors = $films->map(function ($film) {
            $film->actors = $film->Actors()->get();
            return $film;
        });

        return response()->json($filmsWithActors, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function listFilmsWithActors()
    {
        $films = Film::with('actors')->get();

        return response()->json($films, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        if ($request->has('title')) $film->title = $request->input('title');
        if ($request->has('year')) $film->year = $request->input('year');
        if ($request->has('genre')) $film->genre = $request->input('genre');
        if ($request->has('country')) $film->country = $request->input('country');
        if ($request->has('duration')) $film->duration = $request->input('duration');
        if ($request->has('img_url')) $film->img_url = $request->input('img_url');

        $film->save();

        return response()->json([
            'message' => 'Película actualizada correctamente',
            'film' => $film
        ]);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return response()->json([
            'message' => 'Película eliminada correctamente',
            'film_id' => $id
        ]);
    }
}
