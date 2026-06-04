@extends('layouts.velora')

@section('title', 'Privacy Policy — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10" data-reveal-scope>
  <div class="grid grid-cols-12 gap-6 items-end border-b border-ink/15 pb-10">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum reveal">/ PRIVACY POLICY</div>
      <h1 class="display text-[14vw] md:text-[8vw] leading-[0.9] mt-3 reveal-up-clip">
        We respect your <br><span class="italic text-velora">digital space.</span>
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 reveal">
      <p class="text-[13px] text-ink/70 max-w-sm">
        We believe that privacy is not a feature, but a fundamental right. We collect only what is strictly necessary to deliver our garments to your door. No excessive tracking, no sold data.
      </p>
    </div>
  </div>

  <div class="mt-16 max-w-4xl mx-auto space-y-6">
    
    <!-- 01 Collection -->
    <div class="group border border-ink/15 p-8 hover:bg-ink/5 transition-colors cursor-pointer" onclick="this.querySelector('.privacy-content').classList.toggle('hidden'); this.querySelector('.icon-plus').classList.toggle('rotate-45')">
      <div class="flex items-center justify-between">
        <div class="flex items-baseline gap-6">
          <div class="mono text-[12px] text-ink/40">01</div>
          <h2 class="display text-[32px] md:text-[42px] leading-none group-hover:text-velora transition-colors">Information Collection</h2>
        </div>
        <div class="icon-plus transition-transform duration-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
        </div>
      </div>
      <div class="privacy-content mt-8 hidden text-[14px] text-ink/80 leading-relaxed max-w-2xl border-t border-ink/10 pt-6">
        <p>When you interact with our storefront, we collect information transparently and only with your consent:</p>
        <ul class="list-disc pl-5 mt-4 space-y-2">
          <li><strong>Identity & Contact:</strong> Name, email address, phone number (used exclusively for shipping updates and order confirmation).</li>
          <li><strong>Shipping Data:</strong> Delivery address and postal code to ensure your garments reach you safely.</li>
          <li><strong>Technical Data:</strong> IP address and basic browser metrics to ensure our website functions correctly and securely.</li>
        </ul>
      </div>
    </div>

    <!-- 02 Usage -->
    <div class="group border border-ink/15 p-8 hover:bg-ink/5 transition-colors cursor-pointer" onclick="this.querySelector('.privacy-content').classList.toggle('hidden'); this.querySelector('.icon-plus').classList.toggle('rotate-45')">
      <div class="flex items-center justify-between">
        <div class="flex items-baseline gap-6">
          <div class="mono text-[12px] text-ink/40">02</div>
          <h2 class="display text-[32px] md:text-[42px] leading-none group-hover:text-velora transition-colors">Data Processing & Usage</h2>
        </div>
        <div class="icon-plus transition-transform duration-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
        </div>
      </div>
      <div class="privacy-content mt-8 hidden text-[14px] text-ink/80 leading-relaxed max-w-2xl border-t border-ink/10 pt-6">
        <p>Your data is processed strictly for fulfilling our obligations to you. We do not engage in behavioral advertising or third-party data brokering.</p>
        <ul class="list-disc pl-5 mt-4 space-y-2">
          <li><strong>Order Fulfillment:</strong> Passing your address and contact details to our trusted courier partners (e.g., JNE, Paxel, DHL) for dispatch.</li>
          <li><strong>Payment Processing:</strong> Payments are processed securely via Midtrans. We never store or see your full credit card details.</li>
          <li><strong>Communication:</strong> Sending you our monthly letter, only if you have explicitly opted in.</li>
        </ul>
      </div>
    </div>

    <!-- 03 Protection -->
    <div class="group border border-ink/15 p-8 hover:bg-ink/5 transition-colors cursor-pointer" onclick="this.querySelector('.privacy-content').classList.toggle('hidden'); this.querySelector('.icon-plus').classList.toggle('rotate-45')">
      <div class="flex items-center justify-between">
        <div class="flex items-baseline gap-6">
          <div class="mono text-[12px] text-ink/40">03</div>
          <h2 class="display text-[32px] md:text-[42px] leading-none group-hover:text-velora transition-colors">Security & Protection</h2>
        </div>
        <div class="icon-plus transition-transform duration-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
        </div>
      </div>
      <div class="privacy-content mt-8 hidden text-[14px] text-ink/80 leading-relaxed max-w-2xl border-t border-ink/10 pt-6">
        <p>We treat your personal information with the same care as our own garments. Our security measures include:</p>
        <ul class="list-disc pl-5 mt-4 space-y-2">
          <li><strong>Encryption:</strong> All traffic between you and our servers is encrypted using industry-standard TLS (Transport Layer Security).</li>
          <li><strong>Access Control:</strong> Only authorized core staff at the Velora atelier have access to customer data, strictly on a need-to-know basis.</li>
          <li><strong>Data Retention:</strong> We retain your order history for accounting purposes, but guest checkout data is minimized after 6 months.</li>
        </ul>
      </div>
    </div>

    <!-- 04 Rights -->
    <div class="group border border-ink/15 p-8 hover:bg-ink/5 transition-colors cursor-pointer" onclick="this.querySelector('.privacy-content').classList.toggle('hidden'); this.querySelector('.icon-plus').classList.toggle('rotate-45')">
      <div class="flex items-center justify-between">
        <div class="flex items-baseline gap-6">
          <div class="mono text-[12px] text-ink/40">04</div>
          <h2 class="display text-[32px] md:text-[42px] leading-none group-hover:text-velora transition-colors">Your Rights</h2>
        </div>
        <div class="icon-plus transition-transform duration-300">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path></svg>
        </div>
      </div>
      <div class="privacy-content mt-8 hidden text-[14px] text-ink/80 leading-relaxed max-w-2xl border-t border-ink/10 pt-6">
        <p>You remain the sole owner of your data. Under applicable privacy laws, you possess the right to:</p>
        <ul class="list-disc pl-5 mt-4 space-y-2">
          <li><strong>Access & Portability:</strong> Request a copy of the personal data we hold about you.</li>
          <li><strong>Correction:</strong> Request corrections to any inaccurate or incomplete information.</li>
          <li><strong>Erasure (Right to be Forgotten):</strong> Request the permanent deletion of your account and associated data.</li>
        </ul>
        <p class="mt-4 border-t border-ink/10 pt-4">To exercise any of these rights, simply email us at <a href="mailto:privacy@velora.studio" class="ink-link font-medium">privacy@velora.studio</a>.</p>
      </div>
    </div>

  </div>

  <div class="mt-24 border-t border-ink/15 pt-8 text-center reveal">
    <div class="mono text-[11px] tracking-[0.25em] text-ink/50 mb-4">/ QUESTIONS REGARDING PRIVACY?</div>
    <a href="mailto:privacy@velora.studio" class="display italic text-[32px] hover:text-velora transition-colors">privacy@velora.studio</a>
  </div>
</div>
@endsection
