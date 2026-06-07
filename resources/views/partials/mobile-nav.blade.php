@php
  use App\Support\VeloraCatalog;
  $nav = VeloraCatalog::nav();
  $routeName = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<div class="fixed inset-0 z-[60] hidden lg:hidden" data-drawer="mobile-nav">
  <div class="absolute inset-0 bg-ink/40 overlay-in" data-drawer-overlay></div>
  <aside class="absolute left-0 top-0 bottom-0 w-[85%] max-w-[320px] bg-ink text-bone drawer-in-left flex flex-col border-r border-bone/15">
    <div class="px-6 py-5 flex items-center justify-between border-b border-bone/15">
      <div class="flex items-center gap-2.5">
        <div class="w-7 h-7 border border-bone rounded-full grid place-items-center bg-bone text-ink">
          <span class="display text-[18px] leading-none">V</span>
        </div>
        <span class="display text-[22px] tracking-tight">Velora</span>
      </div>
      <button type="button" class="ml-4 w-6 h-6 grid place-items-center border border-bone/20 rounded-full hover:bg-bone hover:text-ink transition-colors" data-close-drawer>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </div>

    <div class="flex-1 overflow-y-auto px-6 py-8 flex flex-col">
      <nav class="flex flex-col gap-6">
        @foreach ($nav as $n)
          @php $isActive = $routeName === $n['route']; @endphp
          <a href="{{ route($n['route']) }}" class="display text-[32px] leading-none {{ $isActive ? 'text-bone' : 'text-bone/50' }} transition-colors hover:text-bone">
            {{ $n['label'] }}
          </a>
        @endforeach
      </nav>

      <div class="mt-auto pt-10 flex flex-col gap-4">
        <a href="{{ route('account') }}" class="flex items-center gap-4 text-[13px] tracking-wide text-bone/70 hover:text-bone transition-colors">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></svg>
          Account
        </a>
        <button type="button" data-open-drawer="search" data-close-drawer class="flex items-center gap-4 text-[13px] tracking-wide text-bone/70 text-left hover:text-bone transition-colors">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
          Search
        </button>
      </div>
    </div>
  </aside>
</div>
