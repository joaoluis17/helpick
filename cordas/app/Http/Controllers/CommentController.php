<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Confirme se o conteúdo está realmente chegando
        if (!$request->has('content') || empty($request->content)) {
            // Mensagem de log para identificar o problema
            \Log::error('Conteúdo do comentário está vazio ou nulo');
        }


        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'content' => $request->content ?? 'Valor padrão de teste',
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('posts.show', $request->post_id)->with('success', 'Comentário adicionado com sucesso!');
    }

}
