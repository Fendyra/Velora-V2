@php
  use App\Support\VeloraCatalog;
@endphp

@extends('layouts.velora')

@section('title', 'Velora — Vogue Redefined')

@section('content')
<div class="page-enter" data-reveal-scope>
  <section class="relative min-h-[100vh] pt-24 px-6 lg:px-10 overflow-hidden">
    <div class="flex items-start justify-between text-[11px] mono tracking-[0.25em] text-ink/60 reveal">
      <div class="flex items-center gap-3">
        <span class="w-2 h-2 rounded-full bg-velora pingdot"></span>
        <span>SS26 — DROP 002 LIVE</span>
      </div>
      <div class="hidden sm:flex items-center gap-6">
        <span>YOGYAKARTA · <span data-jakarta-time>{{ $jakartaTime }}</span> WIB</span>
        <span>07° 48′ S · 110° 23′ E</span>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-8 lg:mt-12 items-end">
      <div class="col-span-12 lg:col-span-7 relative z-10">
        <div class="secnum reveal">/ 01 — INDEX</div>
        <h1 class="display text-[16vw] lg:text-[12vw] mt-4 reveal-up-clip overflow-hidden">
          <span class="block">Vogue,</span>
          <span class="block italic text-velora -mt-[2vw]">re&shy;defined.</span>
        </h1>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-3xl">
          <p class="md:col-span-2 text-[15px] leading-relaxed text-ink/80 reveal">
            A small Indonesian house making garments at a stubborn pace — fifteen pieces, twice a year. Built to be reached for, not photographed.
          </p>
          <div class="reveal">
            <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ ON OFFER</div>
            <div class="display text-[36px] leading-none mt-2">14<span class="italic">/15</span></div>
            <div class="text-[12px] text-ink/60 mt-1">pieces from drop 002 remaining</div>
          </div>
        </div>
        <div class="mt-10 flex items-center gap-4 reveal">
          <a href="{{ route('shop') }}" class="btn-mag border border-ink px-7 py-4 text-[12px] mono tracking-[0.25em] flex items-center gap-3">
            ENTER THE SHOP <span class="inline-block">→</span>
          </a>
          <a href="{{ route('logbook') }}" class="text-[13px] ink-link">Read the logbook</a>
        </div>
      </div>

      <div class="col-span-12 lg:col-span-5 relative">
        <div class="relative aspect-[3/4] img-zoom overflow-hidden">
          <div data-parallax data-parallax-speed="0.18" class="absolute inset-0 will-y">
            <img src="/assets/images/home/landingpage/model4.png" alt="" class="w-full h-full object-cover scale-110" />
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-ink/30 via-transparent to-transparent"></div>
          <div class="absolute left-4 top-4 mono text-[10px] tracking-[0.25em] text-bone reveal">
            /001 — BUSY WEEKENDS
          </div>
          <div class="absolute left-4 bottom-4 right-4 flex items-end justify-between text-bone reveal">
            <div>
              <div class="display text-[28px] italic leading-none">Crescent Knit</div>
              <div class="mono text-[10px] tracking-[0.25em] mt-2">VIEW PIECE →</div>
            </div>
            <div class="mono text-[10px] tracking-[0.25em] text-right">
              <div>SHOT BY</div>
              <div class="opacity-70">A. PRATAMA</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-ink/50">
      <span class="mono text-[10px] tracking-[0.3em]">SCROLL</span>
      <span class="w-px h-12 bg-ink/30 relative overflow-hidden">
        <span class="absolute inset-0 bg-ink animate-[loaderFill_2s_linear_infinite]" style="transform-origin: top"></span>
      </span>
    </div>
  </section>

  <section class="border-y border-ink/10 py-6 overflow-hidden marquee-mask mt-12">
    <div class="flex marquee-track gap-12 whitespace-nowrap">
      @for ($k = 0; $k < 2; $k++)
        <div class="flex gap-12 items-center">
          @foreach (['BY HAND', 'IN YOGYAKARTA', 'SINCE 2019', 'THE ALMOST FORGOTTEN', 'NOW REDEFINED', 'FIFTEEN PIECES', 'TWICE A YEAR'] as $t)
            <span class="display text-[6vw] leading-none flex items-center gap-12">
              <span class="not-italic">{{ $t }}</span>
              <span class="italic text-velora">·</span>
            </span>
          @endforeach
        </div>
      @endfor
    </div>
  </section>

  <section class="px-6 lg:px-10 mt-32">
    <div class="flex items-end justify-between mb-10">
      <div>
        <div class="secnum reveal">/ 02 — WARDROBE</div>
        <h2 class="display text-[10vw] lg:text-[7vw] leading-none mt-3 reveal-up-clip">
          Elevate, <span class="italic">slowly.</span>
        </h2>
      </div>
      <a href="{{ route('shop') }}" class="hidden md:flex items-center gap-2 text-[12px] mono tracking-[0.25em] ink-link self-end">
        SHOP ALL ({{ $productsCount }}) →
      </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-12">
      @foreach ($featured as $idx => $p)
        @php
          $defaultSize = $p['sizes'][(int) floor(count($p['sizes']) / 2)] ?? ($p['sizes'][0] ?? 'M');
          $defaultColor = $p['colors'][0] ?? 'Bone';
        @endphp

        <div class="group text-left reveal" style="transition-delay: {{ $idx * 80 }}ms">
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
                  <button class="w-full bg-ink text-bone text-[11px] mono tracking-[0.25em] py-2.5 text-center" type="submit">QUICK ADD →</button>
                </form>
              </div>
            </div>
          </a>
          <div class="mt-4 flex items-start justify-between">
            <div>
              <div class="text-[14px]">{{ $p['name'] }}</div>
              <div class="mono text-[10px] tracking-[0.2em] text-ink/50 mt-1">{{ strtoupper($p['collection']) }}</div>
            </div>
            <div class="mono text-[12px]">{{ VeloraCatalog::fmtIDR((int) $p['price']) }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <section class="mt-40 relative overflow-hidden">
    <div class="grid grid-cols-12 gap-6 px-6 lg:px-10 items-center">
      <div class="col-span-12 lg:col-span-5">
        <div class="secnum reveal">/ 03 — MANIFESTO</div>
        <h3 class="display text-[8vw] lg:text-[5.5vw] leading-[0.95] mt-3 reveal-up-clip">
          The almost <span class="italic">forgotten,</span> now <span class="text-velora italic">redefined.</span>
        </h3>
        <p class="mt-8 max-w-md text-[15px] leading-relaxed text-ink/80 reveal">
          We do not chase the season. We make for the people who keep one shirt for ten years, and want it to deserve that. Bone-white, ink, indigo and sand — a palette of patience.
        </p>
        <a href="{{ route('atelier') }}" class="mt-8 inline-flex items-center gap-3 btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]">
          VISIT THE ATELIER →
        </a>
      </div>

      <div class="col-span-12 lg:col-span-7 grid grid-cols-12 gap-3">
        <div class="col-span-5 aspect-[3/4] img-zoom overflow-hidden reveal-up-clip">
          <img src="/assets/images/home/landingpage/model1.jpg" class="w-full h-full object-cover" />
        </div>
        <div class="col-span-7 grid grid-rows-2 gap-3">
          <div class="aspect-[16/10] img-zoom overflow-hidden reveal-up-clip" style="transition-delay: 150ms">
            <img src="/assets/images/home/landingpage/model2.jpg" class="w-full h-full object-cover" />
          </div>
          <div class="aspect-[16/10] img-zoom overflow-hidden reveal-up-clip" style="transition-delay: 300ms">
            <img src="/assets/images/home/landingpage/model3.jpg" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-32 bg-ink text-bone py-24 px-6 lg:px-10 overflow-hidden">
    <div class="secnum reveal text-bone/60">/ 04 — RECORD</div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-10 mt-10">
      @foreach ([
        ['n' => '2019', 'l' => 'The beginning'],
        ['n' => '300+', 'l' => 'Loyal wearers'],
        ['n' => '666+', 'l' => 'Sold-out drops'],
        ['n' => '15', 'l' => 'Pieces per drop'],
      ] as $i => $s)
        <div class="reveal" style="transition-delay: {{ $i * 120 }}ms">
          <div class="display text-[18vw] md:text-[7vw] leading-none">{{ $s['n'] }}</div>
          <div class="mono text-[11px] tracking-[0.25em] text-bone/60 mt-3">/ {{ strtoupper($s['l']) }}</div>
        </div>
      @endforeach
    </div>
  </section>

  <section class="mt-32 px-6 lg:px-10">
    <div class="flex items-end justify-between mb-10">
      <div>
        <div class="secnum reveal">/ 05 — COLLECTIONS</div>
        <h3 class="display text-[8vw] lg:text-[6vw] leading-none mt-3 reveal-up-clip">Three chapters.</h3>
      </div>
      <a href="{{ route('logbook') }}" class="hidden md:flex items-center gap-2 text-[12px] mono tracking-[0.25em] ink-link">VIEW THE LOGBOOK →</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach ($collections as $i => $c)
        <a href="{{ route('shop', ['collection' => $c['title']]) }}" class="group text-left reveal" style="transition-delay: {{ $i * 120 }}ms">
          <div class="aspect-[3/4] img-zoom overflow-hidden relative">
            <img src="{{ $c['hero'] }}" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-ink/60 to-transparent"></div>
            <div class="absolute left-4 top-4 mono text-[10px] tracking-[0.25em] text-bone/80">/ {{ $c['id'] }}</div>
            <div class="absolute left-4 bottom-4 right-4 text-bone">
              <div class="display text-[34px] italic leading-none">{{ $c['title'] }}</div>
              <div class="mono text-[10px] tracking-[0.25em] mt-2 opacity-80">{{ $c['period'] }} · {{ $c['count'] }} PIECES</div>
            </div>
          </div>
          <p class="mt-4 text-[14px] text-ink/70 max-w-md">{{ $c['blurb'] }}</p>
        </a>
      @endforeach
    </div>
  </section>

  <section class="mt-40 px-6 lg:px-10">
    <div class="border-t border-b border-ink/15 py-16 grid grid-cols-12 items-center gap-6">
      <div class="col-span-12 md:col-span-7">
        <div class="secnum reveal">/ 06 — THE LETTER</div>
        <h3 class="display text-[8vw] md:text-[5vw] leading-[0.95] mt-3 reveal-up-clip">
          First access. <span class="italic text-velora">Quietly.</span>
        </h3>
        <p class="mt-4 max-w-md text-[14px] text-ink/70 reveal">
          We send one note a month, before a drop. No discount codes, no urgency, no noise.
        </p>
      </div>
      <form class="col-span-12 md:col-span-5 reveal" onsubmit="return false;">
        <div class="flex items-center border-b border-ink py-3">
          <input type="email" required placeholder="your email" class="flex-1 bg-transparent outline-none text-[16px]" />
          <button class="btn-mag border border-ink px-5 py-2 mono text-[11px] tracking-[0.25em]" type="button">SUBSCRIBE →</button>
        </div>
        <p class="text-[11px] mono tracking-[0.15em] text-ink/40 mt-3">UNSUBSCRIBE WHEN YOU WANT TO. WE WILL NOT BE OFFENDED.</p>
      </form>
    </div>
  </section>
</div>
@endsection
