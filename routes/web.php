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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('article');
Route::get('/article/find', [App\Http\Controllers\ArticleController::class, 'find'])->name('find');
Route::post('/article/save', [App\Http\Controllers\ArticleController::class, 'save'])->name('save');
Route::post('/article/update', [App\Http\Controllers\ArticleController::class, 'update'])->name('update');
Route::get('/article/delete={id}', [App\Http\Controllers\ArticleController::class, 'delete'])->name('delete');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

