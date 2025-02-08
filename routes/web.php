<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use App\Http\Middleware\ValidateUrl;
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
    /*     Route::get('/', [FilmController::class, "countFilm"])->name('countFilm');
 */

 /* /filmout/films */
    Route::group(['prefix' => 'filmout'], function () {
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}', [FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}', [FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('filmsByYear/{year?}', [FilmController::class, "filmsByYear"])->name('filmsByYear');
        Route::get('filmsByGenre/{genre?}', [FilmController::class, "filmsByGenre"])->name('filmsByGenre');
        Route::get('sortFilms/', [FilmController::class, "sortFilms"])->name('sortFilms');
        Route::get('countFilm/', action: [FilmController::class, "countFilm"])->name('countFilm');
        Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name('image.save');
/*         Route::resource('films', FilmController::class);
 */        Route::get('films', action: [FilmController::class, "listFilms"])->name('listFilms');

    });
});

Route::middleware('url')->group(function () {
    Route::group(['prefix' => 'filmin'], function () {
        Route::post('createFilm/', [FilmController::class, "createFilm"])->name('createFilm');
    });
});

