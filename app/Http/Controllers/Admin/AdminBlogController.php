<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\BlogCategory;
use App\BlogPost;

class AdminBlogController extends Controller
{
	public function indexCateg(Request $request)
	{
		return view('admin.pages.blog.category.index')->with('categories', BlogCategory::all());
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
        $categBlog->urn 	 			= $request->urn;
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

	}
	public function createPost()
	{

	}
	public function storePost(Request $request)
	{

	}
	public function editPost($id)
	{

	}
	public function updatePost(Request $request)
	{

	}
	public function deletePost($id)
	{

	}
}
