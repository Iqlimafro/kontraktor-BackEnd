<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\TrackingController;
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

Route::get('get-mitra',[KontraktorController::class,'index']);
Route::get('get-price', [PriceController::class, 'index']);
Route::post('add-price', [PriceController::class, 'store']);
Route::post('add-form', [FormController::class, 'store']);
Route::post('update-form/{id}', [FormController::class, 'update']);
Route::get('get-form', [FormController::class, 'index']);
Route::get('get-order', [FormController::class, 'getOrder']);
Route::get('get-order/show/{user_id}', [FormController::class, 'getOrdersByUserId']);
Route::get('form/username/{username}', [FormController::class, 'getDataByUsername']);
Route::get('get-review', [ReviewsController::class,'index']);
Route::post('add-review', [ReviewsController::class,'store']);
Route::post('add-image', [ImageController::class,'store']);
Route::post('add-tracking', [TrackingController::class,'store']);
Route::get('get-tracking', [TrackingController::class,'index']);



Route::group(['middleware' => ['auth:sanctum', 'mitra']], function() {
    Route::post('/add-kontraktor', [KontraktorController::class,'store']);
    Route::get('/get-kontraktor', [KontraktorController::class,'getData']);

});
