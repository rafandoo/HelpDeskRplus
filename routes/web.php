<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AccessLevelController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OccurrenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;


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

Route::resource('category', CategoryController::class);
Route::resource('sector', SectorController::class);

Route::get('/priority', [PriorityController::class, 'index']);
Route::get('/priority/{id}', [PriorityController::class, 'show']);

Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id}', [StatusController::class, 'show']);

Route::get('/state', [StateController::class, 'index']);
Route::get('/state/{id}', [StateController::class, 'show']);

Route::get('/accesslevel', [AccessLevelController::class, 'index']);
Route::get('/accesslevel/{id}', [AccessLevelController::class, 'show']);
