@php
  $year = (int) date('Y');
@endphp

<footer class="bg-ink text-bone mt-24" data-reveal-scope>
  <div class="border-b border-bone/15 py-3 overflow-hidden marquee-mask">
    <div class="flex marquee-track gap-10 whitespace-nowrap">
      @for ($k = 0; $k < 2; $k++)
        <div class="flex gap-10 items-center">
          @foreach (['LESS NOISE. MORE PRESENCE.', 'NOW REDEFINED', 'MADE IN YOGYAKARTA', '24/7 SHOPPING', '— SS26 —', 'BY HAND, BY VELORA'] as $t)
            <span class="mono text-[11px] tracking-[0.3em] flex items-center gap-10">
              {{ $t }}
              <span class="w-1 h-1 rounded-full bg-velora inline-block"></span>
            </span>
          @endforeach
        </div>
      @endfor
    </div>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-12 gap-8 px-6 lg:px-10 py-12">
    <div class="col-span-2 md:col-span-4 reveal">
      <a href="{{ route('home') }}" class="flex items-center gap-2.5">
        <div class="w-6 h-6 border border-bone rounded-full grid place-items-center">
          <span class="display text-[14px] leading-none">V</span>
        </div>
        <span class="display text-[20px]">Velora</span>
      </a>
      <p class="mt-4 text-[13px] leading-relaxed text-bone/65 max-w-xs">
        Jl. Seturan Raya 10, Sleman, Yogyakarta — Indonesia. By appointment, Mon–Sat, 11.00–20.00 WIB.
      </p>
      <a class="ink-link mt-3 inline-block text-[12px] text-bone/80" href="mailto:hell0@velora.studio">hello@velora.studio</a>
      <div class="mt-5 flex gap-2">
        @foreach (['IG', 'TW', 'PIN', 'VSCO'] as $s)
          <a href="#" class="w-8 h-8 grid place-items-center border border-bone/20 rounded-full hover:bg-bone hover:text-ink transition-colors mono text-[10px] tracking-wide">{{ $s }}</a>
        @endforeach
      </div>
    </div>

    <div class="md:col-span-2 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ SHOP</div>
      <ul class="mt-3 space-y-1.5 text-[13px] text-bone/80">
        <li><a href="{{ route('shop') }}" class="ink-link">All Pieces</a></li>
        <li><a href="{{ route('shop') }}" class="ink-link">New Arrivals</a></li>
        <li><a href="{{ route('shop') }}" class="ink-link">Drop 002</a></li>
        <li><a href="{{ route('logbook') }}" class="ink-link">Archive</a></li>
      </ul>
    </div>

    <div class="md:col-span-2 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ STUDIO</div>
      <ul class="mt-3 space-y-1.5 text-[13px] text-bone/80">
        <li><a href="{{ route('logbook') }}" class="ink-link">Logbook</a></li>
        <li><a href="{{ route('atelier') }}" class="ink-link">The Atelier</a></li>
        <li><a href="{{ route('stockists') }}" class="ink-link">Stockists</a></li>
      </ul>
    </div>

    <div class="md:col-span-2 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ HELP</div>
      <ul class="mt-3 space-y-1.5 text-[13px] text-bone/80">
        <li><a href="{{ route('faq') }}" class="ink-link">FAQ</a></li>
        <li><a href="{{ route('terms') }}" class="ink-link">Terms of Service</a></li>
        <li><a href="{{ route('privacy') }}" class="ink-link">Privacy Policy</a></li>
        <li><a href="{{ route('shipping') }}" class="ink-link">Shipping</a></li>
      </ul>
    </div>

    <div class="col-span-2 md:col-span-2 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ LETTER</div>
      <p class="mt-3 text-[12px] text-bone/65 leading-relaxed">A monthly note. No noise.</p>
      <form class="mt-3 flex border-b border-bone/30 focus-within:border-bone transition-colors" onsubmit="return false;">
        <input type="email" placeholder="your email" class="bg-transparent flex-1 py-1.5 outline-none text-[13px] placeholder-bone/40" />
        <button class="text-[11px] mono tracking-[0.2em] py-1.5 ink-link" type="button">SEND →</button>
      </form>
    </div>
  </div>

  <div class="border-t border-bone/15 px-6 lg:px-10 py-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-2 text-[11px] text-bone/45 mono tracking-wide">
    <div>© {{ $year }} VELORA STUDIO — ALL RIGHTS RESERVED</div>
    <div class="flex flex-wrap gap-4">
      <a href="{{ route('privacy') }}" class="ink-link">PRIVACY</a>
      <a href="{{ route('terms') }}" class="ink-link">TERMS</a>
      <a href="{{ route('faq') }}" class="ink-link">FAQ</a>
    </div>
    <div>VOGUE / REDEFINED / 005</div>
  </div>
</footer>
