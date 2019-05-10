<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Category;
use Session;

class AdminSubcategoryController extends Controller
{

	public function index(Request $request)
	{
		$subcategories = new Category;
		$subcategories = $subcategories->where('category_id','<>', null);

        if($request->has('name')){
            if(request('name') != ''){
                $subcategories = $subcategories->where('name', 'like', request('name') . '%')->where('category_id','<>', null);
            }
        }
        $subcategories = $subcategories->orderBy('name', 'asc')->paginate(20);
		return view('admin.pages.subcategory.index')->with('subcategories', $subcategories);
	}

	public function create()
	{
		$categories = Category::where('category_id', null)->get();
		return view('admin.pages.subcategory.create')->with('categories', $categories);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'name' 			=> 'required',
            'urn' 			=> 'required|unique:categories',
            'category_id' 	=> 'required',
        ]);

        $subcategory = new Category;
        $subcategory->name 			= $request->name;
        $subcategory->urn 			= $request->urn;
        $subcategory->category_id 	= $request->category_id;
        $subcategory->save();
        Session::flash('success', 'Subcategoria vinculada com sucesso.');
        return redirect(route('admin.subcategory.index'));
	}

	public function edit($id)
	{
		$subcategory = Category::find($id);
        $categories = Category::where('category_id', null)->get();
        return view('admin.pages.subcategory.edit')
        ->with('subcategory', $subcategory)
        ->with('categories', $categories);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'name' 			=> 'required',
            'urn'           => [
                'required',
                Rule::unique('categories')->ignore($request->id)
            ],
            'category_id' 	=> 'required',
        ]);

        $subcategory = Category::find($request->id);
        $subcategory->name 			= $request->name;
        $subcategory->urn 			= $request->urn;
        $subcategory->category_id 	= $request->category_id;
        $subcategory->save();
        Session::flash('success', 'Subcategoria editada com sucesso.');
        return redirect()->route('admin.subcategory.index');
	}

	public function delete($id)
	{
        $subcategory = Category::find($id);

        $subcategory->delete();

        return redirect()->back()->with('success', 'Subcategoria removida com sucesso!');
	}

}
