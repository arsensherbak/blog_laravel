<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Post;


class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = request()->validate([
            'message' => 'string',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        Comment::create($data);
        return redirect()->route('post.show', $post);
    }
}
