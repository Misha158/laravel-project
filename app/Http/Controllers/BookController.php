<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return 'my first controller';
    }

    public function create() {
//       $newBook =[
//           [
//               'title' => 'Book Title',
//               'description' => 'Book Description',
//           ]
//       ];

       Book::create([
           'title' => 'Book Title2',
           'description' => 'Book Description2',
       ]);

       dd('created');
    }
}
