@extends('layouts.velora')

@section('title', 'Stockists — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10">

  {{-- ─── HERO ──────────────────────────────────────────── --}}
  <div class="grid grid-cols-12 gap-6 items-end border-b border-ink/15 pb-10 mb-16">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum">/ STOCKISTS</div>
      <h1 class="display text-[14vw] md:text-[9vw] leading-[0.9] mt-3">
        Where to<br/><span class="italic text-velora">find us.</span>
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 flex items-end">
      <p class="text-[13px] text-ink/70 max-w-sm mb-2 leading-relaxed">
        Experience our garments in person. Our pieces are available exclusively through our curated partner stockists in select cities.
      </p>
    </div>
  </div>

  {{-- ─── LOCATIONS GRID ────────────────────────────────── --}}
  <div class="grid grid-cols-12 gap-10 lg:gap-16">
    
    {{-- List of Stores --}}
    <div class="col-span-12 lg:col-span-5 space-y-16">
      
      <!-- Store 1: Yogyakarta -->
      <div class="group" id="store-jogja" onmouseenter="document.getElementById('map-view').innerText='The Slow Store, Yogyakarta'">
        <div class="flex items-center justify-between border-b border-ink/15 pb-3 mb-6">
          <h2 class="display text-[36px] md:text-[42px] leading-none group-hover:text-velora transition-colors">The Slow Store</h2>
          <span class="mono text-[10px] tracking-[0.2em] text-ink/50 bg-ink/5 px-2 py-1 shrink-0 ml-4">YOGYAKARTA</span>
        </div>
        <div class="space-y-4 text-[13px] text-ink/70 leading-relaxed">
          <p class="text-[15px] text-ink/90">
            Jl. Seturan Raya 45, Sleman<br>
            Yogyakarta, Indonesia 55281
          </p>
          <div class="grid grid-cols-2 gap-4 border-t border-ink/10 pt-5 mt-5">
            <div>
              <div class="mono text-[10px] tracking-widest text-ink/40 mb-2">HOURS</div>
              <p>Mon–Sat, 11:00–20:00<br>Sunday by appointment</p>
            </div>
            <div>
              <div class="mono text-[10px] tracking-widest text-ink/40 mb-2">CONTACT</div>
              <p>hello@theslow.store<br>+62 812-3456-7890</p>
            </div>
          </div>
          <div class="pt-5 mt-5">
             <a href="https://maps.app.goo.gl/BCcV9afokddkLgyc7" target="_blank" class="inline-block mono text-[10px] tracking-[0.2em] border border-ink px-5 py-3 hover:bg-ink hover:text-bone transition-colors uppercase">GET DIRECTIONS ↗</a>
          </div>
        </div>
      </div>

      <!-- Store 2: Jakarta -->
      <div class="group" id="store-jkt" onmouseenter="document.getElementById('map-view').innerText='Artikel & Co, Jakarta Selatan'">
        <div class="flex items-center justify-between border-b border-ink/15 pb-3 mb-6">
          <h2 class="display text-[36px] md:text-[42px] leading-none group-hover:text-velora transition-colors">Artikel & Co.</h2>
          <span class="mono text-[10px] tracking-[0.2em] text-ink/50 bg-ink/5 px-2 py-1 shrink-0 ml-4">JAKARTA SELATAN</span>
        </div>
        <div class="space-y-4 text-[13px] text-ink/70 leading-relaxed">
          <p class="text-[15px] text-ink/90">
            Panglima Polim Raya No. 42<br>
            Jakarta Selatan, Indonesia 12160
          </p>
          <div class="grid grid-cols-2 gap-4 border-t border-ink/10 pt-5 mt-5">
            <div>
              <div class="mono text-[10px] tracking-widest text-ink/40 mb-2">HOURS</div>
              <p>Everyday<br>10:00–22:00</p>
            </div>
            <div>
              <div class="mono text-[10px] tracking-widest text-ink/40 mb-2">CONTACT</div>
              <p>info@artikel.co<br>+62 821-9876-5432</p>
            </div>
          </div>
          <div class="pt-5 mt-5">
             <a href="https://maps.google.com/?q=Panglima+Polim+Jakarta" target="_blank" class="inline-block mono text-[10px] tracking-[0.2em] border border-ink px-5 py-3 hover:bg-ink hover:text-bone transition-colors uppercase">GET DIRECTIONS ↗</a>
          </div>
        </div>
      </div>

    </div>

    {{-- Map Column (Sticky on Desktop) --}}
    <div class="col-span-12 lg:col-span-7 relative hidden lg:block">
      <div class="sticky top-32 overflow-hidden bg-ink/5 border border-ink/15 shadow-sm" style="height: 600px;">
        <!-- Embedded Google Maps with Grayscale filter for aesthetic -->
        <iframe 
          src="https://maps.google.com/maps?q=Kost+Setyo+Mulyo,+Jl.+Seturan+Baru,+Yogyakarta&t=&z=16&ie=UTF8&iwloc=&output=embed" 
          width="100%" 
          height="100%" 
          style="border:0; filter: grayscale(90%) contrast(1.1) opacity(0.85);" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        
        {{-- Floating indicator for interactivity --}}
        <div class="absolute bottom-6 right-6 bg-bone/95 p-5 border border-ink/15 shadow-lg backdrop-blur-sm pointer-events-none transition-all duration-300">
           <div class="mono text-[9px] tracking-[0.2em] text-velora mb-1 flex items-center gap-2">
              <span class="w-1.5 h-1.5 bg-velora rounded-full animate-pulse"></span>
              CURRENT REGION
           </div>
           <div class="text-[14px] font-medium mt-2" id="map-view">Hover over a store</div>
        </div>
      </div>
      
      {{-- Mobile map link (shown on small screens) --}}
      <div class="lg:hidden mt-8 text-center border-t border-ink/15 pt-8">
         <p class="text-[13px] text-ink/60 mb-4">Explore all our locations on the map.</p>
         <a href="https://maps.google.com/?q=Velora+Stockists" target="_blank" class="inline-block mono text-[10px] tracking-[0.2em] border border-ink px-5 py-3 hover:bg-ink hover:text-bone transition-colors uppercase w-full">OPEN IN MAPS ↗</a>
      </div>
    </div>

  </div>
</div>
@endsection
