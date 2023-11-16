<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Postcontroller extends Controller
{
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max20',
            'body' => 'required|max400',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        $post = Post::create($validated);
        return back()->with('message', '保存しました');
    }
}
