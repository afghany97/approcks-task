<?php

namespace App\Http\Controllers;

use App\Board;
use App\Events\IssueMoved;
use App\Issue;
use App\Record;

class RecordIssuesController extends Controller
{

    /**
     * RecordIssuesController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Board $board
     * @param Record $record
     * @param Issue $issue
     * @return Issue
     */

    public function update(Board $board, Record $record, Issue $issue)
    {
        $issue->update(['record_id' => $record->id]);

        IssueMoved::dispatch($issue);

        return $issue->load(['user','media','comments']);
    }
}
