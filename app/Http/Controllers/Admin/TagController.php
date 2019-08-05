<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Tag,PostTag,BlogPost};

class TagController extends Controller
{
    public function findOrCreate(Request $request, BlogPost $post)
    {
        $request->validate([
            'name' => 'required'
        ]);
        return dd($request);
    }
}
