<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FilmController extends Controller
{
    public static function index()
    {
        $films = Film::with('actors')->get()->toArray();
        return response()->json($films, 200);
    }

    /**
     * Search if a film already exists
     */
    public static function isFilm($film): bool
    {
        $films = self::readFilms();
        foreach ($films as $value) {
            if (
                $film ===
                $value["name"]
            ) {
                return true;
            }
        }
        return false;
    }

    /**
     * Create a new film and save it into the storage
     */
    public static function createFilm(Request $request)
    {
        if (self::isFilm($request->name)) {
            return view("create-film-form", ["error" => "Ya existe una película con este título."]);
        }

        if ($request->save === "json") {
            $newFilm = [
                "name" => $request->name,
                "year" => $request->year,
                "genre" => $request->genre,
                "country" => $request->country,
                "duration" => $request->duration,
                "img_url" => $request->url,
            ];
            $films = [...self::readFilms(), $newFilm];
            Storage::put("/public/films.json", json_encode($films, JSON_PRETTY_PRINT));

            return self::listAllFilms();
        } else {
            Film::insert([
                "name" => $request->name,
                "year" => $request->year,
                "genre" => $request->genre,
                "country" => $request->country,
                "duration" => (int)$request->duration,
                "img_url" => $request->url,
            ]);
        }
    }

    /**
     * Read films from storage & DataBase
     */
    public static function readFilms(): array
    {
        $filmsJson = Storage::json('/public/films.json');

        $filmsDB = Film::all()->toArray();

        $filmsJson = array_map(function ($film) {
            return [
                'name' => $film['name'],
                'year' => $film['year'],
                'genre' => $film['genre'],
                'country' => $film['country'],
                'duration' => $film['duration'],
                'img_url' => $film['img_url'],
            ];
        }, $filmsJson);

        $films = array_merge($filmsJson, $filmsDB);

        return $films;
    }

    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public static function listAllFilms($year = null)
    {
        $title = "Listado de todas las Pelis";
        $films = FilmController::readFilms();

        return view('films.list', ["films" => $films, "title" => $title]);
    }

    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
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
    /**
     * Lista TODAS las películas o filtra x año.
     */
    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        //list based on year or genre informed
        foreach ($films as $film) {
            if (!is_null($year) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista TODAS las películas o filtra x categoría.
     */
    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if genre is null
        if (is_null($genre)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        //list based on genre informed
        foreach ($films as $film) {
            if (!is_null($genre) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista TODAS las películas ordenadas x año.
     */
    public function sortFilms()
    {
        $title = "Listar pelis ordenadas por año";
        $films = FilmController::readFilms();

        usort($films, function ($a, $b) {
            return $a['year'] - $b['year'];
        });

        return view("films.list", ["films" => $films, "title" => $title]);
    }

    /**
     * Contar TODAS las películas.
     */
    public function countFilms()
    {
        $title = "Número de películas";
        $error = "No hay ningúna perlícula";

        $films = Film::all()->count();

        return view("components.countEntity", ["films" => $films, "title" => $title, "error" => $error]);
    }
}
