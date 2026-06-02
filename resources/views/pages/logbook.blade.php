@php
  $drops = [
    ['y' => '2019', 'd' => 'DROP 000 — Almost Forgotten', 'n' => '09 pieces'],
    ['y' => '2021', 'd' => 'DROP 001 — Mirror Era', 'n' => '10 pieces'],
    ['y' => '2024', 'd' => 'DROP 002 — Quiet Riot', 'n' => '11 pieces'],
    ['y' => '2026', 'd' => 'DROP 002 — Busy Weekends', 'n' => '15 pieces', 'live' => true],
  ];
@endphp

@extends('layouts.velora')

@section('title', 'Logbook — Velora')

@section('content')
<div class="page-enter pt-28 pb-20" data-reveal-scope>
  <section class="px-6 lg:px-10">
    <div class="grid grid-cols-12 gap-6 items-end">
      <div class="col-span-12 md:col-span-8">
        <div class="secnum reveal">/ LOGBOOK — DOCUMENTATION</div>
        <h1 class="display text-[12vw] md:text-[10vw] leading-[0.9] mt-3 reveal-up-clip">
          The <span class="italic text-velora">studio,</span><br />
          <span>in its own words.</span>
        </h1>
      </div>
      <div class="col-span-12 md:col-span-4 reveal">
        <p class="text-[15px] leading-relaxed text-ink/75 max-w-md">
          Process notes from the cutting room, field tests, and release journals. Updated when there is something worth saying — not when there isn't.
        </p>
        <div class="mt-6 grid grid-cols-2 gap-4">
          <div>
            <div class="display text-[44px] leading-none">{{ $allCount }}</div>
            <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-1">/ ENTRIES</div>
          </div>
          <div>
            <div class="display text-[44px] leading-none">07</div>
            <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-1">/ YEARS</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="px-6 lg:px-10 mt-12">
    <div class="flex flex-wrap items-center gap-2">
      <span class="mono text-[10px] tracking-[0.25em] text-ink/50 mr-2">/ FILTER</span>
      @foreach ($tags as $t)
        <a href="{{ request()->fullUrlWithQuery(['tag' => $t]) }}" class="chip {{ $tag === $t ? 'on' : '' }}">{{ $t }}</a>
      @endforeach
    </div>
  </section>

  <section class="px-6 lg:px-10 mt-12" data-logbook>
    @foreach ($entries as $idx => $e)
      <article class="border-t border-ink/15 last:border-b last:border-ink/15 py-8 reveal" style="transition-delay: {{ $idx * 80 }}ms" data-logbook-entry>
        <div class="grid grid-cols-12 gap-6 items-start cursor-pointer group" data-logbook-toggle>
          <div class="col-span-12 md:col-span-2 mono text-[11px] tracking-[0.25em] text-ink/60">
            <div>{{ $e['id'] }} / {{ $e['date'] }}</div>
            <div class="mt-1 inline-block px-2 py-1 bg-ink text-bone">{{ $e['tag'] }}</div>
          </div>
          <div class="col-span-12 md:col-span-7">
            <h2 class="display text-[6vw] md:text-[2.6vw] leading-[0.98] group-hover:text-velora transition-colors duration-500">
              {{ $e['title'] }}
            </h2>
            <p class="text-[15px] text-ink/75 mt-3 max-w-2xl transition-all overflow-hidden max-h-20 opacity-90" data-logbook-excerpt>
              {{ $e['excerpt'] }}
              <span class="hidden" data-logbook-more>
                We started this entry on a quiet morning in the studio. The light was good. The conversations were better. What follows is a slightly edited transcript of the things we noticed, in the order we noticed them — a working document, not a polished essay.
              </span>
            </p>
            <div class="mt-4 flex items-center gap-6 text-[11px] mono tracking-[0.2em] text-ink/50">
              <span>READ {{ (int) ceil((strlen($e['excerpt']) + 200) / 100) }} MIN</span>
              <span>·</span>
              <span>3 IMAGES</span>
              <span>·</span>
              <span class="ink-link" data-logbook-cta>OPEN ENTRY →</span>
            </div>
          </div>
          <div class="col-span-12 md:col-span-3">
            <div class="aspect-[4/3] img-zoom overflow-hidden">
              <img src="{{ $e['image'] }}" class="w-full h-full object-cover" />
            </div>
          </div>
        </div>

        <div class="hidden" data-logbook-body>
          <div class="grid grid-cols-12 gap-3 mt-8 page-enter">
            <div class="col-span-12 md:col-span-8 aspect-[16/9] img-zoom overflow-hidden">
              <img src="/assets/images/about/about1.jpg" class="w-full h-full object-cover" />
            </div>
            <div class="col-span-12 md:col-span-4 grid grid-rows-2 gap-3">
              <div class="aspect-[4/3] img-zoom overflow-hidden"><img src="/assets/images/home/landingpage/model2.jpg" class="w-full h-full object-cover" /></div>
              <div class="aspect-[4/3] img-zoom overflow-hidden"><img src="/assets/images/home/landingpage/model3.jpg" class="w-full h-full object-cover" /></div>
            </div>
          </div>
        </div>
      </article>
    @endforeach
  </section>

  <section class="px-6 lg:px-10 mt-32">
    <div class="secnum reveal">/ DROP TIMELINE</div>
    <h3 class="display text-[8vw] md:text-[5vw] leading-none mt-3 reveal-up-clip">
      Seven years, <span class="italic">eight drops.</span>
    </h3>
    <div class="mt-12 relative">
      <div class="absolute left-0 right-0 top-1/2 h-px bg-ink/15"></div>
      <div class="relative grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach ($drops as $i => $s)
          <div class="reveal" style="transition-delay: {{ $i * 120 }}ms">
            <div class="relative">
              <div class="w-3 h-3 rounded-full mb-6 mx-auto {{ !empty($s['live']) ? 'bg-velora pingdot' : 'bg-ink' }}"></div>
            </div>
            <div class="text-center">
              <div class="display text-[42px] leading-none">{{ $s['y'] }}</div>
              <div class="mono text-[10px] tracking-[0.25em] text-ink/60 mt-3">{{ $s['d'] }}</div>
              <div class="text-[12px] text-ink/50 mt-1">{{ $s['n'] }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="px-6 lg:px-10 mt-32">
    <div class="border-t border-ink/15 pt-12">
      <blockquote class="display text-[7vw] md:text-[4.5vw] leading-[1.05] italic max-w-5xl reveal-up-clip">
        "We are not a clothing brand. We are a slow-moving room of patient hands, with a tendency to make shirts when nothing else feels honest."
      </blockquote>
      <div class="mt-6 mono text-[11px] tracking-[0.25em] text-ink/60 reveal">— FENHAIM, FOUNDER</div>
    </div>
  </section>
</div>
@endsection
