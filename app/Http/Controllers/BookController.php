<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return csrf_token();
    }
    public function getBooks() {
        $books = Book::all();

        return response()->json($books);
    }

    public function create(Request $request) {
        // Валидация входных данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Создание книги
        $book = Book::create($validated);

        // Ответ
        return response()->json([
            'message' => 'Book created successfully.',
            'book' => $book,
        ], 201);
    }


    public function update(Request $request, $id) {
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Поиск книги
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Книга не найдена'], 404);
        }

        // Обновление полей
        $book->title = $validated['title'];
        $book->description = $validated['description'] ?? null;
        $book->save();

        return response()->json(['message' => 'Книга обновлена', 'book' => $book]);
    }

    public function delete($id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Книга не найдена'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Книга удалена']);
    }
}
