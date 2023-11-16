<?php

namespace App\Http\Controllers;

use App\Models\unggul;
use App\Models\service;
use Illuminate\Http\Request;

class UnggulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Admin Keunggulan";
        $services=service::all();
        $ungguls = unggul::all();
        return view('admin.unggul', compact('ungguls','services','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Tambah Keunggulan";
        $services= service::all();
        return view('admin.unggul',compact('services','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|integer',
            'nama_unggul' => 'required',
            'deskripsi' => 'required'
        ]);
    
        
    
        unggul::create($validatedData);
    
        return redirect()->route('ungguls.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(unggul $unggul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(unggul $unggul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_unggul' => 'required',
            'deskripsi' => 'required',
            'service_id' => 'required',
        ]);

        $unggul = unggul::findOrFail($id);
        $unggul->update($validatedData);

        return redirect()->route('ungguls.index')->with('success', 'unggul updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(unggul $unggul)
    {
        $unggul = unggul::findOrFail($id);
        $unggul->delete();

        return redirect()->route('ungguls.index')->with('success', 'unggul deleted successfully.');
    }
}
