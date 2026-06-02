@php
  use App\Support\VeloraCatalog;
  $orderId = $orderId ?? 'VL-' . strtoupper(substr(md5((string) microtime(true)), 0, 8));
  $total = (int) ($total ?? 0);
  $trackingSteps = [
    ['l' => 'Order received',        's' => 'live', 't' => 'TODAY · ' . now('Asia/Jakarta')->format('H:i')],
    ['l' => 'Atelier processing',    's' => 'next', 't' => 'WED ' . now()->addDays(1)->format('d M')],
    ['l' => 'Dispatched from Bandung','s' => 'soon','t' => 'THU ' . now()->next('Thursday')->format('d M')],
    ['l' => 'Out for delivery',      's' => 'soon', 't' => '~ ' . now()->next('Thursday')->addDays(2)->format('d M')],
  ];
@endphp

@extends('layouts.velora')

@section('title', 'Order Confirmed — Velora')

@section('content')
<div class="page-enter pt-28 pb-28 relative overflow-hidden" data-reveal-scope>

  {{-- Confetti --}}
  <div class="fixed inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
    @php
      $confettiColors = ['#0014FF', '#0B0B10', '#C9BFA8', '#F1ECE2', '#0014FF'];
    @endphp
    @for ($i = 0; $i < 36; $i++)
      <span class="confetti" style="
        left: {{ rand(0, 100) }}%;
        animation-delay: {{ rand(0, 2000) }}ms;
        animation-duration: {{ rand(3000, 6000) }}ms;
        background: {{ $confettiColors[$i % 5] }};
        width: {{ rand(6, 14) }}px;
        height: {{ rand(12, 22) }}px;
      "></span>
    @endfor
  </div>

  <div class="px-6 lg:px-10">
    <div class="secnum reveal">/ ORDER CONFIRMED</div>
    <h1 class="display text-[16vw] md:text-[10vw] leading-[0.9] mt-4 reveal-up-clip">
      Thank you. <span class="italic text-velora">Quietly.</span>
    </h1>
    <p class="mt-6 text-[15px] leading-relaxed text-ink/75 max-w-lg reveal">
      Order <span class="mono">{{ $orderId }}</span> has been received at the studio. You will hear from us on Thursday, when the box leaves Bandung — and again when it lands.
    </p>

    <div class="mt-12 grid grid-cols-12 gap-6">
      {{-- Order card + tracking --}}
      <div class="col-span-12 lg:col-span-7 reveal">
        <div class="border border-ink/15 p-8 bg-ivory">
          <div class="flex items-start justify-between gap-4">
            <div>
              <div class="mono text-[10px] tracking-[0.25em] text-ink/60">/ ORDER</div>
              <div class="display text-[36px] leading-none mt-2">{{ $orderId }}</div>
            </div>
            <div class="w-14 h-14 rounded-full bg-velora text-bone grid place-items-center shrink-0">
              <svg class="tick" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.4"><path d="m4 12 5 5L20 6"/></svg>
            </div>
          </div>
          <div class="mt-8 grid grid-cols-2 gap-y-4 text-[13px]">
            <div class="text-ink/55">Paid</div>
            <div class="mono text-right">{{ VeloraCatalog::fmtIDR($total) }}</div>
            <div class="text-ink/55">Method</div>
            <div class="mono text-right">VISA •••• 4242</div>
            <div class="text-ink/55">Dispatch</div>
            <div class="mono text-right">THU {{ now()->next('Thursday')->format('d M') }} — BANDUNG</div>
            <div class="text-ink/55">ETA</div>
            <div class="mono text-right">{{ now()->next('Thursday')->addDays(1)->format('d') }} — {{ now()->next('Thursday')->addDays(3)->format('d M') }}</div>
          </div>
        </div>

        <div class="mt-8">
          <div class="mono text-[10px] tracking-[0.25em] text-ink/60">/ FOLLOW YOUR PIECE</div>
          <div class="mt-6 relative">
            <div class="absolute left-3 top-2 bottom-2 w-px bg-ink/15"></div>
            @foreach ($trackingSteps as $x)
              <div class="relative flex items-start gap-5 py-3">
                <span class="relative w-6 h-6 rounded-full grid place-items-center shrink-0 {{ $x['s'] === 'live' ? 'bg-velora text-bone' : 'bg-ink/10' }}">
                  @if ($x['s'] === 'live')
                    <span class="absolute inset-0 rounded-full bg-velora pingdot"></span>
                    <svg class="relative" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5"><path d="m4 12 5 5L20 6"/></svg>
                  @else
                    <span class="w-2 h-2 rounded-full bg-ink/30"></span>
                  @endif
                </span>
                <div class="flex-1 flex items-baseline justify-between">
                  <div class="text-[14px] {{ $x['s'] === 'live' ? 'text-ink' : 'text-ink/55' }}">{{ $x['l'] }}</div>
                  <div class="mono text-[10px] tracking-[0.25em] text-ink/50">{{ $x['t'] }}</div>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="mt-10 flex flex-wrap gap-4">
          <a href="{{ route('shop') }}" class="btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]">CONTINUE SHOPPING →</a>
          <a href="{{ route('logbook') }}" class="ink-link mono text-[11px] tracking-[0.25em] text-ink/60 self-center">READ THE LOGBOOK →</a>
        </div>
      </div>

      {{-- Image card --}}
      <div class="col-span-12 lg:col-span-5 reveal">
        <div class="aspect-[4/5] img-zoom overflow-hidden relative">
          <img src="/assets/images/home/landingpage/model4.png" class="w-full h-full object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-ink/60 to-transparent"></div>
          <div class="absolute left-5 bottom-5 right-5 text-bone">
            <div class="mono text-[10px] tracking-[0.25em] opacity-75">/ A NOTE FROM THE STUDIO</div>
            <div class="display text-[22px] italic leading-snug mt-2">
              "We open each order by hand. Yours will leave with a small folded note, written this morning."
            </div>
            <div class="mono text-[10px] tracking-[0.25em] mt-3 opacity-80">— R. PRAKOSO</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
