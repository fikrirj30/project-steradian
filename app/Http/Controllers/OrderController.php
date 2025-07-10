<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getOrder = Order::all();

        return response()->json(['order' => $getOrder]);
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
        $rules = [
            'car_id' => 'required|integer',
            'order_date' => 'required|date',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->first(null)
            ], 400);
        }
        $storeOrder = Order::create([
            'car_id' => $request->car_id,
            'order_date' => $request->order_date,
            'pickup_date' => $request->pickup_date,
            'dropoff_date' => $request->dropoff_date,
            'pickup_location' => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location
        ]);

        return response()->json(['messages' => 'Data berhasil ditambahkan'],200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $rules = [
            'car_id' => 'required|integer',
            'order_date' => 'required|date',
            'pickup_date' => 'required|date',
            'dropoff_date' => 'required|date',
            'pickup_location' => 'required|string',
            'dropoff_location' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->first(null)
            ], 400);
        }

        $updateOrder = Order::findOrFail($id);
        $updateOrder->car_id = $request->car_id;
        $updateOrder->order_date = $request->order_date;
        $updateOrder->pickup_date = $request->pickup_date;
        $updateOrder->dropoff_date = $request->dropoff_date;
        $updateOrder->pickup_location = $request->pickup_location;
        $updateOrder->dropoff_location= $request->dropoff_location;
        $updateOrder->save();

        return response()->json(['messages' => 'Data berhasil diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteOrder = Order::findOrFail($id);
        $deleteOrder->delete();

        return response()->json(['messages' => 'Data berhasil dihapus'], 200);

    }
}
