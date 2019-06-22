<?php

namespace App\Http\Controllers;

use App\Board;
use App\Http\Requests\CreateBoardRequest;
use App\User;
use Illuminate\Database\QueryException;

class BoardsController extends Controller
{

    /**
     * BoardsController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth')->except('create');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('boards.create');
    }

    /**
     * @param CreateBoardRequest $boardRequest
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(CreateBoardRequest $boardRequest)
    {
        try {

            $board = auth()->user()->boards()->create(dataFromRequest(['name']));

            foreach (config('record.default') as $name)

                $board->records()->create(compact('name'));

        } catch (QueryException $exception) {

            return back();
        }


        return redirect()->route('boards.show',$board);
    }

    /**
     * @param Board $board
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Board $board)
    {
        $board = $board->load('records');

        $users = User::all();

        return view('boards.show',compact('board','users'));
    }
}
