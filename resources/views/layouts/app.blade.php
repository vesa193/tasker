<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tasker - @yield('title')</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <nav class="flex items-center justify-between p-[1rem] border-b-2 border-gray-50">
        <a class="{{ Route::currentRouteName() === 'boards.index' ? 'pointer-events-none' : '' }}" href="{{ route('boards.index') }}">
            @if (Route::currentRouteName() === 'boards.index')
                <h1 class="text-3xl font-bold text-blue-600">Tasker</h1>

            @else
                <p class="text-2xl">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    Boards
                </p>
            @endif
        </a>
        <div class="username">
            <p class="font-bold hover:text-blue-600 cursor-pointer text-end">{{ auth()->user()->name }}</p>
            <ul class="username-actions absolute bg-white border border-gray-200 rounded-[3px] w-full bottom-[-120px] left-0 flex flex-col gap-2 shadow-md z-10">
                <li class="p-2 hover:bg-slate-200 cursor-pointer" onclick="handleDeleteModal('deleteBoardModal', event)">
                    Profile
                    <i class="fa fa-user" aria-hidden="true"></i>
                </li>
                <hr class="border-gray-200 p-0">
                <li class="p-2 hover:bg-slate-200 cursor-pointer" onclick="handleLogout(event)">
                    <form class="hidden" action="{{ route('auth.logout') }}" method="post">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                    Logout
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </nav>
    <main class="h-screen p-[2rem]">
        @yield('content')
    </main>
    @vite('resources/js/app.js')
</body>
</html>
