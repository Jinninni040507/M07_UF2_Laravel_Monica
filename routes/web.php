<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function () {
    Route::group(['prefix' => 'filmout'], function () {
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}', [FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}', [FilmController::class, "listFilmsByYear"])->name('listFilmsByYear');
        Route::get('films/{genre?}', [FilmController::class, "listFilmsByGenre"])->name('listFilmsByGenre');
        Route::get('sortFilms/', [FilmController::class, "sortFilms"])->name('sortFilmsByYear');
        Route::get('countFilms/', [FilmController::class, "countFilms"])->name('countFilms');
    });
});

Route::middleware('url')->group(function () {
    Route::group(['prefix' => 'filmin'], function () {
        Route::get('createFilmForm/', function () {
            return view('create-film-form');
        })->name('createFilmForm')->withoutMiddleware('url');
        Route::post('createFilm/', [FilmController::class, "createFilm"])->name('createFilm');
    });
});

Route::middleware('year')->group(function () {
    Route::group(['prefix' => 'actorout'], function () {
        Route::get('actors/', [ActorController::class, "listActors"])->name('listActors');
        Route::get('searchActorsByDecade/', function () {
            return view('actors.search-actor-by-decade-form');
        })->name('listActors');
        Route::get('listActorsByDecade/{year?}', [ActorController::class, "listActorsByDecade"])->name('listActors');
    });
});
