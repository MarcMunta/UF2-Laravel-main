<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function listactors()
    {
        $title = "Todos los actores";
        $actors = Actor::all();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }
    public function contactors()
    {
        $title = "Contador de todos los actores";
        $actors = Actor::count();

        return view('actors.count', ["actors" => $actors, "title" => $title]);
    }

    public function listByDecade(Request $request)
    {

        $years = explode("-",  $request->input(key: "year"));
        $actors = Actor::whereBetween('birthdate', [$years[0] . '-01-01', $years[1] . '-12-31'])->get();
        return view("actors.list", ["actors" => $actors, "title" => "Lista de Actores por Decada" . $years[0] . " " . $years[1]]);
    }

    public function destroy($id)
    {
        $result = Actor::destroy($id);
        return response()->json(['action' => 'delete', 'status' => $result == 0 ? "False" : "True"]);
    }

    public function index()
    {
        $actors = Actor::with('films')->get();

        return response()->json($actors, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function show($id)
    {
        $actor = Actor::with('films')->findOrFail($id);

        return response()->json($actor, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function create(Request $request)
    {
        $actor = Actor::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'birthdate' => $request->input('birthdate'),
            'country' => $request->input('country'),
            'img_url' => $request->input('img_url'),
        ]);

        return response()->json([
            'message' => 'Actor creado correctamente',
            'actor' => $actor
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $actor = Actor::findOrFail($id);

        if ($request->has('name')) {
            $actor->name = $request->input('name');
        }
        if ($request->has('surname')) {
            $actor->surname = $request->input('surname');
        }
        if ($request->has('birthdate')) {
            $actor->birthdate = $request->input('birthdate');
        }
        if ($request->has('country')) {
            $actor->country = $request->input('country');
        }
        if ($request->has('img_url')) {
            $actor->img_url = $request->input('img_url');
        }

        $actor->save();

        return response()->json([
            'message' => 'Actor actualizado correctamente',
            'actor' => $actor
        ]);
    }
}