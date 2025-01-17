<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        $authors = Author::all();
        return view('book.index', compact('books','authors') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('book.create', compact('books','authors') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author_id'=>'required|exists:authors,id',
            'isbn'=>'required|integer',
            'published_year'=>'required|date_format:Y-m-d',
        ]);
        Book::create($request->all());
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Book::find($id);
        $authors = Author::all();
        return view('book.edit', compact('books','authors') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required|string',
            'author_id'=>'required|exists:authors,id',
            'isbn'=>'required|integer',
            'published_year'=>'required|date_format:Y-m-d',
        ]);
        $books = Book::find($id);
        $books->update($validateData);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = Book::find($id);
        $books ->delete();
        return redirect()->route('book.index');
    }
}
