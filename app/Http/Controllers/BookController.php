<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return Inertia::render(
            'Books/Index',
            [
                'books' => $books
            ]
        );
    }


    public function create()
    {
        return Inertia::render(
            'Books/Create'
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'autor' => 'required',
            'review' => 'required'
        ]);

        Book::create([
            'title' => $request->title,
            'autor' => $request->autor,
            'review' => $request->review
        ]);
        sleep(1);

        return redirect()->route('books.index')->with('message', 'Book Created Succesfully');
    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {
        return Inertia::render(
            'Books/Edit',
            [
                'book' => $book
            ]
        );
    }


    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'autor' => 'required',
            'review' => 'required'
        ]);

        $book->title = $request->title;
        $book->autor = $request->autor;
        $book->review = $request->review;
        $book->save();
        sleep(1);

        return redirect()->route('books.index')->with('message', 'Book Updated Successfully');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        sleep(1);

        return redirect()->route('books.index')->with('message', 'Book Delete Successfully');
    }
}
