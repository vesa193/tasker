@extends('layouts.auth')
@section('title', 'Register')

@section('content')

<div class="grid gap-5">
    <div class="grid gap-5 bg-slate-100 overflow-hidden sm:rounded-lg p-7 shadow-md">
        <h1 class="text-3xl font-bold">Register</h1>
        <form method="POST" action="{{  route('auth.register') }}" class="space-y-6 max-w-md gap-4 min-w-[320px]">
            @csrf
            <div>
                <input required type="name" id="name" name="name" placeholder="Name*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <input required type="email" id="email" name="email" placeholder="Email address*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <input required type="text" id="password" name="password" placeholder="Password*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <input required type="text" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation*"
                class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('error')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            <p>
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
