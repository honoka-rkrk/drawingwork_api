<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('throttle:100,1')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('API-LG-010');
    Route::get('sample', [ComponentTestController::class, 'getJson'])->name('sample');

    Route::middleware(['auth:sanctum', 'type.user', 'auth.permission'])->group(function () {
        Route::delete('/logout', [AuthController::class, 'logout'])->name('API-LG-020');
    });
});

Route::get('sample', [ComponentTestController::class, 'getJson'])->name('sample');
