<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Tag,PostTag,BlogPost};

class TagController extends Controller
{
    public function findOrCreate(Request $request, BlogPost $post)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $tag = Tag::updateOrCreate(
            ['name' => $request->name],
            [
                'name' => $request->name, 
                'slug' => generateSlug($request->name), 
            ]
        );
        $tag_id = $tag->id;
        $intermediary = $post->with('tags')->whereHas('tags', function($query) use ($tag_id){
            $query->where('tag_id', $tag_id);
         })->count();
         if($intermediary == 0){
             $tag->posts()->save($post, ['tag_id'=> $tag->id, 'post_id' =>$post->id]);
         }
        return redirect()->back()->with('success', 'Tag Adicionada.');
    }

    public function delete(Tag $tag, BlogPost $post)
    {
        PostTag::where('post_id', $post->id)->where('tag_id', $tag->id)->delete();
        return redirect()->back()->with('success', 'Tag Removida.');

    }
}
