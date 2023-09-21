<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Film
Route::get('/flims', [FilmController::class, 'index']);
Route::get('/genres', [FilmController::class, 'genres']);
Route::get('/flims/{id}', [FilmController::class, 'filmdetail']);
Route::post('/flimupdate/{id}', [FilmController::class, 'flimupdate']);
Route::get('/flimdelete/{id}', [FilmController::class, 'flimdelete']);
Route::delete('/flimdelete/{id}', [FilmController::class, 'flimdelete']);
Route::post('/flims', [FilmController::class, 'store']);
//Flim
//User

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/auth', [UserController::class, 'login'])->name('login.auth');
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'register']);


//User
