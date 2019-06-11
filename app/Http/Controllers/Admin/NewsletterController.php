<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\NewslettersExport;
use App\Newsletter;
use Excel;

class NewsletterController extends Controller

{
    public function newsletter(Request $request)
    {

    	$request->validate([
    		'name' => 'required',
    		'email' => 'required|unique:newsletters',
    	]);
    	Newsletter::create($request->all());

    	return redirect()->back()->with('success', 'Obrigado por se cadastrar!');
    }

    public function index()
    {
    	$newsletters = Newsletter::all();
    	return view('admin.pages.newsletter.index')
    	->with('newsletters', $newsletters);
    }

    public function export()
    {
    	$export = Newsletter::all();
    	return Excel::download(new NewslettersExport($export), 'newsletters.xlsx');
    	return redirect()->back();
    }
}
