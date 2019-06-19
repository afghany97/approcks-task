<?php

namespace App\Http\Controllers;

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

    public function store(Issue $issue)
    {
        $commnet = $issue->comments()->create(array_merge(dataFromRequest(['body']),['user_id' => auth()->id()]));

        if(request()->hasFile('attachment')){

            // store the file
        }

        return;
    }

}
