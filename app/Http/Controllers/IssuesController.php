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

        // return response
    }
}
