@extends('layouts.app')
@section('title', 'Boards')

@section('content')
    @if (session('success'))
        <div class="absolute top-0 left-0 right-0 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
            <div onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
               <span>Close</span>
            </div>
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold">Boards</h1>

    @if (!isset($boards) || count($boards) === 0)
        <p>No boards yet</p>
    @else
        <div class="grid bg-slate-100 p-3 my-5">
            <button onclick="toggleModal('createBoardModal')" class="justify-self-end px-4 py-2 bg-blue-600 text-white rounded-md  hover:bg-blue-700">
                + Create Board
            </button>
            <ul class="boards-list grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] gap-2 max-h-[300px] py-[1rem]">
                @foreach ($boards as $board)
                <li class="board-item relative border bg-white border-gray-200 text-center rounded-[3px] h-[4rem]">
                    <a href="{{ route('boards.show', $board->id) }}" class="board-item w-full h-full flex justify-center items-center ">{{ $board->name }}</a>

                    <ul class="board-actions absolute bg-white border border-gray-200 rounded-[3px] w-full bottom-[-170px] left-0 flex flex-col gap-2 shadow-md p-3">
                        <li data-id="{{ $board->id }}" data-name="{{ $board->name }}" class="p-2 hover:bg-slate-200 cursor-pointer text-start" onclick="this.children[0].click()">
                            <a hidden href="{{ route('boards.show', $board->id) }}"></a>
                            View Board
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </li>
                        <li data-id="{{ $board->id }}" data-name="{{ $board->name }}" class="p-2 hover:bg-slate-200 cursor-pointer text-start" onclick="handleEditModal('editBoardModal', event)">
                            Edit
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </li>
                        <hr class="border-gray-200 p-0">
                        <li data-id="{{ $board->id }}" data-name="{{ $board->name }}" class="p-2 hover:bg-slate-200 text-red-600 cursor-pointer text-start" onclick="handleDeleteModal('deleteBoardModal', event)">
                            Delete
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    @endif

@include('components.modals.create-board-modal')
@include('components.modals.edit-board-modal')
@include('components.modals.delete-board-modal')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
