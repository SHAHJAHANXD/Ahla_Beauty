<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function countries()
    {
        $countries = Countries::get();
        return view('admin.countries.index', compact('countries'));
    }
    public function edit_countries($id)
    {
        $countries = Countries::where('id', $id)->first();
        return view('admin.countries.edit', compact('countries', 'id'));
    }
    public function post_countries(Request $request)
    {
        $countries = new Countries();
        $countries->name = $request->name;
        if ($request->hasfile('image')) {
            $imageName = env('APP_URL') . 'images/countries/' . time() . '.' . $request->image->extension();
            $countries->image = $imageName;
            $request->image->move(public_path('images/countries'),  $imageName);
        }
        $countries->save();
        return redirect()->back()->with('success', 'Country created successfully!');
    }
    public function post_edit_countries(Request $request)
    {
        $countries = Countries::where('id', $request->id)->first();
        $countries->name = $request->name;
        if ($request->hasfile('image')) {
            $imageName = env('APP_URL') . 'images/countries/' . time() . '.' . $request->image->extension();
            $countries->image = $imageName;
            $request->image->move(public_path('images/countries'),  $imageName);
        }
        $countries->save();
        return redirect()->route('admin.countries')->with('success', 'Country updated successfully!');
    }
    public function deletecountries($id)
    {
        $category = Countries::where('id' , $id)->first();
        $category->delete();
        return redirect()->back()->with('success','Record deleted successfully!');
    }
}
