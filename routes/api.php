<?php

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

// Route::get('categoryies',[App\HTTP\Controllers\Api\CategoryController::class,'index']);
// Route::get('categoryies/{category}',[App\HTTP\Controllers\Api\CategoryController::class,'show']);

Route::apiResource('categories',App\HTTP\Controllers\Api\CategoryController::class);
Route::apiResource('transactions',App\HTTP\Controllers\Api\TransactionController::class);