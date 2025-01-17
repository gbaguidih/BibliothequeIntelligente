<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        return view('author.index', compact('authors') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography'=>'required|string',
        ]);
        Author::create($request->all());
        return redirect()->route('author.index');
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
    public function edit( $id)
    {
        $authors = Author::find($id);
        return view('author.edit', compact('authors') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {   
        $validatedData =$request->validate([
            'name' => 'required|string|max:255',
            'biography'=>'required|string',
        ]);
        $authors = Author::find($id);
        $authors->update($validatedData);
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authors = Author::find($id);
        $authors ->delete();
        return redirect()->route('author.index');
    }
}
