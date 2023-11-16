<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $title="Admin Layanan";
        $services = service::all();
        return view('admin.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = service::all();
        return view('admin.service',compact('services'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_service' => 'required'
            
        ]);
    
        
    
        service::create($validatedData);
    
        return redirect()->route('services.index')->with('success', 'service berhasil ditambahkan.');
    }
    // public function edit($id)
    // {
    //     $service = service::findOrFail($id);
    //     return view('admin.service.update', compact('service'));
    // }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_service' => 'required'
        ]);

        $service = service::findOrFail($id);
        $service->update($validatedData);

        return redirect()->route('services.index')->with('success', 'service berhasil diperbarui');
    }

    public function destroy(service $service)
    {
      
        $service->delete();

        return redirect()->route('services.index')->with('success', 'service deleted successfully.');
    }
}
