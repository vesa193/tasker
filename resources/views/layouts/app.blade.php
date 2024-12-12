<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tasker - @yield('title')</title>
  @vite('resources/css/app.css')
</head>
<body>
    <main class="h-screen p-[2rem]">
        @yield('content')
    </main>
    @vite('resources/js/app.js')
</body>
</html>
