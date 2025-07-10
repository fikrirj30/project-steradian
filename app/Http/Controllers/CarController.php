<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCar = Car::all();

        return response()->json(['cars' => $getCar]);
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
            'car_name' => 'required|string',
            'day_rate' => 'required|numeric',
            'month_rate' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:5120',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->first(null)
            ], 400);
        }

        // Simpan file
        $path = $request->file('image')->store('gambar');

        $store = Car::create([
            'car_name' => $request->car_name,
            'day_rate' => $request->day_rate,
            'month_rate' => $request->month_rate,
            'image' => $path
        ]);

        return response()->json(['messages' => 'Data berhasil ditambahkan'], 200);
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
            'car_name' => 'required|string',
            'day_rate' => 'required|numeric',
            'month_rate' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:5120',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            return response()->json([
                'error' => $validator->errors()->first(null)
            ], 400);
        }

         // Simpan file
        $path = $request->file('image')->store('gambar');

        $updateCar = Car::findOrFail($id);
        $updateCar->car_name = $request->car_name;
        $updateCar->day_rate = $request->day_rate;
        $updateCar->month_rate = $request->month_rate;
        $updateCar->image = $path;
        $updateCar->save();

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
        $deleteCar = Car::findOrFail($id);
        $deleteCar->delete();

        return response()->json(['messages' => 'Data berhasil dihapus'], 200);
    }
}
