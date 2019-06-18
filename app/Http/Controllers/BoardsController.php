<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoardRequest;
use Illuminate\Database\QueryException;

class BoardsController extends Controller
{

    /**
     * BoardsController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        // return view
    }

    public function store(CreateBoardRequest $boardRequest)
    {
        try {

            $board = auth()->user()->boards()->create(dataFromRequest(['name']));

            foreach (config('record.default') as $name)

                $board->records()->create(compact('name'));

        } catch (QueryException $exception) {

            // handle exception
        }


        // return response
    }
}
