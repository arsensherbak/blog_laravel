<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $data = request()->validate([
            'title' => 'string',
        ]);
        $tag->update($data);
        return view('admin.tags.show', compact('tag'));
    }
}
