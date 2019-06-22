<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Issue;

class CommentsController extends Controller
{
    /**
     * CommentsController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Issue $issue
     * @param CreateCommentRequest $commentRequest
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function store(Issue $issue, CreateCommentRequest $commentRequest)
    {
        $comment = $issue->comments()->create(array_merge(dataFromRequest(['body']),['user_id' => auth()->id()]));

        if(request()->hasFile('attachment')){

            $comment->image(request()->file('attachment')->store("images/comments/{$comment->id}/",'public'));
        }

        return $comment->load(['user','media']);
    }

}
