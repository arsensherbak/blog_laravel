<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;


class UpdateController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $data = request()->validate([
            'message' => 'string',
        ]);
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
}
