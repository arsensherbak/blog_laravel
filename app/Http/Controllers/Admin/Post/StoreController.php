<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke()
    {
        try {
            Db::beginTransaction();
            $data = request()->validate([
                'title' => 'string',
                'content' => 'string',
                'image' => 'file',
                'image_key' => 'file',
                'category_id' => 'integer|exists:categories,id',
                'tags_ids' => 'nullable|array',
                'tags_ids.*' => 'nullable|integer|exists:tags,id',
            ]);
            if (isset($data['tags_ids'])) {
                $tagsIds = $data['tags_ids'];
                unset($data['tags_ids']);
            }
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $data['image_key'] = Storage::disk('public')->put('/images', $data['image_key']);

            $post = Post::firstOrCreate($data);
            if (isset($tagsIds)) {
                $post->tags()->attach($tagsIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }


        return redirect()->route('post.index');
    }
}
