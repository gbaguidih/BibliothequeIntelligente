<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Author;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $comments = Comment::all();
        $posts = Post::all();
        $authors = Author::all();
        return view('comment.index', compact('comments') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments = Comment::all();
        $posts = Post::all();
        $authors = Author::all();
        return view('comment.create',compact('comments','posts','authors') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
            'post_id'=>'required|exists:posts,id',
            'author_id'=>'required|exists:authors,id',
            'content'=>'required|string',
        ]);
        Comment::create($request->all());
        return redirect()->route('comment.index');
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
    public function edit(string $id)
    {
        $comments = Comment::find($id);
        $posts = Post::all();
        $authors = Author::all();
        return view('comment.edit', compact('comments','posts','authors') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'post_id'=>'required|exists:posts,id',
            'author_id'=>'required|exists:authors,id',
            'content'=>'required|string',
        ]);
        $comments = Comment::find($id);
        $comments->update($validateData);
        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comments = Comment::find($id);
        $comments ->delete();
        return redirect()->route('comment.index');
    }
}
