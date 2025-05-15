<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ActorController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/films', [FilmController::class, 'listFilmsWithActors']);  
Route::get('/films/{id}', [FilmController::class, 'isFilm']);          
Route::post('/films', [FilmController::class, 'createFilm']);         
Route::put('/films/{id}', [FilmController::class, 'update']);          
Route::delete('/films/{id}', [FilmController::class, 'destroy']);      

Route::get('/actors', [ActorController::class, 'index']);              
Route::get('/actors/{id}', [ActorController::class, 'show']);         
Route::post('/actors', [ActorController::class, 'create']);            
Route::put('/actors/{id}', [ActorController::class, 'update']);       
Route::delete('/actors/{id}', [ActorController::class, 'destroy']);    