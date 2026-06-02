<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Velora — Vogue Redefined')</title>
  <meta name="description" content="A small Indonesian house making garments at a stubborn pace — fifteen pieces, twice a year." />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  @include('partials.loader')

  <div data-cursor-ring class="v-ring"></div>
  <div data-cursor-dot class="v-cursor"></div>

  @include('partials.nav')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  @include('partials.search')
  @include('partials.cart')
  @include('partials.wishlist')
  @include('partials.toast')
</body>
</html>
