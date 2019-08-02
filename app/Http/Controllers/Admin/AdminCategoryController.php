<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Category;
use Storage;
use Session;

class AdminCategoryController extends Controller
{
	
    public function index(Request $request)
	{
        $categories = new Category;

        if($request->has('name')){
            if(request('name') != ''){
                $categories = $categories->where('name', 'like', request('name') . '%');
            }
        }
        $categories = $categories->orderBy('name', 'asc')->paginate(20);
		return view('admin.pages.category.index')->with('categories', $categories);
	}
	
    public function create()
	{
        $last_index = Category::orderBy('desktop_index', 'name')->first()->desktop_index;
		return view('admin.pages.category.create')->with('last_index', $last_index);
	}
	
    public function store(Request $request)
	{
		$this->validate($request, [
            'name' 	            => 'required',
            'urn' 	            => 'required|unique:categories',
            'desktop_hex_bg' 	=> 'required',
	        'mobile_hex_bg' 	=> 'required',
	        'hex_icon' 			=> 'required'
        ]);
        
        $category = new Category();

        $last_index = Category::orderBy('desktop_index', 'name')->first()->desktop_index;

        if($request->desktop_index == '') 
        {
            $category->desktop_index 	= $last_index + 1;
            $attach_number 				= $last_index + 1;
        }
        else
        {
            $category->desktop_index 	= $request->desktop_index;
            $attach_number 				= $request->desktop_index;
        }
        if($request->mobile_index == '')
            $category->mobile_index = $last_index + 1;
        else 
            $category->mobile_index = $request->mobile_index;

        $attach_desktop_hex_bg 		= $request->desktop_hex_bg;
        $attach_desktop_hex_bg_name = time().'category-'.$attach_number.'.svg';
        $attach_desktop_hex_bg->move('images/hex/desktop', $attach_desktop_hex_bg_name); 

        $attach_mobile_hex_bg 		= $request->mobile_hex_bg;
        $attach_mobile_hex_bg_name 	= time().'category-'.$attach_number.'.svg';
        $attach_mobile_hex_bg->move('images/hex/mobile', $attach_mobile_hex_bg_name); 

        $attach_hex_icon 			= $request->hex_icon;
        $attach_hex_icon_name 		= time().'category-'.$attach_number.'.svg';
        $attach_hex_icon->move('images/hex/icon', $attach_hex_icon_name); 

        $category->desktop_hex_bg 	= $attach_desktop_hex_bg_name;  
        $category->mobile_hex_bg 	= $attach_mobile_hex_bg_name;
        $category->hex_icon 		= $attach_hex_icon_name;   

        $category->name = $request->name;
        $category->urn = $request->urn;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $category->save();

        Session::flash('success', 'Categoria adicionada com sucesso');

        return redirect(route('admin.category.index'));
	}
	
    public function edit($id)
	{
        $category = Category::find($id);
        return view('admin.pages.category.edit')->with('category', $category);

	}
	
    public function update(Request $request)
	{
        $this->validate($request, [
            'name' => 'required',
            'urn'  => [
                'required',
                Rule::unique('categories')->ignore($request->id)
            ],
        ]);

        $category = Category::find($request->id);

       
        $last_index = Category::orderBy('desktop_index', 'name')->first()->desktop_index;

        if($request->desktop_index == '') 
        {
            $category->desktop_index = $last_index + 1;
            $attach_number = $last_index + 1;
        }
        else
        {
            $category->desktop_index = $request->desktop_index;
            $attach_number = $request->desktop_index;
        }
        if($request->mobile_index == '')
            $category->mobile_index = $last_index + 1;
        else 
            $category->mobile_index = $request->mobile_index;

        if(isset($request->desktop_hex_bg))
        {
            $attach_desktop_hex_bg = $request->desktop_hex_bg;
            $attach_desktop_hex_bg_name = time().'category-'.$attach_number.'.svg';
            $attach_desktop_hex_bg->move('images/hex/desktop', $attach_desktop_hex_bg_name); 

            $category->desktop_hex_bg = $attach_desktop_hex_bg_name;
        }

        if(isset($request->mobile_hex_bg))
        {
            $attach_mobile_hex_bg = $request->mobile_hex_bg;
            $attach_mobile_hex_bg_name = time().'category-'.$attach_number.'.svg';
            $attach_mobile_hex_bg->move('images/hex/mobile', $attach_mobile_hex_bg_name); 

            $category->mobile_hex_bg = $attach_mobile_hex_bg_name;
        }

        if(isset($request->hex_icon))
        {
            $attach_hex_icon = $request->hex_icon;
            $attach_hex_icon_name = time().'category-'.$attach_number.'.svg';
            $attach_hex_icon->move('images/hex/icon', $attach_hex_icon_name);

            $category->hex_icon = $attach_hex_icon_name;  
        }
        

        $category->name = $request->name;
        $category->urn = $request->urn;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;

        $category->save();

        Session::flash('success', 'Categoria alterada com sucesso!');

        return redirect()->route('admin.category.index');
	}

	
    public function delete($id)
	{
        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('success', 'Categoria removida com sucesso!');
	}
}
