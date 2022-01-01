<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends BackendController
{

    public function index()
    {

        $orders = Order::all();
        $this->data('orders', $orders);
        return view($this->pagePath . 'orders.index', $this->data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $data['status'] = $request->value;
        $id = $request->id;
        $status = Order::where('id', '=', $id)->update($data);
        return response()->json($status, 200);
    }

    public function updatePaymentStatus(Request $request)
    {
        $data['payment_status'] = $request->value;
        $id = $request->id;
        $status = Order::where('id', '=', $id)->update($data);
        return response()->json($status, 200);
    }


}
