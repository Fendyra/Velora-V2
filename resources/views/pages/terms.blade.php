@php
  $updated = $today ?? now()->locale('en_GB')->translatedFormat('d F Y');
  $sections = [
    ['id' => 'overview',   'num' => '01', 'h' => 'Overview',              'p' => '<p>Velora Studio ("Velora", "we", "us") is a small Indonesian clothing label registered in Bandung, West Java. By browsing this site, placing an order, or signing up for our letter, you accept these terms.</p><p>If anything here is unclear, write to us — these are working terms, not a legal moat. We will update this page when something changes and date it at the top.</p>'],
    ['id' => 'orders',     'num' => '02', 'h' => 'Orders & payment',      'p' => '<p>Prices are listed in Indonesian Rupiah (IDR) and include VAT where applicable. We accept card, GoPay, OVO, Dana, virtual accounts, and cash on delivery (Jakarta and Bandung only).</p><ul class="list-disc pl-6 space-y-1"><li>An order is confirmed only after payment lands and we have emailed an order number beginning with "VL-".</li><li>We reserve the right to refuse or cancel an order if a piece is mis-priced, out of stock, or suspected of fraud.</li><li>You may cancel an order within twelve hours of placing it by emailing us with your order number.</li></ul>'],
    ['id' => 'shipping',   'num' => '03', 'h' => 'Shipping & risk',       'p' => '<p>We dispatch from Bandung every Thursday. Tracking is provided by email within twelve hours of dispatch.</p><ul class="list-disc pl-6 space-y-1"><li>Risk of loss transfers to you once the courier collects the parcel.</li><li>If the parcel does not arrive, contact us within fourteen days of the courier\'s "out for delivery" scan.</li><li>International orders may incur duties at the destination — these are your responsibility.</li></ul>'],
    ['id' => 'returns',    'num' => '04', 'h' => 'Returns & refunds',     'p' => '<p>You may return any unworn, unwashed piece within fourteen days of receipt, with its original Velora tag attached.</p><ul class="list-disc pl-6 space-y-1"><li>Return shipping is paid by the customer unless the piece arrived faulty or wrongly sent.</li><li>Refunds are issued to the original payment method within five business days.</li><li>Sale and made-to-order pieces are final and cannot be returned.</li></ul>'],
    ['id' => 'ip',         'num' => '05', 'h' => 'Intellectual property', 'p' => '<p>All garments, photography, copy, and the word "Velora" itself are the property of Velora Studio. You are welcome to share images of pieces you own — credit @velora.studio if you can.</p><p>No part of this site may be copied, scraped, or reproduced for commercial use without written permission.</p>'],
    ['id' => 'liability',  'num' => '06', 'h' => 'Liability',             'p' => '<p>To the extent permitted by Indonesian law, Velora\'s liability for any claim relating to an order is limited to the price paid for that order.</p><p>We are not liable for indirect or consequential losses, or for delays caused by couriers, customs, weather, or other events outside our control.</p>'],
    ['id' => 'privacy',    'num' => '07', 'h' => 'Privacy',               'p' => '<p>We collect only what we need to send your order: name, address, email, phone, and (briefly) payment information. We never sell or share this data, and we delete it on request.</p>'],
    ['id' => 'governing',  'num' => '08', 'h' => 'Governing law',         'p' => '<p>These terms are governed by the laws of the Republic of Indonesia. Any dispute that we cannot resolve over email will be settled in the courts of Bandung, West Java.</p><p>This is the last page. If you have read this far, thank you — write to us, we would like to know.</p>'],
  ];
@endphp

@extends('layouts.velora')

@section('title', 'Terms of Service — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10" data-reveal-scope>
  <div class="grid grid-cols-12 gap-6 items-end">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum reveal">/ TERMS OF SERVICE</div>
      <h1 class="display text-[14vw] md:text-[9vw] leading-[0.9] mt-3 reveal-up-clip">
        The <span class="italic text-velora">small print,</span><br>in plain words.
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 reveal">
      <div class="border border-ink/15 p-5 bg-ivory">
        <div class="mono text-[10px] tracking-[0.25em] text-ink/50">/ LAST UPDATED</div>
        <div class="display text-[28px] leading-none mt-1">{{ strtoupper($updated) }}</div>
        <p class="text-[12px] text-ink/60 mt-3">By placing an order on velora.studio you agree to the terms below. We have tried to write them as we would speak them.</p>
      </div>
    </div>
  </div>

  <div class="mt-16 grid grid-cols-12 gap-10">
    <aside class="col-span-12 md:col-span-3">
      <div class="md:sticky md:top-32">
        <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-3">/ CONTENTS</div>
        <ol class="space-y-1" id="terms-nav">
          @foreach ($sections as $i => $s)
            <li>
              <a href="#{{ $s['id'] }}"
                class="terms-nav-link flex items-baseline gap-3 py-1.5 text-[13px] transition-all duration-300 border-l-2 pl-3 text-ink/55 border-transparent hover:text-ink hover:border-ink/30"
                data-target="{{ $s['id'] }}">
                <span class="mono text-[10px] tracking-[0.2em]">{{ $s['num'] }}</span>
                <span>{{ $s['h'] }}</span>
              </a>
            </li>
          @endforeach
        </ol>
      </div>
    </aside>

    <div class="col-span-12 md:col-span-9 space-y-16 max-w-3xl">
      @foreach ($sections as $s)
        <section id="{{ $s['id'] }}" class="scroll-mt-32 reveal">
          <div class="flex items-baseline gap-4">
            <span class="mono text-[11px] tracking-[0.25em] text-ink/50">/ {{ $s['num'] }}</span>
            <h2 class="display text-[8vw] md:text-[3.4vw] leading-none">{{ $s['h'] }}</h2>
          </div>
          <div class="mt-5 text-[15px] leading-[1.75] text-ink/80 space-y-4 max-w-none">
            {!! $s['p'] !!}
          </div>
        </section>
      @endforeach

      <div class="border-t border-ink/15 pt-8">
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ SIGNED, ON BEHALF OF THE STUDIO</div>
        <div class="display italic text-[42px] leading-none mt-2 text-velora">R. Prakoso</div>
        <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-2">FOUNDER · VELORA STUDIO · BANDUNG</div>
      </div>

      <div class="flex flex-wrap gap-3">
        <a href="{{ route('faq') }}" class="btn-mag border border-ink px-5 py-3 text-[12px] mono tracking-[0.25em]">READ THE FAQ →</a>
        <a href="{{ route('home') }}" class="ink-link self-center mono text-[11px] tracking-[0.25em] text-ink/60">BACK TO HOME →</a>
      </div>
    </div>
  </div>
</div>

<script>
(function () {
  const navLinks = document.querySelectorAll('.terms-nav-link');
  if (!navLinks.length) return;
  const ids = Array.from(navLinks).map(l => l.getAttribute('data-target'));
  const setActive = (id) => {
    navLinks.forEach(l => {
      const on = l.getAttribute('data-target') === id;
      l.classList.toggle('text-ink', on);
      l.classList.toggle('border-velora', on);
      l.classList.toggle('text-ink/55', !on);
      l.classList.toggle('border-transparent', !on);
    });
  };
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) setActive(e.target.id); });
  }, { rootMargin: '-30% 0px -55% 0px' });
  ids.forEach(id => { const el = document.getElementById(id); if (el) obs.observe(el); });
})();
</script>
@endsection
