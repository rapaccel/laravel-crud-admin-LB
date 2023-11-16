<?php

namespace App\Http\Controllers;

use App\Models\price;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiPriceController;

class ApiPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    public function index()
{
    $services = Service::all();
    $prices = Price::all();

    return response()->json([
        'services' => $services,
        'prices' => $prices,
        'title' => 'Admin Harga'
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'service_id' => 'required|integer',
        'price' => 'required|integer',
        'diskon' => 'required|integer'
    ]);

    $price = price::create($validatedData);

    return response()->json(['message' => 'Price berhasil ditambahkan.', 'price' => $price], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'diskon' => 'required',
            'service_id' => 'required',
        ]);
    
        $price = price::findOrFail($id);
        $price->update($validatedData);
    
        return response()->json(['message' => 'Price berhasil diperbarui.', 'price' => $price], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $price = price::findOrFail($id);
        $price->delete();
    
        return response()->json(['message' => 'Price berhasil dihapus.'], 204);
    }
    
}
