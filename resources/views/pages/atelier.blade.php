@extends('layouts.velora')

@section('title', 'The Atelier — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10">

  {{-- ─── HERO ──────────────────────────────────────────── --}}
  <div class="grid grid-cols-12 gap-6 items-end border-b border-ink/15 pb-10">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum">/ THE ATELIER</div>
      <h1 class="display text-[14vw] md:text-[9vw] leading-[0.9] mt-3">
        Yogyakarta,<br/><span class="italic text-velora">by hand.</span>
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4">
      <p class="text-[13px] text-ink/70 max-w-sm mb-6">
        A slow-moving studio. We do not chase trends. We build garments that last — cut by hand, sewn with care, and dyed in small batches.
      </p>
      <div class="flex gap-10">
        <div>
          <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-1">/ FOUNDED</div>
          <div class="display text-[28px] leading-none">2019</div>
        </div>
        <div>
          <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-1">/ GARMENTS</div>
          <div class="display text-[28px] leading-none">45+</div>
        </div>
      </div>
    </div>
  </div>

  {{-- ─── HERO IMAGE ──────────────────────────────────────── --}}
  <div class="mt-10 mb-24">
    <div class="w-full overflow-hidden" style="aspect-ratio:16/6;">
      <img src="{{ asset('assets/images/atelier/atelier-footage.png') }}" alt="Velora Atelier"
           class="w-full h-full object-cover object-center" />
    </div>
  </div>

  {{-- ─── 01 THE STORY ───────────────────────────────────── --}}
  <div class="mb-24 mt-6">
    <div class="secnum border-b border-ink/15 pb-3 mb-10">/ 01 — THE STORY</div>
    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-12 md:col-span-4">
        <h2 class="display text-[52px] leading-[0.95]">
          Who<br/><span class="italic text-velora">we are.</span>
        </h2>
      </div>
      <div class="col-span-12 md:col-span-7 md:col-start-6 space-y-5">
        <p class="text-[15px] text-ink/80 leading-relaxed">
          Velora began in 2019 as a quiet reaction to the noise of modern consumption. We didn't want to build a fashion empire; we wanted to build a good shirt — one you could wear to the ground, wash a hundred times, and still feel proud to put on.
        </p>
        <p class="text-[15px] text-ink/60 leading-relaxed">
          Rooted in Yogyakarta, a city where time moves slower and craftsmanship is woven into the culture, our atelier operates on a single principle: make less, make it better.
        </p>
        <p class="text-[15px] text-ink/60 leading-relaxed">
          We are a small team of pattern makers, dyers, and sewers. We don't chase trends. We chase longevity.
        </p>
      </div>
    </div>
  </div>

  {{-- ─── 02 DESIGN PHILOSOPHY ────────────────────────────── --}}
  <div class="mb-24">
    <div class="secnum border-b border-ink/15 pb-3 mb-10">/ 02 — DESIGN PHILOSOPHY</div>
    <div class="grid grid-cols-12 gap-6 mb-10">
      <div class="col-span-12 md:col-span-8">
        <h2 class="display text-[52px] md:text-[72px] leading-[0.9]">
          Form follows <span class="italic text-velora">fabric.</span>
        </h2>
      </div>
      <div class="col-span-12 md:col-span-4 flex items-end">
        <p class="text-[13px] text-ink/60 leading-relaxed">
          Our design process always begins with the textile. We let the weight and drape dictate the final silhouette — not the other way around.
        </p>
      </div>
    </div>

    {{-- 4 pillars as clean rows --}}
    <div style="border-top: 1px solid rgba(0,0,0,0.12);">
      <div style="border-bottom: 1px solid rgba(0,0,0,0.12); padding: 2rem 0;" class="group" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.015)'" onmouseout="this.style.backgroundColor='transparent'">
        <div class="grid grid-cols-12 gap-6 items-start">
          <div class="col-span-1"><span class="mono text-ink/40" style="font-size:11px;">01</span></div>
          <div class="col-span-3"><span class="mono text-velora" style="font-size:10px; letter-spacing:0.25em;">/ RESTRAINT</span></div>
          <div class="col-span-4"><h3 class="display" style="font-size:28px; line-height:1;">Less Noise</h3></div>
          <div class="col-span-4"><p class="text-ink/60" style="font-size:13px; line-height:1.6;">No excessive branding, no redundant hardware. Clean lines and purposeful construction only.</p></div>
        </div>
      </div>
      <div style="border-bottom: 1px solid rgba(0,0,0,0.12); padding: 2rem 0;" class="group" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.015)'" onmouseout="this.style.backgroundColor='transparent'">
        <div class="grid grid-cols-12 gap-6 items-start">
          <div class="col-span-1"><span class="mono text-ink/40" style="font-size:11px;">02</span></div>
          <div class="col-span-3"><span class="mono text-velora" style="font-size:10px; letter-spacing:0.25em;">/ PROPORTION</span></div>
          <div class="col-span-4"><h3 class="display" style="font-size:28px; line-height:1;">Boxy & Cropped</h3></div>
          <div class="col-span-4"><p class="text-ink/60" style="font-size:13px; line-height:1.6;">Our signature silhouette — wider for drape and comfort, with a cropped hem that respects the natural waistline.</p></div>
        </div>
      </div>
      <div style="border-bottom: 1px solid rgba(0,0,0,0.12); padding: 2rem 0;" class="group" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.015)'" onmouseout="this.style.backgroundColor='transparent'">
        <div class="grid grid-cols-12 gap-6 items-start">
          <div class="col-span-1"><span class="mono text-ink/40" style="font-size:11px;">03</span></div>
          <div class="col-span-3"><span class="mono text-velora" style="font-size:10px; letter-spacing:0.25em;">/ PATINA</span></div>
          <div class="col-span-4"><h3 class="display" style="font-size:28px; line-height:1;">Living Colors</h3></div>
          <div class="col-span-4"><p class="text-ink/60" style="font-size:13px; line-height:1.6;">We garment-dye after sewing. Colors breathe and fade gently at the seams, telling the story of the wearer.</p></div>
        </div>
      </div>
      <div style="padding: 2rem 0;" class="group" onmouseover="this.style.backgroundColor='rgba(0,0,0,0.015)'" onmouseout="this.style.backgroundColor='transparent'">
        <div class="grid grid-cols-12 gap-6 items-start">
          <div class="col-span-1"><span class="mono text-ink/40" style="font-size:11px;">04</span></div>
          <div class="col-span-3"><span class="mono text-velora" style="font-size:10px; letter-spacing:0.25em;">/ DURABILITY</span></div>
          <div class="col-span-4"><h3 class="display" style="font-size:28px; line-height:1;">Heavyweight</h3></div>
          <div class="col-span-4"><p class="text-ink/60" style="font-size:13px; line-height:1.6;">Dense, high-GSM combed Indonesian cotton. Structured when new, softening beautifully over years of wear.</p></div>
        </div>
      </div>
    </div>
  </div>

  {{-- ─── 03 THE PROCESS ─────────────────────────────────── --}}
  <div class="mb-24">
    <div class="secnum border-b border-ink/15 pb-3 mb-10">/ 03 — THE PROCESS</div>
    <div class="grid grid-cols-12 gap-6 mb-10">
      <div class="col-span-12 md:col-span-8">
        <h2 class="display text-[52px] md:text-[72px] leading-[0.9]">
          How it's <span class="italic text-velora">made.</span>
        </h2>
      </div>
    </div>

    <div style="border-top: 1px solid rgba(0,0,0,0.12);">
      @php
        $steps = [
          ['n'=>'01','title'=>'Pattern & Cut','img'=>'home/landingpage/model2.jpg','body'=>'Every silhouette is drafted on paper in our studio. We cut heavy cottons in small stacks to ensure absolute precision on every single panel.'],
          ['n'=>'02','title'=>'Sew & Reinforce','img'=>'about/about2.png','body'=>'Assembled by our senior machinists using twin-needle stitching on all high-stress seams. Necklines are bound so they never lose their shape.'],
          ['n'=>'03','title'=>'Garment Dye','img'=>'products/product8.png','body'=>'We sew the garments first in raw cotton, then dye them whole. This shrinks each piece to its final size and creates our signature washed patina.'],
          ['n'=>'04','title'=>'Serialise & Ship','img'=>'products/product5.png','body'=>'Every finished piece receives a unique serial number stitched at the hem before being wrapped and dispatched each Thursday from our atelier.'],
        ];
      @endphp
      @foreach ($steps as $s)
      <div style="padding: 1.75rem 0;">
        <div class="grid grid-cols-12 gap-6 items-center">
          <div class="col-span-1">
            <span class="mono text-ink/40" style="font-size:11px;">{{ $s['n'] }}</span>
          </div>
          <div class="col-span-4">
            <h3 class="display" style="font-size:28px; line-height:1;">{{ $s['title'] }}</h3>
          </div>
          <div class="col-span-5">
            <p class="text-ink/60" style="font-size:13px; line-height:1.6;">{{ $s['body'] }}</p>
          </div>
          <div class="col-span-2 flex justify-end">
            <div class="overflow-hidden" style="width:72px; height:56px;">
              <img src="{{ asset('assets/images/' . $s['img']) }}"
                   alt="{{ $s['title'] }}"
                   style="width:100%; height:100%; object-fit:cover; filter:grayscale(1); transition:filter 0.5s;"
                   onmouseover="this.style.filter='grayscale(0)'"
                   onmouseout="this.style.filter='grayscale(1)'" />
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- ─── CLOSING QUOTE ────────────────────────────────────── --}}
  <div style="border-top: 1px solid rgba(0,0,0,0.12); padding-top: 3rem;">
    <blockquote class="display italic" style="font-size: clamp(24px, 4vw, 56px); line-height:1.05; max-width:900px;">
      "We are not a clothing brand. We are a slow-moving room of patient hands, with a tendency to make shirts when nothing else feels honest."
    </blockquote>
    <div class="mono text-ink/50 mt-6" style="font-size:11px; letter-spacing:0.25em;">— FENHAIM, FOUNDER</div>
    <div class="mt-8">
      <a href="{{ route('shop') }}" class="btn-mag border border-ink px-6 py-4 mono inline-block hover:bg-ink hover:text-bone transition-colors" style="font-size:11px; letter-spacing:0.25em;">EXPLORE THE PIECES →</a>
    </div>
  </div>

</div>
@endsection
