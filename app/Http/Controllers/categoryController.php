<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    function viewCategory()
    {

        $category = Category::latest()->paginate(5);
        $trash = Category::onlyTrashed()->latest()->paginate(3);
        return view('profile.category', compact('category','trash'));
    }

    function addCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'category_name' => 'required|max:255',
            ],
            [
                'category_name.required' => 'Category Name Cannot Be Blank',
                'category_name.max' => 'Category Name Less Than 255',
            ]
        );

        Category::insert([
            'user_id'       => Auth::user()->id,
            'category_name' => $request->category_name,
            'created_at'    => carbon::now(),
        ]);

        return redirect()->back()->with('success', 'New Category Inserted Successfully');
    }

    public function editCategory($id)
    {

        $category= category::find($id);
        return view('admin.edit',compact('category'));
    }

    public function updateCategory(Request $request,$id){
        $update= category::find($id)->update([

            'category_name' =>  $request->category_name,
            'user_id'       =>  Auth::user()->id,
        ]);

        return redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function deleteCategory($id)
    {
        $delete= category::find($id)->delete();
        return redirect()->route('all.category')->with('success', 'Category Deleted Successfully');

    }

    public function restoreCategory($id)
    {
        $restore= category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Category Restored Successfully');

    }

    public function pdeleteCategory($id)
    {
        $delete= category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('all.category')->with('success', 'Category Permanently Deleted');

    }
}
