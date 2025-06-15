<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilanController;
use App\Http\Controllers\PretController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






Route::post("login", [AuthController::class,"login"]);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('bilan', [BilanController::class, 'index']);

    Route::delete("prets/delete/{pret}", [PretController::class, "destroy"]);
    Route::put("prets/update/{pret}", [PretController::class, "update"]);
    Route::get("prets/show/{pret}", [PretController::class, "show"]);
    Route::post("prets/store", [PretController::class, "store"]);
    Route::get("prets", [PretController::class, "index"]);
    Route::post("logout", [AuthController::class,"logout"]);
    Route::get('/admin', [AuthController::class, 'admin']);
});
