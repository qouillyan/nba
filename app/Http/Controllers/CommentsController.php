<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('word.filter');
    }
    public function store(StoreCommentRequest $request, $id)
    {
        $validated = $request->validated();
        $team = Team::find($id);
        $team->addComment($validated['body']);                       
        $request = request();
        Mail::to($team->email)->send(new CommentReceived($team));
        return redirect()->back();
    }
}
