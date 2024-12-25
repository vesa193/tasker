<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        $boardId = $request->route('boardId');
        $columns = Column::all()->where('board_id', $boardId);
        $board = Board::find($boardId);
        $tasks = Task::all();
        return view('boards.show', ['columns' => $columns, 'board' => $board])->with('success', 'Columns from board are successfully fetched!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $title = $request->title;
            $boardId = $request->board_id;
            $board = Board::find($boardId);

            $request->validate([
                'title' => 'required|string|max:255',
                'board_id' => 'required|exists:boards,id',
            ]);

            $column = new Column();
            $column->title = $title;
            $column->board_id = $boardId;
            $column->save();
            $columns = Column::all()->where('board_id', $boardId);

            return redirect()->route('boards.show', ['board' => $board, 'columns' => $columns])->with('success', 'Column is successfully created!');
        } catch (\Throwable $th) {
            Log::error('Greška pri kreiranju stupca: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function show(Column $column)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function edit(Column $column)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Column $column)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $column->title = $request->title;
        $column->save();
        return redirect()->back()->with('success', 'Column is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(Column $column)
    {
        $column->delete();
        return redirect()->back()->with('success', 'Column is successfully deleted!');
    }
}
