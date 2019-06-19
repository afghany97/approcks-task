<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests\CreateIssueRequest;
use App\Issue;

class IssuesController extends Controller
{
    /**
     * IssuesController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Board $board,CreateIssueRequest $issueRequest)
    {
        $issue = Issue::create(dataFromRequest(['title','description','user_id','record_id']));

        // store image if found

        if(request()->hasFile('attachment')){

            // determine attachment type

            // if image

                $issue->image(request()->file('attachment')->storeAs("images/issues/{$issue->id}/","public"));

            // if video

                $issue->video(request()->file('attachment')->storeAs("videos/issues/{$issue->id}/","public"));
        }


        // return response
    }
}
