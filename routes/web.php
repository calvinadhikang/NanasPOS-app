<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, "loginView"]);
Route::post('/', [LoginController::class, "loginAction"]);
Route::get('/logout', [LoginController::class, "logoutAction"]);
Route::get('/dashboard', [LoginController::class, "dashboardView"]);

Route::prefix('/menu')->group(function() {
    Route::get('/', [MenuController::class, "menuView"]);
    Route::get('/add', [MenuController::class, "menuAddView"]);
    Route::get('/detail/{id}', [MenuController::class, "menuDetailView"]);

    Route::post('/add', [MenuController::class, "menuAddAction"]);
    Route::post('/detail/{id}', [MenuController::class, "menuDetailAction"]);
});

Route::prefix('/transaksi')->group(function() {
    Route::get('/', [TransactionController::class, "transactionView"]);
    Route::get('/detail/{id}', [TransactionController::class, "transactionDetailView"]);
});

Route::prefix('/user')->group(function() {
    Route::get('/', [UserController::class, "userView"]);
    Route::get('/add', [UserController::class, "userAddView"]);
    Route::get('/detail/{id}', [UserController::class, "userDetailView"]);

    Route::post('/add', [UserController::class, "userAddAction"]);
    Route::post('/detail/{id}', [UserController::class, "userDetailAction"]);
});
