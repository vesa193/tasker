@extends('layouts.app')
@section('title', 'Boards')

@section('content')
    <h1 class="text-3xl font-bold">Boards</h1>
    <form action="{{ route('auth.logout') }}" method="post">
       @csrf
       <button type="submit">Logout</button>
    </form>
@endsection
