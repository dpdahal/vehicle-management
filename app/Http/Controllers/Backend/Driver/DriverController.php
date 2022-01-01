<?php

namespace App\Http\Controllers\Backend\Driver;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver\Driver;

class DriverController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data('driverData', Driver::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'driver.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $driverId
     * @return \Illuminate\Http\Response
     */
    public function edit($driverId)
    {
        $this->data('driverData',  Driver::where('id', '=', $driverId)->first());
        return view($this->pagePath . 'driver.update', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Will implement validation later  */
        // $this->validate($request, [
        //     'from' => 'required',
        //     'to' => 'required',
        //     'cost' => 'required',
        //     'vehicle_type' => 'required'
        // ]);

        $dRObject = Driver::findOrFail($id);
        $dRObject->full_name = $request->full_name;
        $dRObject->email = $request->email;
        $dRObject->gender = $request->gender;
        $dRObject->phone = $request->phone;
        $dRObject->mobile = $request->mobile;
        $dRObject->citizen_number = $request->citizen_number;
        if ($dRObject->update()) {
           $this->ShowMessage(null, 'Destination Rate Was Successfully Add');
        } else {
            $this->ShowMessage('error', 'There is error while Adding');
        }
    }

    /**
     * Remove the specified resource from storage. 
     * 
     * @param  int  $driverId
     * @return \Illuminate\Http\Response
     */
    public function destroy($driverId)
    {
        $driverData = Driver::where('id', '=', $driverId)->first()->delete();
        if($driverData) {
            $this->ShowMessage(null, 'Data was deleted');
        } else {
            $this->showMessage('error', 'there was a problems');
        }
    }
}
