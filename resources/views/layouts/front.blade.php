<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Company Name')</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('meta_description', 'Official company website')">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>

<body>
  @include('components.header')

  <main>
    @yield('content')
  </main>

  @include('components.footer')

  @stack('scripts')
</body>

</html>