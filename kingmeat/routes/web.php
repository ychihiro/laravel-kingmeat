<?php

use App\Http\Controllers\KingmeatController;
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

Route::get('/', [KingmeatController::class, 'index']);
Route::post('meat/create', [KingmeatController::class, 'create']);
Route::get('meat/find', [KingmeatController::class, 'find']);
Route::get('meat/search', [KingmeatController::class, 'search']);
Route::post('/meat/delete/{id}', [KingmeatController::class, 'delete']);
Route::get('meat/return', [KingmeatController::class, 'return']);
