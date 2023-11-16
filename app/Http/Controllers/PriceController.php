<?php

namespace App\Http\Controllers;

use App\Models\price;
use App\Models\service;
use Illuminate\Http\Request;

class PriceController extends Controller
{
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
     * Show the form for creating a new resource.
     */
  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|integer',
            'price' => 'required|integer',
            'diskon' => 'required|integer'
        ]);
    
        
    
        price::create($validatedData);
    
        return redirect()->route('prices.index')->with('success', 'Price berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'price' => 'required',
            'diskon' => 'required',
            'service_id' => 'required',
        ]);

        $price = price::findOrFail($id);
        $price->update($validatedData);

        return redirect()->route('prices.index')->with('success', 'Price berhasil di-perbarui.');
    }

    public function destroy($id)
    {
        $price = price::findOrFail($id);
        $price->delete();

        return redirect()->route('prices.index')->with('success', 'Price deleted successfully.');
    }
}
