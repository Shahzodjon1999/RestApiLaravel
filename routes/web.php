<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Resources\Views\Layouts;
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

Route::get('/token', function () { return csrf_token(); });


Route::get('/create',function(){   return view('bookviews.create'); })->name('create');
Route::get('/edit/{id}',[BookController::class,'edite'])->name('edit');  


Route::get('/books',[BookController::class,'index'])->name('index');
Route::get('/books/{id}',[BookController::class,'show'])->name('show');
Route::post('/books',[BookController::class,'store'])->name('add');
Route::put('/update/{id}',[BookController::class,'update'])->name('update');
Route::get('/delete/{id}',[BookController::class,'destroy'])->name('delete');
