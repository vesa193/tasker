@extends('layouts.app')
@section('title', 'Tasker - Board')

@section('content')
    @if (session('success'))
        <div class="absolute top-0 left-0 right-0 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
            <div onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                <span>Close</span>
            </div>
            {{ session('success') }}
        </div>
    @endif

        <div class="flex h-[750px] gap-[2rem] pb-[1rem] overflow-x-auto shadow-md">
            @if (!isset($columns) || count($columns) === 0)
                <span class="">No columns</span>
                @else
                    @foreach ($columns as $column)
                    <div class="bg-gray-100 rounded-md min-w-[250px] max-w-[250px]">
                        <div class="relative bg-gray-100 flex justify-between rounded-md p-[1rem]">
                            <p class="column-title font-semibold text-ellipsis">{{ $column->title }}</p>
                            <i class="fa fa-ellipsis-h cursor-pointer" aria-hidden="true" onclick="toggleColumnDropdown('columnDropdownMenu', event)"></i>
                            <ul id="columnDropdownMenu" class="absolute hidden select-none bg-white border border-gray-200 rounded-[3px] w-[140px] flex-col gap-2 shadow-md p-3 top-[100%] right-[0px]">
                                <li data-column-id="{{ $column->id }}" class="p-2 hover:bg-slate-200 cursor-pointer text-start" onclick="handleEditColumnModal('editColumnModal', event)">
                                    Edit
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </li>
                                <hr>
                                <li data-column-id="{{ $column->id }}" class="p-2 hover:bg-slate-200 cursor-pointer text-start text-red-600" onclick="handleDeleteColumnModal('deleteColumnModal', event)">
                                    Delete
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="grid gap-[1rem] p-[1rem] overflow-y-auto">
                            @if (!isset($column->tasks) || count($column->tasks) === 0)
                                <p class="mt-4">No tasks</p>
                                @else
                                    @foreach ($column->tasks as $task)
                                        <div class="bg-white rounded-md p-[1rem] mt-5">
                                            <p class="task-title">{{ $task->description }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            <button class="column-delete-button bg-blue-600 text-white rounded-md hover:bg-blue-700 px-4 py-2 w-full mt-5" data-column-id="{{ $column->id }}" data-column-title="{{ $column->title }}" onclick="handleCreateTaskModal('createTaskModal', event)">
                                + Create new ticket
                            </button>
                        </div>
                    </div>
                    @endforeach
                @endif
            <button type="button" data-board-id="{{ $board->id }}" class="min-w-[200px] self-start px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="handleCreateColumnModal('createColumnModal', event)">+ Create column</button>
        </div>

    @include('components.modals.create-column-modal')
    @include('components.modals.edit-column-modal')
    @include('components.modals.delete-column-modal')
    @include('components.modals.create-task-modal')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

