<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AddressController;
use App\Http\Controllers\Api\v1\ArticleController;
use App\Http\Controllers\Api\v1\UserController;

Route::group(['prefix' => "v1"], function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/articles', [ArticleController::class, 'allArticles']);
});

Route::group(['middleware' => ['jwt.verify'], "prefix" => "v1"], function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/myarticles', [ArticleController::class, 'myArticles']);
    Route::post('/article', [ArticleController::class, 'add']);
    Route::post('/address', [AddressController::class, 'add']);
});
