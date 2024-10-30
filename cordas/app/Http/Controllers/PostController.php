<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Obtenha todos os posts
        return view('posts.index', compact('posts')); // Retorne a view com os posts
    }

    // Mostrar o formulário para criar um novo post
    public function create()
    {
        return view('posts.create'); // Retorne a view de criação de post
    }

    // Armazenar um novo post
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required',
            'content' => 'required|string', // A validação garante que 'content' não será nulo
        ]);

        $post = new Post();
        $post->title = $request->title; // Dados vindos do formulário
        $post->content = $request->content; // Dados vindos do formulário
        $post->user_id = auth()->id(); // Atribui o ID do usuário autenticado
        $post->save(); // Salva no banco de dados

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }


}
