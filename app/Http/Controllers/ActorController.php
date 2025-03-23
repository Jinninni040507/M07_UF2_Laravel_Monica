<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public static function index()
    {
        $title = "Listado de todos los Actores";
        $actors = DB::table("actors")->select("name", "surname", "birthdate", "country", "img_url")->get()->toArray();

        $actors = array_map(fn($actor) => (array) $actor, $actors);

        return response()->json($actors, 200);
    }
    public static function listActors()
    {
        $title = "Listado de todos los Actores";
        $actors = DB::table("actors")->select("name", "surname", "birthdate", "country", "img_url")->get()->toArray();

        $actors = array_map(fn($actor) => (array) $actor, $actors);

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

    public static function listActorsByDecade(Request $request)
    {
        $year = $request->year;

        $decadeStart = Carbon::create($year, 1, 1)->startOfYear();
        $decadeEnd = Carbon::create($year + 9, 12, 31)->endOfYear();

        // acabar de formatear la fecha para que solo muestre la decada
        $title = "Listado los Actores por la decada de los" . $year;

        $actors = DB::table("actors")->select("name", "surname", "birthdate", "country", "img_url")->whereBetween("birthdate", [$decadeStart, $decadeEnd])->get()->toArray();

        $actors = array_map(fn($actor) => (array) $actor, $actors);

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }

    public function countActors()
    {
        $title = "Número de Actores";
        $error = "No hay nungún actor";
        $numberFilms = DB::table("actors")->select()->count();

        return view("components.countEntity", ["films" => $numberFilms, "title" => $title, "error" => $error]);
    }

    public function searchActorById($id)
    {
        return DB::table("actors")->where('id', $id)->first();
    }
    public function deleteActorById($id)
    {
        $actor = $this->searchActorById($id);

        if (!$actor) {
            return response()->json([
                'id' => $id,
                'mensaje' => 'No se ha encontrado ningún actor con este ID'
            ], 404);
        }

        $deleted = DB::table("actors")->where('id', $id)->delete();

        if ($deleted) {
            return response()->json([
                'id' => $id,
                'mensaje' => 'Se ha borrado correctamente el actor'
            ], 200);
        }

        return response()->json(['mensaje' => 'No se ha podido eliminar el actor'], 500);
    }
}
