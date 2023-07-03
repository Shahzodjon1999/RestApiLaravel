<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth:api')->get('/user',function(Request $request){
    return $request->user();
});
Route::get('/books',[BookController::class,'index']);
Route::get('/books/{id}',[BookController::class,'show']);
Route::post('/books',[BookController::class,'store']);
Route::put('/books/{id}',[BookController::class,'update']);
Route::delete('/books/{id}',[BookController::class,'destroy']);
