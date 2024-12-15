@extends('layouts.app')
@section('title', 'Boards')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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
        <div class="bg-slate-100 p-3 overflow-auto my-5">
            <ul class="grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] gap-2 max-h-[300px] py-[1rem]">
                @foreach ($boards as $board)
                <li class="relative border bg-white border-gray-200 text-center rounded-[3px] h-[4rem]">
                    <a href="{{ route('boards.show', $board->id) }}" class="absolute top-0 left-0 w-full h-full flex justify-center items-center ">{{ $board->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    @endif

    <button onclick="toggleModal('createBoardModal')" class="px-4 py-2 bg-blue-600 text-white rounded-md  hover:bg-blue-700">
        Create Board
    </button>


    <form action="{{ route('auth.logout') }}" method="post">
       @csrf
       <button type="submit">Logout</button>
    </form>

@include('components.modals.create-modal')
<script src="{{ asset('js/script.js') }}"></script>
@endsection
