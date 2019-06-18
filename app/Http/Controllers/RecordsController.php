<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecordRequest;
use App\Record;

class RecordsController extends Controller
{
    /**
     * RecordsController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CreateRecordRequest $recordRequest)
    {
        $record = Record::create(dataFromRequest(['board_id','name']));

        // return response
    }
}
