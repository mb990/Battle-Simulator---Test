<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/game', 'GameController@store')->name('game.store');
Route::post('/army', 'ArmyController@store')->name('army.store');
Route::get('/attack/{armyId}', 'AttackController@start')->name('attack.start');
//Route::put('/army/{id}', 'ArmyController@updateUnits')->name('army.update-units');
