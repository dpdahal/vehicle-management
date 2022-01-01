<?php

namespace App\Http\Controllers\Backend\Vehicle;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Vehicle\Vehicle;
use App\Models\Vehicle\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends BackendController
{

    public function index()
    {
        $this->data('vehicleData', Vehicle::orderBy('id', 'desc')->get());
        $this->data('vehicleTypeData', VehicleType::all());
        return view($this->pagePath . 'vehicle.index', $this->data);

    }

    public function show()
    {
        $this->data('vehicleData', Vehicle::orderBy('id', 'desc')->get());
        $this->data('vehicleTypeData', VehicleType::all());
        return view($this->pagePath . 'vehicle.index', $this->data);

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'capacity' => 'required',
            'model' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required'
        ]);

        if (Vehicle::create($request->all())) {
            return redirect()->back()->with('success', 'Vehicle  successfully created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function edit($id)
    {
        $this->data('vehicleData', Vehicle::findOrFail($id));
        $this->data('vehicleTypeData', VehicleType::all());
        return view($this->pagePath . 'vehicle.update', $this->data);

    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'capacity' => 'required',
            'model' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required'
        ]);

        if (Vehicle::findOrFail($id)->update($request->all())) {
            return redirect()->route('manage-vehicle.index')->with('success', 'Vehicle  successfully updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function destroy($id)
    {

        if (Vehicle::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'Vehicle was successfully deleted');
        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }
    }
}
