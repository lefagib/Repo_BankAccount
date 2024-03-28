<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;
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

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
 });

//Pour les Clients
    Route::get('/clients' , [ClientController::class , 'getAllClients']);
    Route::get('/create' , [ClientController::class ,'create' ]);
    Route::post('/create' , [ClientController::class , 'store']);
    Route::get('/show/{id}' , [ClientController::class ,'show']);
    Route::get('/destroy/{id}' , [ClientController::class , 'delete']);
    Route::post('/update/{id}' , [ClientController::class , 'update']);

    //Pour les Comptes
Route::get('/accounts' ,[AccountController::class , 'index']);
Route::get('/accounts/create' , [AccountController::class ,'create']);
Route::post('/accounts/create' , [AccountController::class ,'store']);
Route::get('/accounts/show/{id}' , [AccountController::class,'show']);
Route::get('/accounts/update/{id}', [AccountController::class , 'update']);
Route::get('/accounts/delete/{id}' , [AccountController::class , 'destroy']);
