<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('verify.email');
    }

    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    public function show($id)
    {
        $team = Team::with('players', 'comments', 'comments.user')->find($id);
        return view('teams.show', compact('team'));
    }
}
