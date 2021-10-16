<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//})->name('home');
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('about', [pageController::class, 'about'])->name('about');

Route::resource('articles', ArticleController::class);
