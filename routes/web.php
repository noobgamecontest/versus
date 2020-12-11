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

Route::get('/', [App\Http\Controllers\Front\LadderController::class, 'index'])->name('ladder.index');
Route::get('ladders/{ladder}/ranking', [App\Http\Controllers\Front\LadderController::class, 'ranking'])->name('ladder.ranking');

Route::group(['middleware' => ['auth', 'is.admin']], function () {
    Route::get('ladders/create', [App\Http\Controllers\Front\LadderController::class, 'create'])->name('ladder.create');
    Route::get('ladders/{ladder}', [\App\Http\Controllers\Front\LadderController::class, 'show'])->name('ladder.show');
    Route::get('ladders/{ladder}/edit', [App\Http\Controllers\Front\LadderController::class, 'edit'])->name('ladder.edit');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('ladders/{ladder}/ranking', [App\Http\Controllers\Ajax\LadderController::class, 'ranking'])->name('ajax.ladder.ranking');

    Route::group(['middleware' => ['auth', 'is.admin']], function () {
        Route::delete('ladders/{ladder}/', [App\Http\Controllers\Ajax\LadderController::class, 'destroy'])->name('api.ladder.destroy');
        Route::post('ladders', [App\Http\Controllers\Ajax\LadderController::class, 'store'])->name('api.ladder.store');
        Route::put('ladders/{ladder}', [App\Http\Controllers\Ajax\LadderController::class, 'update'])->name('api.ladder.update');
    });

    Route::get('ladders/{ladder}/teams', [App\Http\Controllers\Ajax\TeamController::class, 'index'])->name('ajax.team.index');
    Route::post('ladders/{ladder}/matches', [App\Http\Controllers\Ajax\MatchController::class, 'store'])->name('ajax.match.store');
});
