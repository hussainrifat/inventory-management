<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    function viewCategory(){

        $category = Category::all();
        return view('profile.category',compact('category'));
    }

    function addCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Category Name Cannot Be Blank',
            'category_name.max' => 'Category Name Less Than 255',


        ]);

        // dd($request->category_name);

        Category::insert([
            'user_id'       => Auth::user()->id,
            'category_name' => $request->category_name,

        ]);

        return redirect()->back()->with('success','New Category Inserted Successfully');

    }
}
