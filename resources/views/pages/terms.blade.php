@php
  $updated = '02 June 2026';
  $sections = [
    ['id' => 'about', 'num' => '01', 'h' => 'About Velora', 'p' => '<p>Velora is an e-commerce platform that provides online sales of fashion products and clothing through the website.</p>'],
    ['id' => 'accounts', 'num' => '02', 'h' => 'User Accounts', 'p' => '<p>To use certain features, users can:</p><ul class="list-disc pl-6 space-y-1"><li>Create an account manually</li><li>Use Google OAuth login</li></ul><p>Users are fully responsible for:</p><ul class="list-disc pl-6 space-y-1"><li>Account confidentiality</li><li>Activities that occur on the account</li><li>Login data security</li></ul><p>Velora reserves the right to suspend accounts that violate the terms of service.</p>'],
    ['id' => 'products', 'num' => '03', 'h' => 'Products & Pricing', 'p' => '<p>Velora strives to display product information accurately, including:</p><ul class="list-disc pl-6 space-y-1"><li>Product photos</li><li>Descriptions</li><li>Sizes</li><li>Prices</li></ul><p>However, color differences or appearances may occur depending on the user\'s device.</p><p>Velora reserves the right to change product prices and availability at any time without prior notice.</p>'],
    ['id' => 'orders', 'num' => '04', 'h' => 'Orders & Payment', 'p' => '<p>All transactions are conducted through the Velora website system.</p><p>Payments are processed through official payment gateways such as:</p><ul class="list-disc pl-6 space-y-1"><li>Midtrans</li><li>Xendit</li></ul><p>Velora does not store user payment card data directly.</p><p>Orders will be processed after payment is successfully verified by the system.</p>'],
    ['id' => 'shipping', 'num' => '05', 'h' => 'Shipping', 'p' => '<p>Products will be shipped to the address provided by the user during checkout.</p><p>Estimated delivery times may vary depending on:</p><ul class="list-disc pl-6 space-y-1"><li>Delivery location</li><li>Courier service</li><li>Certain operational conditions</li></ul><p>Velora is not responsible for delays caused by the courier.</p>'],
    ['id' => 'returns', 'num' => '06', 'h' => 'Returns & Cancellations', 'p' => '<p>Users may submit a complaint or product return if:</p><ul class="list-disc pl-6 space-y-1"><li>The product is damaged</li><li>The product does not match the order</li><li>There is a shipping error</li></ul><p>Requests must be made within a maximum of 7 days after the product is received.</p>'],
    ['id' => 'prohibited', 'num' => '07', 'h' => 'Prohibited Uses', 'p' => '<p>Users are prohibited from:</p><ul class="list-disc pl-6 space-y-1"><li>Using the service for unlawful acts</li><li>Accessing the system without authorization</li><li>Spreading malware, spam, or other malicious activities</li><li>Abusing website features</li></ul><p>Violations may result in the account being permanently blocked.</p>'],
    ['id' => 'ip', 'num' => '08', 'h' => 'Intellectual Property', 'p' => '<p>All content on the Velora website including:</p><ul class="list-disc pl-6 space-y-1"><li>Logos</li><li>Designs</li><li>Photos</li><li>Product catalogs</li><li>Application systems</li></ul><p>are the property of Velora and are protected by applicable laws.</p>'],
    ['id' => 'liability', 'num' => '09', 'h' => 'Limitation of Liability', 'p' => '<p>Velora is not responsible for:</p><ul class="list-disc pl-6 space-y-1"><li>Losses due to misuse of the service</li><li>System disruptions from third parties</li><li>User internet network failures</li><li>Force majeure or conditions beyond our control</li></ul>'],
    ['id' => 'changes', 'num' => '10', 'h' => 'Changes to Service', 'p' => '<p>Velora reserves the right to:</p><ul class="list-disc pl-6 space-y-1"><li>Change service features</li><li>Update the system</li><li>Suspend part of the service</li></ul><p>without prior notice if deemed necessary.</p>'],
    ['id' => 'governing', 'num' => '11', 'h' => 'Governing Law', 'p' => '<p>These Terms of Service are governed and interpreted in accordance with the applicable laws of the Republic of Indonesia.</p>'],
    ['id' => 'contact', 'num' => '12', 'h' => 'Contact Us', 'p' => '<p>For further inquiries regarding Velora services, please contact:</p><ul class="list-none mt-2 space-y-1"><li>Velora Support</li><li>Email: <a href="mailto:support@velora.com" class="ink-link">hello.velorastudio19@gmail.com</a></li><li>Website: <a href="hhttps://velora-store.duckdns.org/" target="_blank" class="ink-link">www.velora.com</a></li></ul>'],
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
        <div class="display italic text-[42px] leading-none mt-2 text-velora">FENHAIM
        </div>
        <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-2">FOUNDER · VELORA STUDIO · YOGYAKARTA</div>
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
