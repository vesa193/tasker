@extends('layouts.auth')
@section('title', 'Login')

@section('content')

<div class="grid gap-5 justify-center">
    @if (session()->has('email'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session()->get('email') }}</span>
        </div>

    @endif

    <div class="grid gap-5 bg-slate-100 overflow-hidden sm:rounded-lg p-7 shadow-md">
        <h1 class="text-3xl font-bold">Login</h1>
        @if (session('email'))
            <div>{{ session('email') }}</div>
        @endif
        <form method="POST" action="" class="space-y-6 gap-4 min-w-[320px]">
            @csrf
            <div>
                <input required type="email" id="email" name="email" placeholder="Email address*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <input required type="text" id="password" name="password" placeholder="Password*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
            <p class="text-center">
                <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900 ">Do you have an account? Register</a>

            </p>
        </form>

    </div>
</div>
@endsection
