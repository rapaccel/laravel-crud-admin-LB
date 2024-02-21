<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBlogController;
use App\Http\Controllers\ApiPriceController;

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
// Route::resource('prices', ApiPriceController::class);
Route::get('/blogs',[ApiBlogController::class,'index']);
Route::get('/blog/search/{judul}',[ApiBlogController::class,'search']);
Route::post('/tambah-blog',[ApiBlogController::class,'store']);
Route::get('/prices',[ApiPriceController::class,'index']);
Route::get('/blogs/{id}', [ApiBlogController::class, 'show']);