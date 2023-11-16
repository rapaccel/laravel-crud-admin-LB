<?php

namespace App\Http\Controllers;

use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(team $team)
    {
        $title="Admin Team";
        $teams = team::all();
        return view('admin.team', compact('teams','title'));
    }

    public function edit(team $team)
    {

        $title="Perbarui Team";
        return view('admin.team.update', compact('team','title'));
    }

  
    public function create()
    {
        $title="Tambah Title";
        return view('admin.team.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $validatedData = $request->validate([
            
            'nama' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan' => 'required|string',
            'ig' => 'required|string',
            'linkedin' => 'required|string',
        ]);
    
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $validatedData['foto'] = $fotoPath; 
        }
    
        team::create($validatedData);
    
        return redirect()->route('teams.index')->with('success', 'team berhasil ditambahkan.');
    }
   

    public function update(Request $request, team $team)
{
    $validatedData = $request->validate([
            'nama' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'jabatan' => 'required|string',
            'ig' => 'required|string',
            'linkedin' => 'required|string',
    ]);

    // Check if a new thumbnail image is being uploaded
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('fotos', 'public');
        $validatedData['foto'] = $fotoPath;
    } else {
        // If no new foto is being uploaded, retain the existing foto value
        $validatedData['foto'] = $team->foto;
    }

    $team->update($validatedData);

    return redirect()->route('teams.index')->with('success', 'team berhasil diperbarui.');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'team berhasil dihapus.');
    }
}

  

