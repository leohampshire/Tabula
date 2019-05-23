<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seo;
use App\Category;
use App\Course;

class AdminSeoController extends Controller
{
	public function index()
	{
		return view('admin.pages.seo.index')
		->with('seos', Seo::all());
	}
	
	public function create()
	{
		return view('admin.pages.seo.create')
		->with('categories', Category::all())
		->with('courses', Course::all());
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
    		'metaDescription'  	=> 'required',
    		'metaType'			=> 'required',
    		'pageType' 			=> 'required'
    	]);   
 		
    	//Confugura o Tipo da Página
    	if ($request->pageType == 'home') {
 			$page = 'Home';
    	}elseif ($request->pageType == 'course') {
    		$page = $request->pageCourse;
    	}else{
    		$page = $request->pageCateg;
    	}
 		$seo = new Seo;

 		$seo->meta_type 		= $request->metaType;
 		$seo->meta_description 	= $request->metaDescription;
 		$seo->page              = $page;
 		$seo->page_type 		= $request->pageType;
 		$seo->save();

    	return redirect(route('admin.seo.index'))->with('success', 'SEO criado com sucesso');
	}
	
	public function edit($id)
	{
		$seo = Seo::find($id);
		return view('admin.pages.seo.edit')
		->with('seo', $seo)
		->with('categories', Category::all())
		->with('courses', Course::all());
	}
	
	public function update(Request $request)
	{
		$this->validate($request, [
    		'metaDescription'  	=> 'required',
    		'metaType'			=> 'required',
    		'pageType' 			=> 'required'
    	]);   
 		
    	//Confugura o Tipo da Página
    	if ($request->pageType == 'home') {
 			$page = 'Home';
    	}elseif ($request->pageType == 'course') {
    		$page = $request->pageCourse;
    	}else{
    		$page = $request->pageCateg;
    	}
 		$seo = Seo::find($request->id);

 		$seo->meta_type 		= $request->metaType;
 		$seo->meta_description 	= $request->metaDescription;
 		$seo->page              = $page;
 		$seo->page_type 		= $request->pageType;
 		$seo->save();

    	return redirect(route('admin.seo.index'))->with('success', 'SEO editado com sucesso');
	}
	
	public function delete($id)
	{
		$seo = Seo::find($id);
		$seo->delete();

        return redirect()->back()->with('success', 'SEO removido com sucesso');
	}
}

