<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment; // Certifique-se de ter o modelo Comment
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Exibir todos os comentários de um post específico
    public function index(Post $post)
    {
        $comments = $post->comments; // Supondo que você tenha um relacionamento no modelo Post
        return view('comments.index', compact('post', 'comments'));
    }

    // Mostrar o formulário para criar um novo comentário
    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    // Armazenar um novo comentário
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comentário adicionado com sucesso!');
    }

    // Mostrar o formulário para editar um comentário existente
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', compact('post', 'comment'));
    }

    // Atualizar um comentário
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comentário atualizado com sucesso!');
    }

    // Excluir um comentário
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comentário excluído com sucesso!');
    }
}
