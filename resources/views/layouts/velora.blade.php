<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Velora — Vogue Redefined')</title>
  <meta name="description" content="A small Indonesian house making garments at a stubborn pace — fifteen pieces, twice a year." />

  {{-- Favicon --}}
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' fill='%231a1a1a'/><text x='50' y='72' font-family='Georgia,serif' font-size='60' font-style='italic' text-anchor='middle' fill='%23f5f0e8'>V</text></svg>" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">

  @if(config('services.google_analytics.id'))
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('services.google_analytics.id') }}');
    </script>
  @endif

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
