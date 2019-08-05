<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Category;
use App\Course;

class CategoryController extends Controller
{
    public function category($urn)
    {
    	$all_categories = [];
        $category = Category::where('urn', $urn)->first();
    	$parent_categories = Category::where('category_id', $category->id)->pluck('id')->toArray();

        array_push($all_categories, $category->id);
        $all_categories = array_merge($all_categories, $parent_categories);

        $courses = Course::whereIn('category_id', $all_categories)->where('avaliable',2)->get();
        $route = Route::getFacadeRoot()->current()->uri();
        return view('user.pages.category')
            ->with('category_name', $category->name)
            ->with('category_count', 0)
            ->with('route', $route)
            ->with('categories', Category::orderBy('name', 'ASC')->get())
            // busca todas os cursos da categoria selecionada
            ->with('courses', $courses)
            // campos para serem checados na search.blade
            ->with('checked_category', $category)
            // variável para ser escrita no campo de busca na search.blade
            ->with('search_string', '');
    }
}
