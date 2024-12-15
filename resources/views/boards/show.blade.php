@extends('layouts.app')
@section('title', 'Tasker - Board')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <div onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                <span>Close</span>
            </div>
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold">{{ $board->name }}</h1>

    <p class="mt-4">Created at:  {{ date('d', strtotime($board->created_at)) }}/{{ date('m', strtotime($board->created_at)) }}/{{ date('Y', strtotime($board->created_at)) }}</p>
    <p>Updated at: {{ date('d', strtotime($board->updated_at)) }}/{{ date('m', strtotime($board->updated_at)) }}/{{ date('Y', strtotime($board->updated_at)) }}</p>

    <form method="POST" action="{{ route('boards.update', $board->id) }}" class="space-y-6 gap-4 min-w-[320px]">
        @csrf
        @method('PUT')
        <div>
            <input required type="text" id="name" name="name" placeholder="Update Name of Project" value="{{ $board->name }}"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md  hover:bg-blue-700">
            Update Task
        </button>
        <a href="{{ route('boards.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md  hover:bg-gray-700">Go back</a>
    </form>

@endsection

