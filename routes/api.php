<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('parents', ParentController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('child', ChildController::class);
Route::post('makepayment', [TransactionController::class, 'makePayment']);
