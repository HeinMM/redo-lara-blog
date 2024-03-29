<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/page',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}', [PageController::class, 'detail'])->name('page.detail');
Route::get("/cat/{category:slag}", [PageController::class, 'postByCategory'])->name('page.category');

Route::middleware("auth")->group(function () {
    Route::resource('/category', CategoryController::class)->except('show');
    Route::resource('/blog', BlogController::class);
    Route::resource('/user', UserController::class)->middleware('isAdmin');
    Route::resource('/nation',NationController::class);
    Route::resource('/photo',PhotoController::class);
    Route::resource('/profile', ProfileController::class);
    Route::post('/comment/{id}',[CommentController::class,'store'])->name('comment.store');
});

// Route::resource('/comment', CommentController::class);

