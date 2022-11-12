<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function add_cities($id)
    {
        $countries = Countries::where('id', $id)->first();
        return view('admin.cities.index', compact('countries'));
    }
    public function countries()
    {
        $countries = Countries::get();
        return view('admin.countries.index', compact('countries'));
    }
    public function post_cities(Request $request)
    {
        $request->validate(
            [
                'city' => 'required|max:254',
            ],
            [
                'city.required' => 'City name is required...',
                'city.max' => 'City name must be less then 254 characters...',
            ]
        );
        Cities::create($request->all());
        return redirect('/administrator/countries')->with('success', 'City Added Successfully!');
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
        $category = Countries::where('id', $id)->first();
        $category->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
