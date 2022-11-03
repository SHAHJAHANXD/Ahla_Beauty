<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Countries;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $category = Category::get();
        return view('admin.categories.index', compact('category'));
    }
    public function edit_categories($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('category','id'));
    }
   

    public function post_categories(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        if ($request->hasfile('category_image')) {
            $imageName = env('APP_URL') . 'images/categories/' . time() . '.' . $request->category_image->extension();
            $category->category_image = $imageName;
            $request->category_image->move(public_path('images/categories'),  $imageName);
        }
        $category->save();
        return redirect()->back()->with('success','Category created successfully!');
    }
    public function post_edit_categories(Request $request)
    {
        $category = Category::where('id', $request->id)->first();
        $category->category_name = $request->category_name;
        if ($request->hasfile('category_image')) {
            $imageName = env('APP_URL') . 'images/categories/' . time() . '.' . $request->category_image->extension();
            $category->category_image = $imageName;
            $request->category_image->move(public_path('images/categories'),  $imageName);
        }
        $category->save();
        return redirect()->route('admin.categories')->with('success','Category updated successfully!');
    }

    public function activeCategory($id)
    {
        $category = Category::where('id' , $id)->first();
        $category->category_status = 1;
        $category->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function blockCategory($id)
    {
        $category = Category::where('id' , $id)->first();
        $category->category_status = 0;
        $category->save();
        return redirect()->back()->with('success','Status updated successfully!');
    }
    public function deletecategories($id)
    {
        $category = Category::where('id' , $id)->first();
        $category->delete();
        return redirect()->back()->with('success','Record deleted successfully!');
    }
}
