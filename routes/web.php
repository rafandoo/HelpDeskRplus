<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OccurrencesController;
use App\Http\Controllers\ServiceOrderController;


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

/* Creating a route for the home controller. */
Route::get('/' , [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Creating a route for the category controller. */
Route::get('category/{id}/active', [CategoryController::class, 'active'])->name('category.active');
Route::resource('category', CategoryController::class, ['except' => ['show', 'destroy']]);

/* Creating a route for the sector controller. */
Route::get('sector/{id}/active', [SectorController::class, 'active'])->name('sector.active');
Route::get('sector/{id}/users', [SectorController::class, 'users'])->name('sector.users');
Route::post('sector/team', [SectorController::class, 'storeTeam'])->name('sector.team');
Route::delete('sector/team/{sector_id}/{user_id}', [SectorController::class, 'deleteTeam'])->name('sector.team.delete');
Route::patch('sector/team/{sector_id}/{user_id}', [SectorController::class, 'updateTeam'])->name('sector.team.update');
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
Route::get('ticket/{id}/occurrences', [TicketController::class, 'occurrences'])->name('ticket.occurrences');
Route::resource('ticket', TicketController::class, ['except' => ['show']]);

/* Creating a route for the occurrences controller. */
Route::get('occurrences/{id}', [OccurrencesController::class, 'index'])->name('occurrences.index');
Route::get('occurrences/{id}/create', [OccurrencesController::class, 'create'])->name('occurrences.create');
Route::post('occurrences/store', [OccurrencesController::class, 'store'])->name('occurrences.store');

/* Creating a route for the serviceOrder controller. */
Route::get('serviceOrder/{id}', [ServiceOrderController::class, 'direct'])->name('serviceOrder.direct');
Route::post('serviceOrder/store', [ServiceOrderController::class, 'store'])->name('serviceOrder.store');
Route::put('serviceOrder/update/{id}', [ServiceOrderController::class, 'update'])->name('serviceOrder.update');

Route::get('city/{state}/state', [CityController::class, 'showState'])->name('city.showState');

