<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\blog;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(blog $blog)
    {
        $blogs = blog::all();
        $title="Admin Blog";
        return view('admin.blog', compact('blogs','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Tambah Blog";
        $kategori=kategori::all();
        return view('admin.blog.create',compact('kategori','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $validatedData = $request->validate([
            'kategori_id' => 'required|integer',
            'judul' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi' => 'required|string',
            'tag' => 'required|string',
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $thumbnailPath; 
        }
    
        Blog::create($validatedData);
    
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil ditambahkan.');
    }
   
    
    
    
    
    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $title="Perbarui Blog";
        $kategori = Kategori::all();
        return view('admin.blog.update', compact('blog', 'kategori','title'));
    }

  

    public function update(Request $request, Blog $blog)
{
    $validatedData = $request->validate([
        'kategori_id' => 'required|integer',
        'judul' => 'required|string',
        'thumbnail' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        'isi' => 'required|string',
        'tag' => 'required|string',
    ]);

    // Check if a new thumbnail image is being uploaded
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $validatedData['thumbnail'] = $thumbnailPath;
    } else {
        // If no new thumbnail is being uploaded, retain the existing thumbnail value
        $validatedData['thumbnail'] = $blog->thumbnail;
    }

    $blog->update($validatedData);

    return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui.');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
