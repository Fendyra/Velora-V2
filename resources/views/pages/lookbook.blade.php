@php
  $drops = [
    ['y' => '2019', 'd' => 'DROP 000 — Almost Forgotten', 'n' => '09 pieces'],
    ['y' => '2021', 'd' => 'DROP 001 — Mirror Era', 'n' => '10 pieces'],
    ['y' => '2024', 'd' => 'DROP 002 — Quiet Riot', 'n' => '11 pieces'],
    ['y' => '2026', 'd' => 'DROP 002 — Busy Weekends', 'n' => '15 pieces', 'live' => true],
  ];

  // Build a rich gallery from all entries + extra supporting images
  $gallery = [];
  foreach ($entries as $e) {
    $gallery[] = [
      'src'   => $e['image'],
      'tag'   => $e['tag'],
      'title' => $e['title'],
      'id'    => $e['id'],
      'date'  => $e['date'],
      'excerpt' => $e['excerpt'],
    ];
  }
  // Extra supporting images to fill the masonry grid
  $extras = [
    ['src' => '/assets/images/about/about1.jpg',                 'tag' => 'STUDIO',   'title' => 'Atelier, Yogyakarta'],
    ['src' => '/assets/images/home/landingpage/model1.jpg',      'tag' => 'FIELD',    'title' => 'Field Test — Jakarta'],
    ['src' => '/assets/images/home/landingpage/model2.jpg',      'tag' => 'PROCESS',  'title' => 'Cutting Room, 2026'],
    ['src' => '/assets/images/home/landingpage/model3.jpg',      'tag' => 'FIELD',    'title' => 'Raw Footage — Yogya'],
    ['src' => '/assets/images/home/landingpage/model4.png',      'tag' => 'DROP',     'title' => 'Busy Weekends — SS26'],
    ['src' => '/assets/images/home/landingpage/privilage.jpg',   'tag' => 'STUDIO',   'title' => 'Studio Reference'],
    ['src' => '/assets/images/about/about2.png',                 'tag' => 'PROCESS',  'title' => 'Pattern — Mirror Tee'],
    ['src' => '/assets/images/products/product5.png',            'tag' => 'DROP',     'title' => 'Drop 002 Release'],
    ['src' => '/assets/images/products/product8.png',            'tag' => 'PROCESS',  'title' => 'Indigo — Quiet Riot'],
  ];
  $allGallery = array_merge($gallery, $extras);
@endphp

@extends('layouts.velora')

@section('title', 'Lookbook — Velora')

@section('content')
<div class="page-enter pt-28 pb-20">

  {{-- ─── HEADER ──────────────────────────────────────────── --}}
  <section class="px-6 lg:px-10">
    <div class="grid grid-cols-12 gap-6 items-end">
      <div class="col-span-12 md:col-span-8">
        <div class="secnum">/ LOOKBOOK — DOCUMENTATION</div>
        <h1 class="display text-[12vw] md:text-[10vw] leading-[0.9] mt-3">
          The <span class="italic text-velora">studio,</span><br />
          <span>in its own words.</span>
        </h1>
      </div>
      <div class="col-span-12 md:col-span-4">
        <p class="text-[15px] leading-relaxed text-ink/75 max-w-md">
          Process notes from the cutting room, field tests, and release journals. Updated when there is something worth saying.
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


  {{-- ─── LOOKBOOK GRID ───────────────────────────────────── --}}
  <section class="mt-10" id="lookbook-grid">
    @php
    // Structured lookbook grid — each cell has a fixed role
    $grid = [
      // Row 1: 1 wide (2/3) + 1 tall (1/3)
      ['src'=>'/assets/images/about/about1.jpg',               'tag'=>'STUDIO',  'title'=>'Atelier, Yogyakarta',      'span'=>'wide'],
      ['src'=>'/assets/images/home/landingpage/model2.jpg',    'tag'=>'FIELD',   'title'=>'Field Test — Jakarta',     'span'=>'tall'],
      // Row 2: 3 equal
      ['src'=>'/assets/images/products/product5.png',          'tag'=>'DROP',    'title'=>'Drop 002 Release'],
      ['src'=>'/assets/images/home/landingpage/model3.jpg',    'tag'=>'FIELD',   'title'=>'Raw Footage — Yogya'],
      ['src'=>'/assets/images/home/landingpage/model4.png',    'tag'=>'DROP',    'title'=>'Busy Weekends — SS26'],
      // Row 3: 3 equal
      ['src'=>'/assets/images/home/landingpage/model1.jpg',    'tag'=>'PROCESS', 'title'=>'Cutting Room, 2026'],
      ['src'=>'/assets/images/products/product8.png',          'tag'=>'PROCESS', 'title'=>'Indigo — Quiet Riot'],
      ['src'=>'/assets/images/about/about2.png',               'tag'=>'STUDIO',  'title'=>'Pattern — Mirror Tee'],
      // Row 4: 1 wide (1/3) + 1 wider (2/3)
      ['src'=>'/assets/images/home/landingpage/privilage.jpg', 'tag'=>'STUDIO',  'title'=>'Studio Reference',          'span'=>'normal'],
      ['src'=>'/assets/images/products/product3.png',          'tag'=>'DROP',    'title'=>'Quiet Riot — Product',      'span'=>'wide-right'],
    ];
    // Merge lookbook entry images first
    $galleryAll = [];
    foreach ($entries as $e) {
      $galleryAll[] = ['src'=>$e['image'],'tag'=>$e['tag'],'title'=>$e['title'],'excerpt'=>$e['excerpt'],'date'=>$e['date']];
    }
    $galleryAll = array_merge($galleryAll, $grid);
    @endphp

    {{-- Row 1: [wide 2/3] + [square 1/3] --}}
    <div class="grid grid-cols-3 gap-1 mb-1">
      @php $r1 = array_slice($galleryAll, 0, 2); @endphp
      <div class="col-span-2 relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $r1[0]['src'] }}" data-title="{{ $r1[0]['title'] }}" data-tag="{{ $r1[0]['tag'] }}" data-excerpt="{{ $r1[0]['excerpt'] ?? '' }}" data-date="{{ $r1[0]['date'] ?? '' }}">
        <div class="aspect-[16/9] overflow-hidden">
          <img src="{{ $r1[0]['src'] }}" alt="{{ $r1[0]['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-5 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $r1[0]['tag'] }}</span>
            <p class="text-bone text-[14px] font-medium leading-tight">{{ $r1[0]['title'] }}</p>
          </div>
        </div>
      </div>
      <div class="col-span-1 relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $r1[1]['src'] }}" data-title="{{ $r1[1]['title'] }}" data-tag="{{ $r1[1]['tag'] }}" data-excerpt="{{ $r1[1]['excerpt'] ?? '' }}" data-date="{{ $r1[1]['date'] ?? '' }}">
        <div class="aspect-[16/9] overflow-hidden">
          <img src="{{ $r1[1]['src'] }}" alt="{{ $r1[1]['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-4 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $r1[1]['tag'] }}</span>
            <p class="text-bone text-[13px] font-medium leading-tight">{{ $r1[1]['title'] }}</p>
          </div>
        </div>
      </div>
    </div>

    {{-- Row 2: 3 equal --}}
    <div class="grid grid-cols-3 gap-1 mb-1">
      @php $r2 = array_slice($galleryAll, 2, 3); @endphp
      @foreach ($r2 as $img)
      <div class="relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $img['src'] }}" data-title="{{ $img['title'] }}" data-tag="{{ $img['tag'] }}" data-excerpt="{{ $img['excerpt'] ?? '' }}" data-date="{{ $img['date'] ?? '' }}">
        <div class="aspect-[4/3] overflow-hidden">
          <img src="{{ $img['src'] }}" alt="{{ $img['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-4 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $img['tag'] }}</span>
            <p class="text-bone text-[13px] font-medium leading-tight">{{ $img['title'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Row 3: 3 equal --}}
    <div class="grid grid-cols-3 gap-1 mb-1">
      @php $r3 = array_slice($galleryAll, 5, 3); @endphp
      @foreach ($r3 as $img)
      <div class="relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $img['src'] }}" data-title="{{ $img['title'] }}" data-tag="{{ $img['tag'] }}" data-excerpt="{{ $img['excerpt'] ?? '' }}" data-date="{{ $img['date'] ?? '' }}">
        <div class="aspect-[4/3] overflow-hidden">
          <img src="{{ $img['src'] }}" alt="{{ $img['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-4 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $img['tag'] }}</span>
            <p class="text-bone text-[13px] font-medium leading-tight">{{ $img['title'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Row 4: [1/3] + [2/3 wide] --}}
    <div class="grid grid-cols-3 gap-1">
      @php $r4 = array_slice($galleryAll, 8, 2); @endphp
      <div class="col-span-1 relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $r4[0]['src'] }}" data-title="{{ $r4[0]['title'] }}" data-tag="{{ $r4[0]['tag'] }}" data-excerpt="{{ $r4[0]['excerpt'] ?? '' }}" data-date="{{ $r4[0]['date'] ?? '' }}">
        <div class="aspect-[4/3] overflow-hidden">
          <img src="{{ $r4[0]['src'] }}" alt="{{ $r4[0]['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-4 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $r4[0]['tag'] }}</span>
            <p class="text-bone text-[13px] font-medium leading-tight">{{ $r4[0]['title'] }}</p>
          </div>
        </div>
      </div>
      @if (isset($r4[1]))
      <div class="col-span-2 relative overflow-hidden cursor-zoom-in group lookbook-tile"
           data-lightbox="{{ $r4[1]['src'] }}" data-title="{{ $r4[1]['title'] }}" data-tag="{{ $r4[1]['tag'] }}" data-excerpt="{{ $r4[1]['excerpt'] ?? '' }}" data-date="{{ $r4[1]['date'] ?? '' }}">
        <div class="aspect-[4/3] overflow-hidden">
          <img src="{{ $r4[1]['src'] }}" alt="{{ $r4[1]['title'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
        </div>
        <div class="absolute inset-0 bg-ink/0 group-hover:bg-ink/55 transition-all duration-500 flex flex-col justify-end p-5 pointer-events-none">
          <div class="translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-400">
            <span class="mono text-[9px] tracking-[0.25em] text-bone/70 block mb-1">{{ $r4[1]['tag'] }}</span>
            <p class="text-bone text-[14px] font-medium leading-tight">{{ $r4[1]['title'] }}</p>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>

  {{-- ─── QUOTE ───────────────────────────────────────────── --}}
  <section class="px-6 lg:px-10 mt-32">
    <div class="border-t border-ink/15 pt-12">
      <blockquote class="display text-[7vw] md:text-[4.5vw] leading-[1.05] italic max-w-5xl">
        "We are not a clothing brand. We are a slow-moving room of patient hands, with a tendency to make shirts when nothing else feels honest."
      </blockquote>
      <div class="mt-6 mono text-[11px] tracking-[0.25em] text-ink/60">— FENHAIM, FOUNDER</div>
    </div>
  </section>
</div>

{{-- ─── LIGHTBOX MODAL ──────────────────────────────────── --}}
<div id="lb-overlay" class="fixed inset-0 z-[200] flex items-center justify-center hidden" style="background-color: rgba(245, 244, 240, 0.92); backdrop-filter: blur(8px);">
  <button id="lb-close" class="absolute top-6 right-8 text-ink/60 hover:text-ink transition-colors mono text-[11px] tracking-widest z-10">ESC / CLOSE ×</button>
  <button id="lb-prev" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 text-ink/50 hover:text-ink transition-colors text-3xl z-10">‹</button>
  <button id="lb-next" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 text-ink/50 hover:text-ink transition-colors text-3xl z-10">›</button>

  <div class="flex flex-col items-center max-w-5xl w-full px-16 gap-6">
    <div class="relative w-full flex items-center justify-center" style="max-height: 75vh;">
      <img id="lb-img" src="" alt="" class="max-h-[75vh] max-w-full object-contain transition-opacity duration-300 shadow-2xl" />
    </div>
    <div class="text-center">
      <span id="lb-tag" class="mono text-[9px] tracking-[0.25em] text-ink/50 block mb-1"></span>
      <p id="lb-caption" class="display italic text-ink text-[22px] leading-tight"></p>
      <p id="lb-excerpt" class="text-ink/70 text-[13px] mt-2 max-w-lg mx-auto leading-relaxed hidden"></p>
    </div>
    <div id="lb-dots" class="flex gap-2 mt-2"></div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  // ─── Lookbook accordion ─────────────────────────────────────────
  document.querySelector('[data-lookbook]')?.addEventListener('click', e => {
    const toggle = e.target.closest('[data-lookbook-toggle]');
    if (!toggle) return;
    const entry = toggle.closest('[data-lookbook-entry]');
    if (!entry) return;
    const body = entry.querySelector('[data-lookbook-body]');
    const cta  = entry.querySelector('[data-lookbook-cta]');
    if (!body) return;
    const isOpen = !body.classList.contains('hidden');
    body.classList.toggle('hidden', isOpen);
    if (cta) cta.textContent = isOpen ? '→' : '←';
  });

  // ─── Lightbox ──────────────────────────────────────────────────
  const tiles = Array.from(document.querySelectorAll('.lookbook-tile'));
  const overlay = document.getElementById('lb-overlay');
  const lbImg   = document.getElementById('lb-img');
  const lbTag   = document.getElementById('lb-tag');
  const lbCap   = document.getElementById('lb-caption');
  const lbExc   = document.getElementById('lb-excerpt');
  const lbDots  = document.getElementById('lb-dots');
  const closeBtn = document.getElementById('lb-close');
  const prevBtn  = document.getElementById('lb-prev');
  const nextBtn  = document.getElementById('lb-next');

  let current = 0;

  const buildDots = () => {
    lbDots.innerHTML = '';
    tiles.forEach((_, i) => {
      const d = document.createElement('button');
      d.className = 'w-1.5 h-1.5 rounded-full transition-all duration-300 ' + (i === current ? 'bg-ink scale-125' : 'bg-ink/30');
      d.addEventListener('click', () => open(i));
      lbDots.appendChild(d);
    });
  };

  const open = (idx) => {
    current = (idx + tiles.length) % tiles.length;
    const tile = tiles[current];
    lbImg.style.opacity = 0;
    lbImg.src = tile.dataset.lightbox;
    lbImg.onload = () => { lbImg.style.opacity = 1; };
    lbTag.textContent  = tile.dataset.tag || '';
    lbCap.textContent  = tile.dataset.title || '';
    const exc = tile.dataset.excerpt || '';
    if (exc) {
      lbExc.textContent = exc;
      lbExc.classList.remove('hidden');
    } else {
      lbExc.classList.add('hidden');
    }
    overlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    buildDots();
  };

  const close = () => {
    overlay.classList.add('hidden');
    document.body.style.overflow = '';
  };

  tiles.forEach((tile, i) => tile.addEventListener('click', () => open(i)));
  closeBtn?.addEventListener('click', close);
  prevBtn?.addEventListener('click', () => open(current - 1));
  nextBtn?.addEventListener('click', () => open(current + 1));
  overlay?.addEventListener('click', e => { if (e.target === overlay) close(); });
  document.addEventListener('keydown', e => {
    if (overlay.classList.contains('hidden')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft')  open(current - 1);
    if (e.key === 'ArrowRight') open(current + 1);
  });
});
</script>
@endsection
