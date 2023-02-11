<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategorijaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users',UserController::class);

 Route::get('films/reziser/{id}',[FilmController::class,'getByReziser']);

 Route::get('films/kategorija/{id}',[FilmController::class,'getByKategorija']);

 Route::resource('films',FilmController::class);



 Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
   
    Route::get('my-films',[FilmController::class,'myFilms']);

    Route::post('/logout',[AuthController::class,'logout']);

    Route::resource('films',FilmController::class)->only('store','update','destroy');
    
});

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);