<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
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
}
