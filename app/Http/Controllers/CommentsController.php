<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function Store(StoreCommentRequest $request, $id)
    {
        $validated = $request->validated();
        $post = Team::find($id);
        $post->addComment($validated['body']);                       
        $request = request();
        return redirect()->back();
    }
}
