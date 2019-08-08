<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use App\BlogPost;
use App\PostTag;
use Auth;

class AdminBlogController extends Controller
{
	public function indexCateg(Request $request)
	{
		$categories = new BlogCategory;

        if($request->has('name')){
            if(request('name') != ''){
                $categories = $categories->where('name', 'like', request('name') . '%');
            }
        }
        $categories = $categories->orderBy('name', 'asc')->paginate(20);
		return view('admin.pages.blog.category.index')->with('categories', $categories);
	}

	public function createCateg()
	{
		return view('admin.pages.blog.category.create');
	}

	public function storeCateg(Request $request)
	{
		$this->validate($request, [
            'name' 				=> 'required|unique:blog_categories',	
            'meta_title' 		=> 'required',
            'urn' 				=> 'required|unique:blog_categories',
        ]);

        $categBlog = new BlogCategory;

        $categBlog->name 				= $request->name;
        $categBlog->meta_title 			= $request->meta_title;
        $categBlog->urn 	 			= strtolower ($request->urn);
        $categBlog->meta_description 	= $request->meta_description;
        $categBlog->keyword 			= $request->keyword;
        $categBlog->save();
        return redirect(route('admin.categ.blog.index'))
        ->with('success', 'Categoria do blog criada com sucesso');
	}

	public function editCateg($id)
	{
		$categBlog = BlogCategory::find($id);
    	return view('admin.pages.blog.category.edit')->with('categBlog', $categBlog);
	}

	public function updateCateg(Request $request)
	{
		$this->validate($request, [
            'name'        => [
                'required',
                Rule::unique('blog_categories')->ignore($request->id)
            ],	
            'urn'        => [
                'required',
                Rule::unique('blog_categories')->ignore($request->id)
            ],	
            'meta_title'  => 'required',
               
        ]);

        $categBlog = BlogCategory::find($request->id);

        $categBlog->name 				= $request->name;
        $categBlog->meta_title 			= $request->meta_title;
        $categBlog->urn 	 			= $request->urn;
        $categBlog->meta_description 	= $request->meta_description;
        $categBlog->keyword 			= $request->keyword;
        $categBlog->save();
        return redirect(route('admin.categ.blog.index'))
        ->with('success', 'Categoria do blog Editada com sucesso');
	}

	public function deleteCateg($id)
	{
		$categBlog = BlogCategory::find($id);
    	$categBlog->delete();
    	return redirect()->back()->with('success', 'Removida com sucesso');
	}


	public function indexPost(Request $request)
	{
        $posts = new BlogPost;

        $posts = $posts->orderBy('name', 'asc')->paginate(10);
		return view('admin.pages.blog.post.index')->with('posts', $posts);
	}
	public function createPost()
	{
		$categories = BlogCategory::all();
		if ($categories->count() > 0) {
			return view('admin.pages.blog.post.create')->with('categories', $categories);

		}
		return redirect()->back()->with('success', 'Criar ao mínimo uma categoria para o blog.');
	}
	public function storePost(Request $request)
	{
		$this->validate($request, [
            'name' 				=> 'required',		
            'category_id'		=> 'required',
            'content'			=> 'required',
            'urn'				=> 'required|unique:blog_posts',
            'cover'		 		=> 'mimes:jpg,png,jpeg',
        ]);
		$post = new BlogPost;
		$auth = Auth::guard('admin')->user();
		$post->name 			= $request->name;
		$post->meta_title 		= $request->meta_title;
		$post->meta_description = $request->meta_description;
		$post->keywords			= $request->keywords;
		$post->content 			= $request->content;
		$post->urn 				= strtolower($request->urn);
		$post->user_id 			= $auth->id;
		$post->category_id 		= $request->category_id;
		if($request->cover != ''){
            $post->cover      = $this->thumbImgValidate($request);
        }else{
            $post->cover      = 'cover.jpg';
        }
		$post->save();
		return redirect(route('admin.post.blog.index'))
        ->with('success', 'Post do blog criado com sucesso');
	}
	public function editPost($id)
	{
		$post = BlogPost::find($id);
    	return view('admin.pages.blog.post.edit')
    	->with('post', $post)
    	->with('categories', BlogCategory::all());
	}
	public function updatePost(Request $request)
	{
		$this->validate($request, [  
			'name'        => [
                'required',
                Rule::unique('blog_posts')->ignore($request->id)
            ],	
            'urn'        	=> [
                'required',
                Rule::unique('blog_posts')->ignore($request->id)
            ],	
            'category_id'	=> 'required',
            'content'		=> 'required',
            'cover'		 		=> 'mimes:jpg,png,jpeg',
        ]);
		$post = BlogPost::find($request->id);
		$auth = Auth::guard('admin')->user();
		$post->name 			= $request->name;
		$post->meta_title 		= $request->meta_title;
		$post->meta_description = $request->meta_description;
		$post->keywords			= $request->keywords;
		$post->urn 				= $request->urn;
		$post->content 			= $request->content;
		$post->user_id 			= $auth->id;
		$post->category_id 		= $request->category_id;
		if($request->cover != ''){
            $post->cover      = $this->thumbImgValidate($request);
        }
		$post->save();
		return redirect()->back()
        ->with('success', 'Post do blog editado com sucesso');
	}
	public function deletePost(BlogPost $post)
	{
		PostTag::where('post_id', $post->id)->delete();
		$post->comments()->delete();
		$post->delete();
		
		return redirect()->back()
        ->with('success', 'Post Removido');
	}

	public function thumbImgValidate(Request $request)
    {
        $arq_img = $request->file('cover');
        $name    = basename($arq_img->getClientOriginalName());
        $type    = strtolower(pathinfo($name,PATHINFO_EXTENSION));
        $count = 1;
        //Gera string aleatória
        while($count != 0){
            $str            = "";
            $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
            $max            = count($characters) - 1;

            for ($i = 0; $i < 7; $i++) {
                $rand   = mt_rand(0, $max);
                $str   .= $characters[$rand];
                $count  = BlogPost::where('cover', $str)->count();
            }
        }
        $arq_img_name = $str.'.'.$type;
        $arq_img->move('uploads/archives', $arq_img_name); 

        return $arq_img_name;  
    }
}
