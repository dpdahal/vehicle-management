<?php

namespace App\Http\Controllers\Backend\Vehicle;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Vehicle\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VehicleTypeController extends BackendController
{

    public function index()
    {
        $this->data('vehicleTypeData', VehicleType::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'vehicle.types.index', $this->data);

    }

    public function show($id)
    {
        $this->data('vehicleTypeData', VehicleType::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'vehicle.types.index', $this->data);

    }

    public function create()
    {
        return view($this->pagePath . 'vehicle.types.create', $this->data);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|unique:vehicle_types,type',
            'title' => 'required|unique:vehicle_types,title',
            'slug' => 'required|unique:vehicle_types,slug',
            'status' => 'required'
        ]);
        $vOje = new VehicleType();
        $vOje->type = $request->type;
        $vOje->title = $request->title;
        $vOje->slug = Str::slug($request->slug);
        $vOje->date = $request->date;
        $vOje->status = $request->status;
        $vOje->meta_keywords = $request->meta_keywords;
        $vOje->meta_description = $request->meta_description;
        $vOje->description = $request->description;
        $vOje->image = $this->customFileUpload('uploads/vehicle-types');

        if ($vOje->save()) {
            return redirect()->route('manage-vehicle-type.index')->with('success', 'Vehicle types successfully created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function edit($id)
    {
        $this->data('vehicleTypeData', VehicleType::findOrFail($id));
        return view($this->pagePath . 'vehicle.types.update', $this->data);

    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'type' => 'required|', [
                Rule::unique('vehicle_types', 'type')->ignore($id)
            ],
            'title' => 'required|', [
                Rule::unique('vehicle_types', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('vehicle_types', 'slug')->ignore($id)
            ],
            'status' => 'required'
        ]);
        $vOje = VehicleType::findOrFail($id);
        $vOje->type = $request->type;
        $vOje->title = $request->title;
        $vOje->slug = Str::slug($request->slug);
        $vOje->date = $request->date;
        $vOje->status = $request->status;
        $vOje->meta_keywords = $request->meta_keywords;
        $vOje->meta_description = $request->meta_description;
        $vOje->description = $request->description;
        if ($request->hasFile('image')) {
            $this->deleteFile($vOje->image);
            $vOje->image = $this->customFileUpload('uploads/vehicle-types');
        }
        if ($vOje->save()) {
            return redirect()->route('manage-vehicle-type.index')->with('success', 'Vehicle types successfully created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function destroy($id)
    {

    }
}
