<?php

namespace App\Http\Controllers\Backend\Destination;

use App\Http\Controllers\Backend\BackendController;
use App\Models\City\City;
use App\Models\DestinationRate\DestinationRate;
use App\Models\Vehicle\VehicleType;
use Illuminate\Http\Request;

class DestinationRateController extends BackendController
{

    public function index()
    {
        $this->data('destinationRateData', DestinationRate::orderBy('id', 'desc')->get());
        $this->data('vehicleTypeData', VehicleType::all());
        $this->data('cityData', City::all());
        return view($this->pagePath . 'destination-rate.index', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'cost' => 'required',
            'vehicle_type' => 'required'
        ]);
        $dRObject = new DestinationRate();
        $dRObject->from = $request->from;
        $dRObject->to = $request->to;
        $dRObject->cost = $request->cost;
        $dRObject->vehicle_type = $request->vehicle_type;
        if ($dRObject->save()) {
            return redirect()->back()->with('success', 'Destination Rate Was Successfully Add');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {

        $this->data('destinationRateData', DestinationRate::orderBy('id', 'desc')->get());
        $this->data('vehicleTypeData', VehicleType::all());
        return view($this->pagePath . 'destination-rate.index', $this->data);
    }


    public function edit($id)
    {

        $this->data('destinationRateData', DestinationRate::findOrFail($id));
        $this->data('vehicleTypeData', VehicleType::all());
        return view($this->pagePath . 'destination-rate.update', $this->data);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'cost' => 'required',
            'vehicle_type' => 'required'
        ]);
        $dRObject = DestinationRate::findOrFail($id);
        $dRObject->from = $request->from;
        $dRObject->to = $request->to;
        $dRObject->cost = $request->cost;

        if ($dRObject->update()) {
            if (!empty($request->vehicle_type)) {
                $dRObject->destinationRateTypes()->sync($request->vehicle_type);
            }
            return redirect()->route('destination-rate.index')->with('success', 'Destination Rate Was Successfully Updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }

    public function deleteDestinationRateTypes($destinationId)
    {
        $totalDestinationRateData = DestinationRateType::where('destination_id', '=', $destinationId)->get();
        foreach ($totalDestinationRateData as $destination) {
            DestinationRateType::where('destination_id', '=', $destinationId)->delete();
        }

    }


    public function destroy($id)
    {
        $this->deleteDestinationRateTypes($id);

        if (DestinationRate::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'Data was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }
}
