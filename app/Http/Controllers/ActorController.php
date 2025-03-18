<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public static function listActors()
    {
        $title = "Listado de todos los Actores";
        $actors = DB::table("actors")->select("name", "surname", "birthdate", "country", "img_url")->get()->toArray();

        $actors = array_map(fn($actor) => (array) $actor, $actors);

        return view('actors.list', ["actors" => $actors, "title" => $title]);
    }
}
