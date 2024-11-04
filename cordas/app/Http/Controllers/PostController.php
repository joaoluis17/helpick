<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('forum', compact('posts'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'nullable|exists:users,id', // Permite que seja nulo temporariamente
        ]);

        // Cria um novo post
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];

        // Somente atribui user_id se ele estiver presente
        if (isset($validatedData['user_id'])) {
            $post->user_id = $validatedData['user_id'];
        }

        $post->save();

        return redirect()->route('posts.show', $post->id)->with('success', 'Post criado com sucesso!');
    }

    public function show($id)
    {
        // Busca o post pelo ID junto com os comentários
        $post = Post::with('comments.user')->findOrFail($id);

        // Retorna a view com o post e seus comentários
        return view('posts.show', compact('post'));
    }

}
