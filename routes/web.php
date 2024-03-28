<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use app\Models\Client;

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

/*Route::get('/', function () {

    return view('list');
});*/

Route::get('/clients', [ClientController::class,'getAllClients'])->name('client.list');
Route::get('/clients/create', [ClientController::class,'create'])->name('client.create');
Route::get('/clients/{id}', [ClientController::class,'show'])->name('client.show');
Route::post('clients/create', [ClientController::class,'store'])->name('client.store');
Route::get('clients/edite/{id}', [ClientController::class,'edite'])->name('client.edite');
Route::get('clients/delete/{id}', [ClientController::class,'delete'])->name('client.delete');
Route::get('clients/update/{id}', [ClientController::class,'update'])->name('client.update');

//Route des Comptes
Route::get('/accounts', [AccountController::class,'index'])->name('account.index');
Route::get('/accounts/create', [AccountController::class,'create'])->name('account.create');
Route::get('/accounts/{id}', [AccountController::class,'show'])->name('account.show');
Route::post('/accounts/create', [AccountController::class,'store'])->name('account.store');
Route::get('/accounts/edite/{id}', [AccountController::class,'edit'])->name('account.edit');
Route::get('/accounts/delete/{id}', [AccountController::class,'destroy'])->name('account.delete');
Route::post('/accounts/update/{id}', [AccountController::class,'update'])->name('account.update');






