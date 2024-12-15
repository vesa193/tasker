<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::all();
        Log::info('Boards from INDEX: ' . $boards);
        return view('boards.index', ['boards' => $boards])->with('success', 'Board is successfully fetched!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $board = new Board();
            $board->name = $request->name;
            $board->user_id = Auth::user()->id;
            $board->save();

            return redirect()->back()->with('success', 'Board is successfully created!');
        } catch (\Throwable $th) {
            Log::error('Greška pri kreiranju tablice: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Board is not successfully created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        $board = Board::find($board->id);
        Log::info('Boards from SHOW: ' . $board);
        return view('boards.show', ['board' => $board])->with('success', 'Board is successfully fetched!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($board->name !== $request->name) {
            $board->name = $request->name;
            $board->save();

            return redirect()->back()->with('success', 'Board is successfully updated!');
        }

        return back()->withErrors([
            'name' => 'Name is empty or equal to previous name',
        ])->onlyInput('name');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        Log::info('Boards from DESTROY: ' . $board);
        $board->delete();
        return redirect()->route('boards.index')->with('success', 'Board is successfully deleted!');
    }
}
