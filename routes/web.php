<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/cat', function () {
//   $books =  Book::all();
//   return $books;
   dd('here');
//    return view('welcome');
});

Route::get('/cat/create', [BookController::class, 'create']);



//Route::get('/cat', [BookController::class, 'index']);
