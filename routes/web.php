<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->action([ArticlesController::class, 'index']);
});

Route::resource('articles', ArticlesController::class);

Route::get('/arhivo-json',function(){
   return view('file-json');
})->name('arhivo-json');
