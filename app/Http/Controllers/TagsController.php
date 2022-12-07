<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show($id)
    {
        $team = Team::with('news')->find($id);
        return view('team-news.show', compact('team')); 
    }
}
