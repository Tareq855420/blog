<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add');
    }
    public function newCategory(Request $request)
    {
        Category::addCategory($request);
        return redirect()->back()->with('message', 'Category Added Successfully.');
    }
    public function manageCategory()
    {
        return view('admin.category.manage',[
            'categories'=>Category::latest()->get()
        ]);
    }
    public function editCategory($id)
    {
        return view('admin.category.edit',[
            'category'=>Category::find($id)
        ]);
    }
    public function updateCategory(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','Category Updated Successfully');
    }
    public function deleteCategory($id)
    {
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('message','Category Deleted Successfully');
    }
}
