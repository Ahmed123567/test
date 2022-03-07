<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use  App\Http\Controllers\CommentController;

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
    return view('welcome');
});


//post

Route::prefix('posts')->group(function () {
    
    Route::get('/', [PostController::class, 'index'])->name('posts.index');

    Route::get('create' , [PostController::class, 'create' ])->name('posts.create');
    
    Route::get('{post}', [PostController::class , 'show'])->name('posts.show');
    
    Route::post('store', [PostController::class , 'store'])->name('posts.store');
    
    Route::get('{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    
    Route::get('delete/{post}', [PostController::class , 'delete'])->name('posts.delete');
    
    Route::post('{post}', [PostController::class, 'update'])->name('posts.update');
    
});




Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
