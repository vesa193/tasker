@extends('layouts.auth')
@section('title', 'Register')

@section('content')

<div class="grid gap-5">
    <form method="POST" action="{{  route('auth.register') }}" class="space-y-6 max-w-md gap-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="name" id="name" name="name" placeholder="Name"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Email address"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="text" id="password" name="password" placeholder="Password"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
            <input type="text" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation"
            class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
    </form>

    <a href="" class="text-sm text-gray-600 hover:text-gray-900">Do you have an account? Login</a>
</div>
@endsection
