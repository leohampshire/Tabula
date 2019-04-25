<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Page;

class AdminPageController extends Controller
{
	public function index()
	{
		return view('admin.pages.page.index')->with('pages', Page::all());
	}

	public function edit($id)
	{
		$page = Page::find($id);
		return view('admin.pages.page.edit')->with('page', $page );
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'urn'           => [
                'required',
                Rule::unique('pages')->ignore($request->id)
            ],
            'desc' 			=> 'required',
        ]);
		$page = Page::find($request->id);
		$page->desc = $request->desc;
		$page->save();

		return redirect(route('admin.page.index'))->with('success', 'Página editada com sucesso');

	}



}
