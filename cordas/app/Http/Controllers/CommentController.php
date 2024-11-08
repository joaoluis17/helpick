<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'user_id' => auth()->user()->id,
        ]);


        return redirect()->route('posts.show', $validated['post_id'])->with('success', 'Comentário adicionado com sucesso!');
    }

}
