@php
  use App\Support\VeloraCatalog;
  $sorts = [
    ['id' => 'featured', 'label' => 'Featured'],
    ['id' => 'newest', 'label' => 'Newest'],
    ['id' => 'price-asc', 'label' => 'Price ↑'],
    ['id' => 'price-desc', 'label' => 'Price ↓'],
    ['id' => 'name', 'label' => 'A — Z'],
  ];
  $currentSort = collect($sorts)->firstWhere('id', $sort) ?? $sorts[0];
@endphp

@extends('layouts.velora')

@section('title', 'Shop — Velora')

@section('content')
<div class="page-enter pt-28 pb-20" data-reveal-scope>
  <section class="px-6 lg:px-10">
    <div class="flex items-end justify-between">
      <div>
        <div class="secnum reveal">/ THE INDEX</div>
        @if (!empty($q))
          <div class="mt-2 mono text-[12px] tracking-[0.1em] text-ink/70 reveal">
            SEARCH RESULTS FOR: <span class="text-velora">"{{ $q }}"</span>
          </div>
          <a href="{{ route('shop') }}" class="inline-block mt-2 text-[10px] mono tracking-widest hover:text-velora border-b border-ink/20 pb-0.5 transition-colors">CLEAR SEARCH</a>
        @else
          <h1 class="display text-[12vw] md:text-[9vw] leading-[0.92] mt-3 reveal-up-clip">
            <span>Every</span> <span class="italic">piece.</span>
          </h1>
        @endif
      </div>
      <div class="hidden md:block text-right reveal">
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ SHOWING</div>
        <div class="display text-[36px] leading-none mt-1">
          <span class="text-velora">{{ str_pad((string) count($filtered), 2, '0', STR_PAD_LEFT) }}</span>
          <span class="text-ink/30 mx-2">/</span>
          <span>{{ str_pad((string) count($all), 2, '0', STR_PAD_LEFT) }}</span>
        </div>
      </div>
    </div>

    <div class="mt-12 sticky top-[100px] z-30 bg-bone/85 backdrop-blur-xl -mx-6 lg:-mx-10 px-6 lg:px-10 py-4 border-y border-ink/10">
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center gap-2 flex-wrap">
          <span class="mono text-[10px] tracking-[0.25em] text-ink/50 mr-2 hidden sm:inline">/ COLLECTION</span>
          @foreach ($collections as $c)
            <a href="{{ request()->fullUrlWithQuery(['collection' => $c]) }}" class="chip {{ $collection === $c ? 'on' : '' }}">{{ $c }}</a>
          @endforeach
        </div>

        <div class="flex items-center gap-4">
          <div class="hidden md:flex items-center gap-2">
            <span class="mono text-[10px] tracking-[0.25em] text-ink/50">/ SIZE</span>
            @foreach ($sizes as $s)
              <a href="{{ request()->fullUrlWithQuery(['size' => $s]) }}"
                class="w-9 h-9 grid place-items-center text-[11px] mono tracking-wide border transition-all {{ $size === $s ? 'bg-ink text-bone border-ink' : 'border-ink/15 hover:border-ink' }}">
                {{ $s }}
              </a>
            @endforeach
          </div>

          <details class="relative" data-sort>
            <summary class="list-none cursor-pointer flex items-center gap-2 px-4 py-2 border border-ink/15 hover:border-ink transition-colors">
              <span class="mono text-[10px] tracking-[0.25em] text-ink/50">/ SORT</span>
              <span class="text-[13px]">{{ $currentSort['label'] }}</span>
              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="m6 9 6 6 6-6"/></svg>
            </summary>
            <div class="absolute right-0 top-full mt-1 w-44 bg-bone border border-ink/15 shadow-xl z-40 page-enter">
              @foreach ($sorts as $s)
                <a href="{{ request()->fullUrlWithQuery(['sort' => $s['id']]) }}"
                   class="block w-full text-left px-4 py-2.5 text-[13px] hover:bg-ink hover:text-bone transition-colors {{ $sort === $s['id'] ? 'bg-ink/5' : '' }}">
                  {{ $s['label'] }}
                </a>
              @endforeach
            </div>
          </details>

          <div class="hidden lg:flex items-center border border-ink/15">
            <a href="{{ request()->fullUrlWithQuery(['view' => 'grid']) }}" class="w-9 h-9 grid place-items-center {{ $viewMode === 'grid' ? 'bg-ink text-bone' : '' }}">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['view' => 'list']) }}" class="w-9 h-9 grid place-items-center {{ $viewMode === 'list' ? 'bg-ink text-bone' : '' }}">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="px-6 lg:px-10 mt-10">
    @if (count($filtered) === 0)
      <div class="py-32 text-center">
        <div class="display text-[8vw] italic">Nothing matches.</div>
        <p class="text-[14px] text-ink/60 mt-4">Try a different collection or size.</p>
      </div>
    @elseif ($viewMode === 'grid')
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-14">
        @foreach ($filtered as $idx => $p)
          @php
            $defaultSize = $p['sizes'][(int) floor(count($p['sizes']) / 2)] ?? ($p['sizes'][0] ?? 'M');
            $defaultColor = $p['colors'][0] ?? 'Bone';
          @endphp

          <div class="reveal" style="transition-delay: {{ $idx * 40 }}ms">
            <div class="group w-full text-left">
              <a href="{{ route('product', ['id' => $p['id']]) }}" class="block">
                <div class="relative aspect-[3/4] bg-mist img-zoom overflow-hidden">
                  <img src="{{ $p['image'] }}" alt="{{ $p['name'] }}" class="w-full h-full object-contain p-6" />
                  <div class="absolute top-3 left-3 mono text-[10px] tracking-[0.2em] text-ink/60">{{ $p['id'] }}</div>
                  @if (!empty($p['tag']))
                    <div class="absolute top-3 right-3 mono text-[10px] tracking-[0.2em] px-2 py-1 bg-ink text-bone">{{ strtoupper($p['tag']) }}</div>
                  @endif

                  <div class="absolute inset-x-3 bottom-3 translate-y-3 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                    <form method="POST" action="{{ route('cart.add') }}">
                      @csrf
                      <input type="hidden" name="id" value="{{ $p['id'] }}" />
                      <input type="hidden" name="size" value="{{ $defaultSize }}" />
                      <input type="hidden" name="color" value="{{ $defaultColor }}" />
                      <input type="hidden" name="qty" value="1" />
                      <button class="w-full bg-ink text-bone text-[11px] mono tracking-[0.25em] py-2.5 text-center relative overflow-hidden" type="submit">QUICK ADD →</button>
                    </form>
                  </div>
                </div>
              </a>
              <div class="mt-4 flex items-start justify-between gap-2">
                <div class="min-w-0">
                  <div class="text-[14px] truncate">{{ $p['name'] }}</div>
                  <div class="mono text-[10px] tracking-[0.2em] text-ink/50 mt-1">{{ strtoupper($p['collection']) }}</div>
                </div>
                <div class="mono text-[12px] whitespace-nowrap">{{ VeloraCatalog::fmtIDR((int) $p['price']) }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="divide-y divide-ink/10 border-y border-ink/10">
        @foreach ($filtered as $idx => $p)
          @php
            $defaultSize = $p['sizes'][(int) floor(count($p['sizes']) / 2)] ?? ($p['sizes'][0] ?? 'M');
            $defaultColor = $p['colors'][0] ?? 'Bone';
          @endphp

          <div class="grid grid-cols-12 gap-4 items-center py-6 group reveal" style="transition-delay: {{ $idx * 40 }}ms">
            <a href="{{ route('product', ['id' => $p['id']]) }}" class="col-span-2 aspect-square bg-mist img-zoom overflow-hidden">
              <img src="{{ $p['image'] }}" class="w-full h-full object-contain p-4" />
            </a>
            <a href="{{ route('product', ['id' => $p['id']]) }}" class="col-span-4 text-left">
              <div class="text-[15px]">{{ $p['name'] }}</div>
              <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-1">{{ $p['id'] }} · {{ strtoupper($p['collection']) }}</div>
            </a>
            <div class="col-span-3 hidden md:flex gap-2">
              @foreach ($p['sizes'] as $s)
                <span class="text-[10px] mono px-1.5 py-0.5 border border-ink/15">{{ $s }}</span>
              @endforeach
            </div>
            <div class="col-span-2 mono text-[13px]">{{ VeloraCatalog::fmtIDR((int) $p['price']) }}</div>
            <div class="col-span-1 text-right">
              <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $p['id'] }}" />
                <input type="hidden" name="size" value="{{ $defaultSize }}" />
                <input type="hidden" name="color" value="{{ $defaultColor }}" />
                <input type="hidden" name="qty" value="1" />
                <button class="text-[11px] mono tracking-[0.25em] ink-link" type="submit">ADD →</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </section>
</div>
@endsection
