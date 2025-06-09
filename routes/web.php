<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



Route::get('/index', [BookController::class, 'index']);
Route::get('/book', [BookController::class, 'getBooks']);
Route::post('/book', [BookController::class, 'create']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'delete']);



//Route::get('/cat', [BookController::class, 'index']);
