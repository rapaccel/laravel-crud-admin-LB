<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blogCount = blog::count();
        $teamCount = team::count();

        return view('dashboard', [
            'title'=>"Dashboard",
            'blogCount' => $blogCount,
            'teamCount' => $teamCount,
    ]);
    }
}
