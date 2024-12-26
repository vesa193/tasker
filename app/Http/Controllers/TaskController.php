<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request$request)
    {
        $boardId = $request->route('boardId');
        $board = Board::find($boardId);
        $columns = Column::all()->where('board_id', $boardId);
        $tasks = Task::all();
        return view('boards.show', ['board' => $board, 'columns' => $columns, 'tasks' => $tasks]);
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
            $description = $request->description;
            $columnId = $request->column_id;
            $column = Column::find($columnId);
            $boardId = $column->board_id;

            Log::info('Board ID: ' . $boardId);

            $request->validate([
                'description' => 'required|string|max:255',
                'column_id' => 'required|exists:columns,id',
            ]);

            $task = new Task();
            $task->description = $description;
            $task->column_id = $columnId;
            $task->save();
            $board = Board::find($boardId);
            $columns = Column::all()->where('board_id', $boardId);
            $tasks = Task::all()->where('column_id', $columnId);

            return redirect()->route('boards.show', ['board' => $board, 'columns' => $columns])->with('success', "Task is successfully created in $column->title!");
        } catch (\Throwable $th) {
            Log::error('Greška pri kreiranju stupca: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $task->description = $request->description;
        $task->save();
        return redirect()->back()->with('success', "Task $task->id is successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', "Task $task->id is successfully deleted!");
    }
}
