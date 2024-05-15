<?php

use App\Http\Controllers\Auth\MobileAuthController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->middleware(['auth:sanctum'])->group(function () {

    Route::post('/organizations', [OrganizationController::class, 'store']);
    Route::get('/organizations/{organization_id}', [OrganizationController::class, 'show']);
    Route::get('/organizations', [OrganizationController::class, 'index']);

});


Route::post('v1/mobile-login', [MobileAuthController::class, 'loginMobileApp']);
Route::post('v1/mobile-register', [MobileAuthController::class, 'register']);