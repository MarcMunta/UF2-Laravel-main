<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ActorController extends Controller{

    public function listactors(){
        $title = "Todos los actores";
        $actors = DB::table('actors')->get();

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }
    public function contactors(){
        $title = "Contador de todos los actores";
        $actors = DB::table('actors')->count();

        return view('actors.count', ["actors" => $actors, "title" => $title]);
    }

    public function listByDecade(Request $request)
    {

        $years = explode("-",  $request->input(key: "year"));
        $actors = DB::table("actors")->whereBetween('birthdate', [$years[0] . '-01-01', $years[1] . '-12-31'])->get();
        return view("actors.list", ["actors" => $actors, "title" => "Lista de Actores por Decada" . $years[0] . " " . $years[1]]);
    }

    public function destroy($id){
        $result = DB::table('actors')->where("id" , $id)->delete();
        return response()->json(['action' => 'delete', 'status' => $result == 0 ? "False" : "True"]);
    }


}

?>