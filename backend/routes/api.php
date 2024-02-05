<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelAgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\ContractController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [TravelAgentController::class, 'store']);

//Routes for accomodations crude operations
Route::get('/accommodations', [AccommodationController::class, 'index']);
Route::get('/accommodations/{id}', [AccommodationController::class, 'show']);
Route::post('/accommodations', [AccommodationController::class, 'store']);
Route::put('/accommodations/{id}', [AccommodationController::class, 'update']);
Route::delete('/accommodations/{id}', [AccommodationController::class, 'destroy']);

//Routes for contracts crude operations
Route::get('/contracts', [ContractController::class, 'index']);
Route::get('/contracts/{id}', [ContractController::class, 'show']);
Route::post('/contracts', [ContractController::class, 'store']);
Route::put('/contracts/{id}', [ContractController::class, 'update']);
Route::delete('/contracts/{id}', [ContractController::class, 'destroy']);

//Routes for user crude operations
Route::get('/agents', [TravelAgentController::class, 'index']);
Route::get('/agents/{id}', [TravelAgentController::class, 'show']);
Route::put('/agents/{id}', [TravelAgentController::class, 'update']);
Route::delete('/agents/{id}', [TravelAgentController::class, 'destroy']);
