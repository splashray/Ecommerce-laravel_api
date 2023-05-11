<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
// Route::resource('products', ProductController::class);

//Public routes
Route::post('/login',[AuthController::class, 'login']);

Route::post('/register',[AuthController::class, 'register']);

Route::get('/products',[ProductController::class, 'index']);

Route::get('/products/{id}',[ProductController::class, 'show']);

Route::get('/products/search/{name}',[ProductController::class, 'search']);



//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::post('/logout',[AuthController::class, 'logout']);

 Route::post('/products',[ProductController::class, 'store']);
 Route::put('/products/{id}',[ProductController::class, 'update']);
 Route::delete('/products/{id}',[ProductController::class, 'destroy']);
 
});

    
