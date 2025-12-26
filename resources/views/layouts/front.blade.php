<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Company Name')</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('meta_description', 'Official company website')">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300..700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Flaticon -->
  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>

<body>
  @include('components.header')

  <main>
    @yield('content')
    @include('components.landingPageSection4,5')
  </main>

  @include('components.footer')

  @stack('scripts')
</body>

</html>