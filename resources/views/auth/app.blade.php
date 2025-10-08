<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Auth')</title>

  {{-- CDN Tailwind sekali saja --}}
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-br from-amber-50 via-yellow-100 to-amber-200 
             dark:from-gray-900 dark:via-gray-800 dark:to-black 
             flex items-center justify-center min-h-screen">

  {{-- Wrapper Card --}}
  <div class="w-full max-w-md bg-white/95 dark:bg-gray-800/90 backdrop-blur-lg 
              border border-amber-200 dark:border-gray-700 rounded-2xl shadow-xl p-8 mx-4">

    {{-- Header Logo --}}
    <div class="text-center mb-8">
      <img src="/images/logo.png" alt="logo" class="mx-auto w-24 h-auto mb-4 drop-shadow-md">
      <h1 class="text-2xl font-bold text-amber-700 dark:text-amber-400">@yield('heading')</h1>
      <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">@yield('subheading')</p>
    </div>

    {{-- Konten Dinamis --}}
    <div>
      @yield('content')
    </div>

  </div>

</body>
</html>
