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

    <div class="grid grid-cols-[repeat(auto-fill,minmax(230px,1fr))] h-[750px] gap-[2rem]">
        @foreach ($columns as $column)
            <div class="bg-gray-100 rounded-md p-[1rem]">
                <p>{{ $column->title }}</p>
            </div>
        @endforeach
    </div>
@endsection

