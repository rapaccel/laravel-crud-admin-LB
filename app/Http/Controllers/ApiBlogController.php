<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class ApiBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = blog::all();
    
        return new PostResource(true,"success",$blogs);
    }
    public function search($judul)
{
    $blogs = Blog::where('judul', 'like', '%' . $judul . '%')->get();
    if ($blogs->isEmpty()) {
        return new PostResource(false, 'No data found', []);
    }
    return new PostResource(true, 'success', $blogs);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'kategori_id' => 'required|integer',
        'judul' => 'required|string',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'isi' => 'required|string',
        'tag' => 'required|string',
    ]);

    $validatedData = $validator->validated();

    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $thumbnailPath = $thumbnail->store('thumbnails', 'public');
        $validatedData['thumbnail'] = $thumbnailPath;
    }

    $blog = Blog::create($validatedData);

    return response()->json(['message' => 'Blog berhasil ditambahkan.', 'data' => $blog], 201);

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $blog = blog::find($id); // Mengambil data blog berdasarkan ID

    if (!$blog) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    // Buat URL gambar lengkap
   

    return new PostResource(true,"success",$blog);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
