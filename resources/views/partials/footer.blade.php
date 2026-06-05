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
    <div class="col-span-2 md:col-span-3 reveal">
      <a href="{{ route('home') }}" class="flex items-center gap-2.5">
        <div class="w-6 h-6 border border-bone rounded-full grid place-items-center">
          <span class="display text-[14px] leading-none">V</span>
        </div>
        <span class="display text-[20px]">Velora</span>
      </a>
      <p class="mt-4 text-[13px] leading-relaxed text-bone/65 max-w-xs">
        Jl. Seturan Raya 45, Sleman, Yogyakarta — Indonesia. By appointment, Mon–Sat, 11.00–20.00 WIB.
      </p>
      <a class="ink-link mt-3 inline-block text-[12px] text-bone/80" href="mailto:hello.velorastudio19@gmail.com">hello.velorastudio19@gmail.com</a>
      <div class="mt-5 flex gap-2">
        @foreach (['IG', 'TT', 'PIN'] as $s)
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
        <li><a href="{{ route('lookbook') }}" class="ink-link">Archive</a></li>
      </ul>
    </div>

    <div class="md:col-span-2 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ STUDIO</div>
      <ul class="mt-3 space-y-1.5 text-[13px] text-bone/80">
        <li><a href="{{ route('lookbook') }}" class="ink-link">Lookbook</a></li>
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

    <div class="md:col-span-3 reveal">
      <div class="mono text-[10px] tracking-[0.25em] text-bone/45">/ LETTER</div>
      <p class="mt-3 text-[13px] text-bone/80">A monthly note. No noise.</p>
      
      @if (session('success_newsletter'))
        <div class="mt-6 text-[11px] text-bone border border-bone/30 px-3 py-2 inline-block">
          {{ session('success_newsletter') }}
        </div>
      @else
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="mt-6 flex items-end border-b border-bone/20 pb-2 focus-within:border-bone transition-colors group">
          @csrf
          <input type="email" name="email" placeholder="your email" required
                 class="bg-transparent border-none outline-none text-[13px] text-bone placeholder:text-bone/30 w-full p-0 focus:ring-0">
          <button type="submit" class="mono text-[10px] tracking-widest text-bone/60 group-hover:text-bone transition-colors uppercase shrink-0 pb-1">SEND &rarr;</button>
        </form>
        @error('email')
          <p class="mt-2 text-[10px] text-red-400">{{ $message }}</p>
        @enderror
      @endif
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
