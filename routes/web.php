<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CityController;


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
    return view('home');
});

/* Creating a route for the home controller. */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Creating a route for the category controller. */
Route::get('category/{id}/active', [CategoryController::class, 'active'])->name('category.active');
Route::resource('category', CategoryController::class, ['except' => ['show', 'destroy']]);

/* Creating a route for the sector controller. */
Route::get('sector/{id}/active', [SectorController::class, 'active'])->name('sector.active');
Route::get('sector/{id}/users', [SectorController::class, 'users'])->name('sector.users');
Route::resource('sector', SectorController::class, ['except' => ['show', 'destroy']]);

/* Creating a route for the client controller. */
Route::get('client/{id}/active', [ClientController::class, 'active'])->name('client.active');
Route::get('client/{cpf_cnpj}/cpf-cnpj', [ClientController::class, 'validateCpfCnpj'])->name('client.validateCpfCnpj');
Route::get('client/{filter}/{search}', [ClientController::class, 'search'])->name('client.search');
Route::resource('client', ClientController::class);

/* Creating a route for the user controller. */
Route::get('user/{id}/active', [UserController::class, 'active'])->name('user.active');
Route::get('user/{login}/login', [UserController::class, 'validateLogin'])->name('user.validateLogin');
Route::get('user/{email}/email', [UserController::class, 'validateEmail'])->name('user.validateEmail');
Route::resource('user', UserController::class);

/* Creating a route for the ticket controller. */
Route::get('ticket/outstanding', [TicketController::class, 'outstanding'])->name('ticket.outstanding');
Route::resource('ticket', TicketController::class, ['except' => ['show']]);


Route::get('city/{state}/state', [CityController::class, 'showState'])->name('city.showState');