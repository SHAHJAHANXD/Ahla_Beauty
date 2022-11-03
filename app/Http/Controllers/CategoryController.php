<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $category = Category::get();
        return view('admin.categories.index', compact('category'));
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
}
