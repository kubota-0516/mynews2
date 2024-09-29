<?php

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

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');//middlewareリダイレクト設定
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add');
    Route::get('profile/edit', 'edit');
    Route::post('profile/create', 'create');
    Route::post('profile/edit', 'update');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
