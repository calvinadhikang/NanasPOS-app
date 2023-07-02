<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login', [LoginController::class, 'loginApi']);
Route::get('menu/{divisi}', [MenuController::class, "getMenu"]);
Route::get('transaksi/{divisi}', [TransactionController::class, "getTransaction"]);
Route::get('transaksi/detail/{id}', [TransactionController::class, "getTransactionDetail"]);
Route::post('transaksi', [TransactionController::class, "createTransaction"]);
