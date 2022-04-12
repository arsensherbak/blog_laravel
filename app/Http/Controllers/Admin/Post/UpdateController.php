<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UpdateController extends Controller
{
    public function __invoke(Post $post)
    {
        try {
            Db::beginTransaction();
            $data = request()->validate([
                'title' => 'string',
                'content' => 'string',
                'image' =>'nullable|file',
                'image_key' =>'nullable|file',
                'category_id' => 'integer|exists:categories,id',
                'tags_ids' => 'nullable|array',
                'tags_ids.*' =>'nullable|integer|exists:tags,id',
            ]);
            $tagsIds = $data['tags_ids'];
            unset($data['tags_ids']);
            if(isset( $data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image'] );
            }
            if(isset( $data['image_key'])){
                $data['image_key'] = Storage::disk('public')->put('/images', $data['image_key'] );
            }
            $post->update($data);
            $post->tags()->sync($tagsIds);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }
}
