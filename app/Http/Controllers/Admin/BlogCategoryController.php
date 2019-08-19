<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\ServiceBlogCategory;
use App\BlogCtegory;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = new BlogCategory;

        if ($request->has('name')) {
            if (request('name') != '') {
                $categories = $categories->where('name', 'like', request('name') . '%');
            }
        }
        $categories = $categories->orderBy('name', 'asc')->paginate(20);
        return view('admin.pages.blog.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.pages.blog.category.create');
    }

    public function store(Request $request, ServiceBlogCategory $service)
    {
        $this->validate($request, [
            'name' => 'required|unique:blog_categories',
            'meta_title' => 'required',
            'urn' => 'required|unique:blog_categories',
        ]);
        try {
            $service->createBlogCategory($request->all());
        } catch (\Exception $e) {
			return redirect()->back()
			->with('error', 'Ops, tivemos um problema, entre em contato com um dos administrador' . $e->getMessage());
        }
        return redirect(route('admin.categ.blog.index'))
            ->with('success', 'Categoria do blog criada com sucesso');
    }

    public function edit($id)
    {
        $categBlog = BlogCategory::find($id);
        return view('admin.pages.blog.category.edit')->with('categBlog', $categBlog);
    }

    public function update(Request $request, ServiceBlogCategory $service)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('blog_categories')->ignore($request->id),
            ],
            'urn' => [
                'required',
                Rule::unique('blog_categories')->ignore($request->id),
            ],
            'meta_title' => 'required',

        ]);
		$categBlog = BlogCategory::find($request->id);
		try {
            $service->updateBlogCategory($categBlog, $request->except('id','token_id'));
        } catch (\Exception $e) {
			return redirect()->back()
			->with('error', 'Ops, tivemos um problema, entre em contato com um dos administrador' . $e->getMessage());
        }
        
        return redirect(route('admin.categ.blog.index'))
            ->with('success', 'Categoria do blog Editada com sucesso');
    }

    public function delete(BlogCategory $blogCategory)
    {
        try {
            $blogCategory->delete();
        } catch (\Exception $e) {
			return redirect()->back()
			->with('error', 'Ops, tivemos um problema, entre em contato com um dos administrador' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Categoria do blog removida com sucesso');
    }
}
