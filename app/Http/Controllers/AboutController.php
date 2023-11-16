<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Path\to\DomDocument;
use Intervention\Image\ImageManagerStatic as Image;

class AboutController extends Controller
{
    // public function show(about $about){
    //     $abouts=about::all();
    //     return view("admin.about",compact('abouts'));
    // }
    public function edit(About $about)
{
    $title="Perbarui Tentang";
    return view('admin.about', compact('about','title'));
}

public function update(Request $request, About $about)
{
    
   $storage="storage/tentang";
   $dom=new \DomDocument();
   libxml_use_internal_errors(true);
   $dom->loadHTML($request->tentang,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
    libxml_clear_errors();
    $images=$dom->getElementsByTagName('img');
    foreach ($images as $img ) {
        $src=$img->getAttribute('src');
        if (preg_match("/data:image/",$src)) {
            preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
            $mimetype=$groups['mime'];
            $fileNameTentang=uniqid();
            $fileNameTentangRand=substr(md5($fileNameTentang),6,6).'_'.time();
            $filepath=("$storage/$fileNameTentangRand.$mimetype");
            $image=Image::make($src)
                ->resize(1200,1200)
                ->encode($mimetype,100)
                ->save(public_path($filepath));
            $new_src=asset($filepath);
            $img->removeAttribute('src');
            $img->setAttribute('src',$new_src);
            $img->SetAttribute('class','img-responsive');
        }
    }
    $about->nohp = $request->input('nohp');
    $about->email = $request->input('email');
    $about->alamat = $request->input('alamat');
    $about->tentang= $dom->saveHTML();
    $about->ig = $request->input('ig');


    $about->save();

    return redirect()->route('abouts.edit', $about)->with('success', 'About has been updated.');
}
public function uploadImage(Request $request)
{
    $path = $request->file('file')->store('images', 'public');
    $url = Storage::url($path);

    return response()->json(['url' => $url]);
}
}
