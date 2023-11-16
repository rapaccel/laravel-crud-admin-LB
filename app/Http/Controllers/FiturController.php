<?php

namespace App\Http\Controllers;

use App\Models\fitur;
use App\Models\service;
use Illuminate\Http\Request;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fiturs = fitur::all();
        $title="Admin Fitur";
        return view('admin.fitur', compact('fiturs','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Tambah Fitur";
        $service=service::all();
        return view('admin.fitur.create',compact('service','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|integer',
            'nama_fitur' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string'
        ]);
    
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambars', 'public');
            $validatedData['gambar'] = $gambarPath; 
        }
    
        fitur::create($validatedData);
    
        return redirect()->route('fiturs.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fitur $fitur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fitur $fitur)
    {
        $title="Perbarui Fitur";
        $service = service::all();
        return view('admin.fitur.update', compact('fitur', 'service','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fitur $fitur)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|integer',
            'nama_fitur' => 'required|string',
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string'
        ]);
    
        // Check if a new thumbnail image is being uploaded
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambars', 'public');
            $validatedData['gambar'] = $gambarPath;
        } else {
            // If no new thumbnail is being uploaded, retain the existing thumbnail value
            $validatedData['gambar'] = $fitur->gambar;
        }
    
        $fitur->update($validatedData);
    
        return redirect()->route('fiturs.index')->with('success', 'fitur berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fitur $fitur)
    {
        //
    }
}
