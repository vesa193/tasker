@extends('layouts.app')
@section('title', 'Boards')

@section('content')
    <h1 class="text-3xl font-bold">Boards</h1>
    <a href="{{route('auth.logout')}}" class="text-sm text-gray-600 hover:text-gray-900">Logout</a>
@endsection
