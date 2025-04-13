<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
class ActorController extends Controller{

    public function listactors(){
        $title = "Todos los actores";
        $actors = Actor::all();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }
    public function contactors(){
        $title = "Contador de todos los actores";
        $actors = Actor::count();

        return view('actors.count', ["actors" => $actors, "title" => $title]);
    }

    public function listByDecade(Request $request)
    {

        $years = explode("-",  $request->input(key: "year"));
        $actors = whereBetween('birthdate', [$years[0] . '-01-01', $years[1] . '-12-31'])->get();
        $actors = Actor::whereBetween('birthdate', [$years[0] . '-01-01', $years[1] . '-12-31'])->get();
        return view("actors.list", ["actors" => $actors, "title" => "Lista de Actores por Decada" . $years[0] . " " . $years[1]]);
    }

    public function destroy($id){
        $$result = Actor::destroy($id);
        return response()->json(['action' => 'delete', 'status' => $result == 0 ? "False" : "True"]);
    }

    public function index()
    {
        $actors = Actor::all();
        $ActorsWhidFilms = $actors->map(function ($actor) {
            $actor->film = $actor->Films()->get();
            return $actor;
        });

        return response()->json($ActorsWhidFilms, 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
?>