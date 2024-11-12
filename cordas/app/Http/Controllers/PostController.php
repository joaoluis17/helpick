<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        return view('forum', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        // Cria um novo post
        $post = Post::create([
            'title' =>  $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post criado com sucesso!');
    }

    public function show($id)
    {
        // Busca o post pelo ID junto com os comentários
        $post = Post::findOrFail($id);

        // Retorna a view com o post e seus comentários
        return view('posts.show', compact('post'));
    }

}
