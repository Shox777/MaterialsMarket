<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show'])->where(['id' => '[0-9]+']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::put('/update/{id}', [ProductController::class, 'update'])->where(['id' => '[0-9]+']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->where(['id' => '[0-9]+']);
});