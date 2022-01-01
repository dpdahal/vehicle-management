<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Backend\BackendController;
use App\Models\City\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CityController extends BackendController
{
    public function index()
    {
        $this->data('cityData', City::all());
        return view($this->pagePath . 'city.index', $this->data);
    }

    public function create()
    {
        return view($this->pagePath . 'city.create', $this->data);
    }

    public function show($id)
    {
        $this->data('cityData', City::findOrFail($id));
        return view($this->pagePath . 'city.show', $this->data);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'city_name' => 'required|unique:cities,city_name',
            'city_slug' => 'required|unique:cities,city_slug',
        ]);
        $countryObject = new City();
        $countryObject->city_name = $request->city_name;
        $countryObject->city_slug = Str::slug($request->city_slug);
        $countryObject->image = $this->customFileUpload('uploads/city', false);
        $countryObject->video = $request->video;
        $countryObject->status = $request->status;
        $countryObject->is_footer = $request->is_footer;
        $countryObject->meta_title = $request->meta_title;
        $countryObject->meta_description = $request->meta_description;
        $countryObject->description = $request->description;
        if ($countryObject->save()) {
            return redirect()->route('admin-city.index')->with('success', 'data was inserted');
        } else {
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $this->data('cityData', City::findOrFail($id));
        return view($this->pagePath . 'city.update', $this->data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'city_name' => 'required|', [
                Rule::unique('cities', 'city_name')
                    ->ignore($id)
            ],
            'city_slug' => 'required|', [
                Rule::unique('cities', 'city_slug')
                    ->ignore($id)
            ],

        ]);
        $contentObject = City::findOrFail($id);
        if ($request->hasFile('image')) {
            $this->deleteFile($contentObject->image);
            $contentObject->image = $this->customFileUpload('uploads/city');
        }
        $contentObject->city_name = $request->city_name;
        $contentObject->city_slug = Str::slug($request->city_slug);
        $contentObject->video = $request->video;
        $contentObject->status = $request->status;
        $contentObject->is_footer = $request->is_footer;
        $contentObject->meta_title = $request->meta_title;
        $contentObject->meta_description = $request->meta_description;
        $contentObject->description = $request->description;
        if ($contentObject->save()) {
            return redirect()->route('admin-city.index')->with('success', 'city was successfully created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }


    }

    public function destroy($id)
    {
        $findContent = City::findOrFail($id);
        $this->deleteFile($findContent->image);
        $findContent->delete();
        return redirect()->back()->with('success', 'content was deleted');

    }
}
