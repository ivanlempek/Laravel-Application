<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;

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
   
Route::get ('/', HomeController::class)->name ('home');
Route::controller ( CategoryController::class)->group (function () {
    Route::get ('produtos', 'index')->name ('site.products');
    Route::get ('produtos/{category:slug}', 'show')->name ('site.products.show');
});
Route::get ('blog', BlogController::class)->name ('blog');
Route::view ('sobre', view:'site.about.index')->name ('about');
Route::controller (ContactController::class)->group (function () {
    Route::get ('contato', 'index')->name ('contact.index');
    Route::post ('contato', 'form')->name ('contact.form');
});