<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('verify.email');
    }

    public function index()
    {
        $news = News::with('user')->latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $newssg = News::with('user')->find($id);
        return view('news.show', compact('newssg'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }

    public function store(StoreNewsRequest $request)
    {
        $request->validated();
        $post = News::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(),
        ]);
        $post->teams()->attach(request('teams'));
        $request = request();
        session()->flash('message', 'Thank you for publishing article on www.nba.com');
        return redirect('/news');
    }
}
