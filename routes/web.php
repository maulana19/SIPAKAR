<?php

use App\Http\Controllers\batchController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isLogin'])->group(function () {
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/', [dashboardController::class, 'dashboard']);
        Route::get('/users', [UserController::class, 'users']);
        Route::get('/users/add', [UserController::class, 'addUser']);
        Route::get('/users/edit/{id}', [UserController::class, 'editUser']);
        Route::get('/users/change-password/{id}', [UserController::class, 'changePassUser']);
        Route::post('/users/save', [UserController::class, 'saveUser']);
        Route::post('/users/update/{id}', [UserController::class, 'updateUser']);
        Route::post('/users/change-password/{id}', [UserController::class, 'updatePassUser']);
        Route::delete('/users/delete/{id}', [UserController::class, 'removeUser'])->middleware('isPreventDelete');

        Route::get('/items', [ItemController::class, 'items']);
        Route::get('/items/add', [ItemController::class, 'addItem']);
        Route::get('/items/edit/{id}', [ItemController::class, 'editItem']);
        Route::get('/items/detail/{id}', [ItemController::class, 'detailItem']);
        Route::delete('/items/delete/{id}', [ItemController::class, 'removeItem']);

        Route::get('/batch-list', [BatchController::class, 'batch']);
        Route::get('/batch/add', [BatchController::class, 'addBatch']);
        Route::get('/batch/edit/{id}', [BatchController::class, 'editBatch']);
        Route::get('/batch/detail/{id}', [BatchController::class, 'detailBatch']);
        Route::get('/batch/pembagian-area/{id}', [BatchController::class, 'area']);
        Route::delete('/batch/delete/{id}', [BatchController::class, 'removeBatch']);

        Route::get('/detail-laporan/{id}', [dashboardController::class, 'detailLaporan']);
    });
    Route::middleware(['isNotAdmin'])->group(function () {
        Route::get('/home', [dashboardController::class, 'home']);
    });
    Route::get('/logout', [dashboardController::class, 'logout']);
});


Route::middleware(['isNotLogin'])->group(function () {
    Route::get('/login', [dashboardController::class, 'loginPage'])->name('login');
    Route::post('/login', [dashboardController::class, 'loginProccess']);
});
