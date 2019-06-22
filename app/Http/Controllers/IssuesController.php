<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
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

    /**
     * @param CreateIssueRequest $issueRequest
     * @return mixed
     */

    public function store(CreateIssueRequest $issueRequest)
    {
        $issue = Issue::create(dataFromRequest(['title','description','user_id','record_id','deadline']));

        if(request()->hasFile('attachment')){

            $issue->image(request()->file('attachment')->store("images/issues/{$issue->id}/","public"));

        }

        return $issue->load(['media']);
    }

    /**
     * @param Issue $issue
     * @param UpdateIssueRequest $issueRequest
     * @return Issue
     */

    public function update(Issue $issue, UpdateIssueRequest $issueRequest)
    {
        $issue->update(request()->only(['title','description','user_id']));

        return $issue->load(['media','user']);
    }
}
