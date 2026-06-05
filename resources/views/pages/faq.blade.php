@php
  $groups = [
    'Orders' => [
      ['q' => 'How do I place an order?', 'a' => 'Add a piece to your bag, open the bag, hit checkout. We accept card, GoPay/OVO/Dana, virtual accounts (BCA, Mandiri, BNI, BRI), and cash on delivery in Yogyakarta.'],
      ['q' => 'Can I change or cancel my order?', 'a' => 'Yes — within 12 hours of placing it. Email us at hello@velora.studio with your order number. After 12 hours your piece may already be in production.'],
      ['q' => 'I did not receive a confirmation email.', 'a' => 'It usually lands within ten minutes. Check spam first. If still missing after an hour, write to us and we will resend it by hand.'],
      ['q' => 'Is my payment information secure?', 'a' => 'Every payment runs through a 256-bit encrypted gateway (Stripe + Midtrans). Velora never sees or stores your card details.'],
    ],
    'Shipping' => [
      ['q' => 'Where do you ship?', 'a' => 'Indonesia first. International on request via DHL — write to us before ordering for a quote.'],
      ['q' => 'When are orders dispatched?', 'a' => 'Every Thursday from our Yogyakarta atelier. You receive a tracking link by email within 12 hours of dispatch.'],
      ['q' => 'What does shipping cost?', 'a' => 'Express JNE YES is IDR 45.000. Regular JNE REG is IDR 25.000. Studio pickup is free, by appointment. Orders over IDR 1.000.000 ship free.'],
      ['q' => 'Can I pick up at the studio?', 'a' => 'Yes. Select studio pickup at checkout — we will email you to schedule a time, Tuesday to Saturday, 11.00 to 17.00 WIB.'],
    ],
    'Returns' => [
      ['q' => 'What is your return window?', 'a' => '14 days from the day the parcel lands. Pieces must be unworn, unwashed, and have their original Velora tag attached at the hem.'],
      ['q' => 'How do I start a return?', 'a' => 'Email hello@velora.studio with your order number and the piece you would like to return. We will reply within one business day with a return label.'],
      ['q' => 'When will I be refunded?', 'a' => 'Within 5 business days of the piece arriving back at the atelier. Refunds go back to the original payment method.'],
      ['q' => 'Can I exchange a size?', 'a' => 'Yes, subject to stock. Start it as a return and note the requested replacement size in the email.'],
    ],
    'Sizing' => [
      ['q' => 'Do your pieces run true to size?', 'a' => 'Yes for most tees. Our shirts are cut a touch boxier — if you are between sizes, take the smaller. Specific measurements live on each product page under "Details".'],
      ['q' => 'Will my piece shrink?', 'a' => 'A whisper — about 2% on first cold wash. We pre-shrink at the atelier so it stays close to the size you bought.'],
      ['q' => 'What is the fabric weight?', 'a' => 'Most tees are 280gsm combed Indonesian cotton. Crewnecks are 380gsm brushed loopback. Heavier than the things you are used to.'],
    ],
    'Care' => [
      ['q' => 'How should I wash my piece?', 'a' => 'Cold, inside-out, with similar colours. Line dry in shade. Iron low if you must. The patina is part of the piece.'],
      ['q' => 'Can I tumble dry?', 'a' => 'Please do not — heat is what kills the hand-feel. Velora pieces are built to be hung and left alone.'],
      ['q' => 'What about dry cleaning?', 'a' => 'No need. Plain water, kind detergent. Avoid bleach and fabric softener.'],
    ],
    'Studio' => [
      ['q' => 'Can I visit the atelier?', 'a' => 'Yes, by appointment. Jl. Seturan Raya 10, Yogyakarta. Monday to Saturday, 11.00 to 17.00 WIB. Write to us with a date and we will set the kettle on.'],
      ['q' => 'Are you hiring?', 'a' => 'Quietly. We open one role a year and write to it on the lookbook. Read it and send a note if anything fits.'],
      ['q' => 'Do you collaborate?', 'a' => 'Rarely. Once or twice a year, with people whose work we already wear. The best route in is the lookbook, then a short, specific email.'],
    ],
  ];

  $currentTab = request()->query('tab', 'Orders');
  if (!isset($groups[$currentTab])) $currentTab = 'Orders';
@endphp

@extends('layouts.velora')

@section('title', 'FAQ — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10" data-reveal-scope>
  <div class="grid grid-cols-12 gap-6 items-end">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum reveal">/ HELP — FAQ</div>
      <h1 class="display text-[14vw] md:text-[10vw] leading-[0.9] mt-3 reveal-up-clip">
        Questions, <span class="italic text-velora">honestly</span> answered.
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 reveal">
      <p class="text-[14px] text-ink/70 max-w-md">
        If the answer is not here, write to us — we read every email. <a class="ink-link text-ink" href="mailto:hello.velorastudio19@gmail.com">hello.velorastudio19@gmail.com</a>.
      </p>
    </div>
  </div>

  <div class="mt-12 grid grid-cols-12 gap-10">
    <aside class="col-span-12 md:col-span-3">
      <div class="md:sticky md:top-32">
        <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-3">/ TOPICS</div>
        <div class="flex md:flex-col gap-2 overflow-x-auto no-scrollbar -mx-6 px-6 md:mx-0 md:px-0 pb-2 md:pb-0">
          @foreach (array_keys($groups) as $tabKey)
            <a href="{{ request()->fullUrlWithQuery(['tab' => $tabKey]) }}"
              class="shrink-0 text-left px-4 py-2.5 border md:border-0 md:border-l-2 transition-all duration-300 {{ $currentTab === $tabKey
                ? 'bg-ink text-bone md:bg-transparent md:text-ink md:border-velora md:pl-4'
                : 'border-ink/15 md:border-transparent md:text-ink/50 md:hover:text-ink md:hover:border-ink/30' }}">
              <span class="text-[14px]">{{ $tabKey }}</span>
            </a>
          @endforeach
        </div>
      </div>
    </aside>

    <div class="col-span-12 md:col-span-9">
      <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-4">/ {{ strtoupper($currentTab) }} — {{ str_pad((string) count($groups[$currentTab]), 2, '0', STR_PAD_LEFT) }} ENTRIES</div>
      <div class="border-t border-ink/15">
        @foreach ($groups[$currentTab] as $i => $qa)
          <div class="border-b border-ink/15 reveal" style="transition-delay: {{ $i * 60 }}ms" data-faq-item>
            <button type="button" data-faq-toggle class="w-full flex items-start justify-between gap-6 py-5 text-left group">
              <div class="flex items-baseline gap-5">
                <span class="mono text-[11px] tracking-[0.25em] text-ink/40 mt-1">/ {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
                <span class="display text-[6vw] md:text-[2.2vw] leading-[1.05] transition-colors duration-500 group-hover:text-velora">
                  {{ $qa['q'] }}
                </span>
              </div>
              <span class="shrink-0 w-9 h-9 rounded-full border border-ink/20 grid place-items-center transition-all duration-500 mt-1 group-hover:border-ink" data-faq-icon>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M12 5v14M5 12h14"/></svg>
              </span>
            </button>
            <div class="overflow-hidden transition-all duration-500 max-h-0 opacity-0" data-faq-body>
              <div class="pl-12 md:pl-16 pb-6">
                <p class="text-[15px] leading-relaxed text-ink/75 max-w-2xl">{{ $qa['a'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <section class="mt-24 border-t border-ink/15 pt-12 grid grid-cols-12 gap-6">
    <div class="col-span-12 md:col-span-7">
      <div class="secnum reveal">/ STILL UNSURE</div>
      <h3 class="display text-[8vw] md:text-[4vw] leading-[0.95] mt-3 reveal-up-clip">
        Write to us. We answer <span class="italic text-velora">by hand.</span>
      </h3>
    </div>
    <div class="col-span-12 md:col-span-5 reveal flex items-end">
      <div class="w-full">
        <p class="text-[13px] text-ink/65">No bots, no templates. The studio writes back within one business day, often the same morning.</p>
        <div class="mt-4 flex gap-3 flex-wrap">
          <a href="mailto:hello.velorastudio19@gmail.com" class="btn-mag border border-ink px-5 py-3 text-[12px] mono tracking-[0.25em]">EMAIL US →</a>
          <a href="{{ route('lookbook') }}" class="ink-link self-center mono text-[11px] tracking-[0.25em] text-ink/60">READ THE LOOKBOOK →</a>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-faq-item]').forEach(item => {
    const toggle = item.querySelector('[data-faq-toggle]');
    const body = item.querySelector('[data-faq-body]');
    const icon = item.querySelector('[data-faq-icon]');
    if (!toggle || !body) return;

    toggle.addEventListener('click', () => {
      const isOpen = body.classList.contains('max-h-72');
      // close all
      document.querySelectorAll('[data-faq-body]').forEach(b => {
        b.classList.remove('max-h-72', 'opacity-100', 'pb-6');
        b.classList.add('max-h-0', 'opacity-0');
      });
      document.querySelectorAll('[data-faq-icon]').forEach(ic => {
        ic.classList.remove('bg-ink', 'text-bone', 'rotate-45');
      });
      if (!isOpen) {
        body.classList.remove('max-h-0', 'opacity-0');
        body.classList.add('max-h-72', 'opacity-100', 'pb-6');
        icon.classList.add('bg-ink', 'text-bone', 'rotate-45');
      }
    });
  });
});
</script>
@endsection
