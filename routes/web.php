<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('players', [App\Http\Controllers\PlayerController::class, 'index'])->name('players.show');
Route::get('pick', [App\Http\Controllers\PlayerController::class, 'showPlayerList'])->name('pickplayer');
Route::get('scores', [App\Http\Controllers\PlayerscoreController::class, 'index'])->name('scores.show');
Route::post('file-import', [App\Http\Controllers\PlayerController::class, 'fileImport'])->name('file-import');
