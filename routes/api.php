<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontraktorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});

Route::group(['middleware' => ['auth:sanctum', 'mitra']], function() {
    Route::post('/add-kontraktor', [KontraktorController::class,'store']);
    Route::get('/get-kontraktor', [KontraktorController::class,'getData']);

});