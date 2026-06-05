@php
  use App\Support\VeloraCatalog;
  $nav = VeloraCatalog::nav();
  $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="fixed top-0 inset-x-0 z-50" data-nav>
  <div class="bg-ink text-bone border-b border-bone/15 transition-shadow duration-500" data-nav-bar>
    <div class="w-full px-6 lg:px-10 h-[60px] flex items-center justify-between gap-4">

      <!-- Left: Navigation -->
      <div class="flex-1 flex items-center justify-start">
        <nav class="hidden md:flex items-center gap-5">
          @foreach ($nav as $n)
            @php $isActive = $routeName === $n['route']; @endphp
            <a href="{{ route($n['route']) }}"
               class="relative text-[13px] tracking-wide py-2 transition-colors {{ $isActive ? 'text-bone' : 'text-bone/65 hover:text-bone' }}">
              {{ $n['label'] }}
              <span class="absolute -bottom-0.5 left-0 h-[1.5px] bg-velora transition-all duration-500 {{ $isActive ? 'w-full' : 'w-0' }}"></span>
            </a>
          @endforeach
        </nav>
      </div>

      <!-- Center: Logo -->
      <div class="shrink-0 flex justify-center">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 group">
          <div class="w-7 h-7 border border-bone rounded-full grid place-items-center bg-bone text-ink">
            <span class="display text-[18px] leading-none">V</span>
          </div>
          <span class="display text-[22px] tracking-tight">Velora</span>
          <span class="mono text-[10px] tracking-[0.2em] text-bone/40 hidden lg:inline">/&nbsp;EST.&nbsp;2019</span>
        </a>
      </div>

      <!-- Right: Icons -->
      <div class="flex-1 flex items-center gap-2 justify-end">
        <button type="button" data-open-drawer="search" class="hidden lg:grid place-items-center w-9 h-9 rounded-full border border-bone/20 hover:bg-bone hover:text-ink transition-colors" title="Search">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
        </button>
        <a href="{{ route('account') }}" class="hidden lg:grid place-items-center w-9 h-9 rounded-full border border-bone/20 hover:bg-bone hover:text-ink transition-colors" title="Account">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></svg>
        </a>

        <button type="button" data-open-drawer="wishlist" class="relative grid place-items-center w-9 h-9 rounded-full border border-bone/20 hover:bg-bone hover:text-ink transition-colors" title="Wishlist">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="{{ $veloraWishlistCount > 0 ? '#0014FF' : 'none' }}" stroke="{{ $veloraWishlistCount > 0 ? '#0014FF' : 'currentColor' }}" strokeWidth="1.6"><path d="M12 21s-7-4.5-9.5-9C1 9 2.5 5 6.5 5 9 5 10.5 6.5 12 8.5 13.5 6.5 15 5 17.5 5c4 0 5.5 4 4 7-2.5 4.5-9.5 9-9.5 9z"/></svg>
          @if ($veloraWishlistCount > 0)
            <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 grid place-items-center bg-bone text-ink mono text-[10px] rounded-full">{{ $veloraWishlistCount }}</span>
          @endif
        </button>

        <button type="button" data-open-drawer="cart" class="flex items-center gap-2 px-4 h-9 rounded-full bg-bone text-ink hover:bg-velora hover:text-bone transition-colors">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><path d="M5 7h14l-1.5 11a2 2 0 0 1-2 1.7H8.5a2 2 0 0 1-2-1.7L5 7Z"/><path d="M9 7V5a3 3 0 0 1 6 0v2"/></svg>
          <span class="mono text-[11px] tracking-[0.15em]">CART · {{ str_pad((string) $veloraCartCount, 2, '0', STR_PAD_LEFT) }}</span>
        </button>
      </div>

    </div>
  </div>
</header>
