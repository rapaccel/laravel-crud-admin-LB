<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Admin Portofolio";
        $portofolios = portofolio::all();
        return view('admin.portofolio', compact('portofolios','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Tambah Portofolio";
        return view('admin.portofolio.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'fitur' => 'required',
        'deskripsi' => 'required',
        'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image uploads if provided
    $imagePaths = [];
    for ($i = 1; $i <= 4; $i++) {
        if ($request->hasFile("gambar{$i}")) {
            $imagePath = $request->file("gambar{$i}")->store('portofolios', 'public');
            $imagePaths["gambar{$i}"] = $imagePath;
        }
    }

    $portofolio = portofolio::create(array_merge($validatedData, $imagePaths));

    return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title="Perbarui Portofolio";
        $portofolio = portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('portofolio','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'judul' => 'required',
        'fitur' => 'required',
        'deskripsi' => 'required',
        'gambar1' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        'gambar2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'gambar4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image uploads if provided
    $imagePaths = [];
    for ($i = 1; $i <= 4; $i++) {
        if ($request->hasFile("gambar{$i}")) {
            $imagePath = $request->file("gambar{$i}")->store('portofolios', 'public');
            $imagePaths["gambar{$i}"] = $imagePath;
        }
    }

    $portofolio = portofolio::findOrFail($id);
    $portofolio->update(array_merge($validatedData, $imagePaths));

    return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $portofolio = portofolio::findOrFail($id);
    
    // Delete associated images if they exist
    $imageFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4'];
    foreach ($imageFields as $field) {
        if ($portofolio->{$field}) {
            Storage::delete('public/' . $portofolio->{$field});
        }
    }

    $portofolio->delete();

    return redirect()->route('portofolios.index')->with('success', 'Portofolio berhasil dihapus.');
}
}
