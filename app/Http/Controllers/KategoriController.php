<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title="Admin Kategori";
        $kategoris = kategori::all();
        return view('admin.kategori', compact('kategoris','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = kategori::all();
        return view('admin.kategori.create',compact('kategoris'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaKategori' => 'required'
            
        ]);
    
        
    
        kategori::create($validatedData);
    
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $title="Perbarui Kategori";
        $kategori = kategori::findOrFail($id);
        return view('admin.kategori.update', compact('kategori','title'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaKategori' => 'required'
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update($validatedData);

        return redirect()->route('kategoris.index')->with('success', 'kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategoris.index')->with('success', 'kategori deleted successfully.');
    }
}
