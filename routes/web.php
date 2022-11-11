<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controller\ProfileController;
use App\Http\Controllers\FileController;
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

Route::get('show/{post}',[PostsController::class,'show'])->name('post.show');
Route::get('post/create',[PostsController::class,'create'])->name('post.create');
Route::post('/created',[PostsController::class,'store'])->name('post.store');
Route::post('/temp-upload', [FileController::class, 'temp_upload'])->name('temp-upload');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::PATCH('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


