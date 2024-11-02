<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->user_id = auth()->id(); // Assumindo que o usuário está autenticado
        $comment->save();

        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }
}
