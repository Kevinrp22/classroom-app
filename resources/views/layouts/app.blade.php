@props(["subNav"=> $subNav ?? false])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/f0db6a54ab.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')
{{$subNav}}
<!-- Page Content -->
  <main>
    <div class="py-12">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </div>
  </main>
</div>
</body>
</html>
