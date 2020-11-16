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

// @TODO supprimer ça avant PR
//Auth::login(\App\Models\User::all()->first());
Auth::login(\App\Models\User::where('id', 2)->first());

Auth::login(\App\Models\User::where('id', 2)->first());

Route::get('/login', function () {
    return 'No way !';
})->name('login');

Route::get('/', [App\Http\Controllers\Front\LadderController::class, 'username'])->name('layouts.app');
Route::get('/', [App\Http\Controllers\Front\LadderController::class, 'index'])->name('ladder.index');
Route::get('/ladders/{ladder}/ranking', [App\Http\Controllers\Front\LadderController::class, 'ranking'])->name('ladder.ranking');
Route::get('/ladders/{ladder}/teams', [App\Http\Controllers\Front\TeamController::class, 'index'])->name('team.index');

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/ladders', [App\Http\Controllers\Ajax\LadderController::class, 'index'])->name('ajax.ladder.index');

    Route::group(['middleware' => ['auth', 'is.admin']], function () {
        Route::post('/ladders', [App\Http\Controllers\Ajax\LadderController::class, 'store'])->name('api.ladder.store');
        Route::delete('/ladders/{ladder}', [App\Http\Controllers\Ajax\LadderController::class, 'destroy'])->name('api.ladder.destroy');
        Route::put('/ladders/{ladder}', [App\Http\Controllers\Ajax\LadderController::class, 'update'])->name('api.ladder.update');
    });

    Route::get('/ladders/{ladder}/teams', [App\Http\Controllers\Ajax\TeamController::class, 'index'])->name('ajax.team.index');
    Route::post('/ladders/{ladder}/matches', [App\Http\Controllers\Ajax\MatchController::class, 'store'])->name('ajax.match.store');
});

Route::group(['middleware' => ['auth', 'is.admin']], function () {
    Route::get('/ladders/create', [App\Http\Controllers\Front\LadderController::class, 'create'])->name('ladder.create');
    Route::get('/ladders/{ladder}/edit', [App\Http\Controllers\Front\LadderController::class, 'edit'])->name('ladder.edit');
});
