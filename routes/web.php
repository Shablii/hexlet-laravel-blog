<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return 'hello, world!';
});

Route::get('about', [PageController::class, 'about'])->name('about');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('articles/create', '\App\Http\Controllers\ArticleController@create')->name('articles.create');

Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::patch('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
