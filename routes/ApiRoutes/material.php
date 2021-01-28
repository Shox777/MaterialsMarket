<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'materials'], function () {
    Route::get('/', [MaterialController::class, 'index']);
    Route::get('/{id}', [MaterialController::class, 'show'])->where(['id' => '[0-9]+']);
    Route::post('/create', [MaterialController::class, 'store']);
    Route::put('/update/{id}', [MaterialController::class, 'update'])->where(['id' => '[0-9]+']);
    Route::delete('/delete/{id}', [MaterialController::class, 'destroy'])->where(['id' => '[0-9]+']);
});
