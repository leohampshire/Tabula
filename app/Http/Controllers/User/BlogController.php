<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{BlogCategory,BlogComment,BlogPost};

class BlogController extends Controller
{
    public function index()
    {
        $posts = new BlogPost;
        $posts = $posts->orderBy('updated_at', 'desc')->get();
        $categories = BlogCategory::all();
        return view('user.pages.blog.index')
        ->with('categories', $categories)
        ->with('posts', $posts);
    }
    public function category($urn)
    {
        $categ = BlogCategory::where('urn', $urn)->first();
        
        $posts = $categ->posts->sortByDesc('updated_at');
       
        $categories = BlogCategory::all();
        return view('user.pages.blog.category')
        ->with('categories', $categories)
        ->with('posts', $posts);
    }

    public function single($urn)
	{
		$post = BlogPost::where('urn', $urn)->first();
		return view('user.pages.blog.single')->with('post', $post);
	}
}
