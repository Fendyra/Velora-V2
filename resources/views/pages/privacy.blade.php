@extends('layouts.velora')

@section('title', 'Privacy Policy — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10">
  <!-- Header Section without reveal-clip to avoid JS hidden bugs -->
  <div class="grid grid-cols-12 gap-6 items-end border-b border-ink/15 pb-10">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum">/ PRIVACY POLICY</div>
      <h1 class="display text-[14vw] md:text-[8vw] leading-[0.9] mt-3">
        We respect your <br><span class="italic text-velora">digital space.</span>
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 mb-2">
      <p class="text-[13px] text-ink/70 max-w-sm">
        We believe that privacy is not a feature, but a fundamental right. We collect only what is strictly necessary to deliver our garments to your door. No excessive tracking, no sold data.
      </p>
    </div>
  </div>

  <!-- Interactive Policy Section -->
  <div class="mt-16 grid grid-cols-12 gap-10" id="privacy-container">
    
    <!-- Sticky Navigation / Tabs -->
    <div class="col-span-12 md:col-span-4 lg:col-span-3">
      <div class="sticky top-32 space-y-2" id="privacy-nav">
        <button class="w-full text-left py-3 px-4 border-l-2 border-velora bg-ink/5 text-ink transition-all duration-300 font-medium text-[13px]" data-target="panel-1">
          <span class="mono text-[10px] tracking-widest block text-ink/50 mb-1">01</span>
          Information Collection
        </button>
        <button class="w-full text-left py-3 px-4 border-l-2 border-transparent text-ink/50 hover:text-ink transition-all duration-300 font-medium text-[13px]" data-target="panel-2">
          <span class="mono text-[10px] tracking-widest block text-ink/40 mb-1">02</span>
          Processing & Usage
        </button>
        <button class="w-full text-left py-3 px-4 border-l-2 border-transparent text-ink/50 hover:text-ink transition-all duration-300 font-medium text-[13px]" data-target="panel-3">
          <span class="mono text-[10px] tracking-widest block text-ink/40 mb-1">03</span>
          Security & Protection
        </button>
        <button class="w-full text-left py-3 px-4 border-l-2 border-transparent text-ink/50 hover:text-ink transition-all duration-300 font-medium text-[13px]" data-target="panel-4">
          <span class="mono text-[10px] tracking-widest block text-ink/40 mb-1">04</span>
          Your Rights
        </button>
      </div>
    </div>

    <!-- Content Panels -->
    <div class="col-span-12 md:col-span-8 lg:col-span-9 grid">
      
      <!-- Panel 1 -->
      <div id="panel-1" class="privacy-panel transition-all duration-500 opacity-100 translate-y-0 z-10" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Information Collection</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>When you interact with our storefront, we collect information transparently and only with your consent:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
              <div class="p-5 border border-ink/10 bg-white">
                <div class="mono text-[10px] tracking-widest text-velora mb-2">/ IDENTITY & CONTACT</div>
                <p class="text-[13px]">Name, email address, phone number (used exclusively for shipping updates and order confirmation).</p>
              </div>
              <div class="p-5 border border-ink/10 bg-white">
                <div class="mono text-[10px] tracking-widest text-velora mb-2">/ SHIPPING DATA</div>
                <p class="text-[13px]">Delivery address and postal code to ensure your garments reach you safely.</p>
              </div>
            </div>
            <p class="pt-4 border-t border-ink/10 mt-6">We also collect basic technical data (like IP address) to ensure our website functions securely.</p>
          </div>
        </div>
      </div>

      <!-- Panel 2 -->
      <div id="panel-2" class="privacy-panel transition-all duration-500 opacity-0 translate-y-8 pointer-events-none z-0" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Processing & Usage</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>Your data is processed strictly for fulfilling our obligations to you. We do not engage in behavioral advertising or third-party data brokering.</p>
            <ul class="space-y-4 mt-6">
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>
                  <strong>Order Fulfillment:</strong> Passing your address and contact details to our trusted courier partners (e.g., JNE, Paxel, DHL) for dispatch.
                </div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>
                  <strong>Payment Processing:</strong> Payments are processed securely via Midtrans. We never store or see your full credit card details.
                </div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>
                  <strong>Communication:</strong> Sending you our monthly letter, only if you have explicitly opted in.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Panel 3 -->
      <div id="panel-3" class="privacy-panel transition-all duration-500 opacity-0 translate-y-8 pointer-events-none z-0" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Security & Protection</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>We treat your personal information with the same care as our own garments. Our security measures include:</p>
            <div class="bg-white text-bone p-6 mt-6 space-y-4">
              <div class="border-b border-bone/20 pb-4">
                <div class="mono text-[10px] tracking-widest text-velora mb-1">ENCRYPTION</div>
                <p class="text-[13px] text-ink/80">All traffic between you and our servers is encrypted using industry-standard TLS (Transport Layer Security).</p>
              </div>
              <div class="border-b border-bone/20 pb-4">
                <div class="mono text-[10px] tracking-widest text-velora mb-1">ACCESS CONTROL</div>
                <p class="text-[13px] text-ink/80">Only authorized core staff at the Velora atelier have access to customer data, strictly on a need-to-know basis.</p>
              </div>
              <div>
                <div class="mono text-[10px] tracking-widest text-velora mb-1">DATA RETENTION</div>
                <p class="text-[13px] text-ink/80">We retain your order history for accounting purposes, but guest checkout data is minimized after 6 months.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Panel 4 -->
      <div id="panel-4" class="privacy-panel transition-all duration-500 opacity-0 translate-y-8 pointer-events-none z-0" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Your Rights</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>You remain the sole owner of your data. Under applicable privacy laws, you possess the right to:</p>
            <div class="flex flex-col gap-3 mt-6">
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg></div>
                <div><strong>Access & Portability:</strong> Request a copy of your personal data.</div>
              </div>
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></div>
                <div><strong>Correction:</strong> Request corrections to inaccurate information.</div>
              </div>
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
                <div><strong>Erasure:</strong> Request permanent deletion of your data.</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-32 border-t border-ink/15 pt-8 text-center">
    <div class="mono text-[11px] tracking-[0.25em] text-ink/50 mb-4">/ EXERCISE YOUR RIGHTS</div>
    <a href="mailto:hello.velorastudio19@gmail.com" class="display italic text-[32px] hover:text-velora transition-colors">support@velora.studio</a>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('#privacy-nav button');
    const panels = document.querySelectorAll('.privacy-panel');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Reset all buttons
        buttons.forEach(b => {
          b.classList.remove('border-velora', 'bg-ink/5', 'text-ink');
          b.classList.add('border-transparent', 'text-ink/50');
        });
        
        // Active button
        btn.classList.remove('border-transparent', 'text-ink/50');
        btn.classList.add('border-velora', 'bg-ink/5', 'text-ink');

        // Reset all panels
        panels.forEach(p => {
          p.classList.remove('opacity-100', 'translate-y-0', 'z-10');
          p.classList.add('opacity-0', 'translate-y-8', 'pointer-events-none', 'z-0');
        });

        // Active panel
        const targetId = btn.getAttribute('data-target');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
          targetPanel.classList.remove('opacity-0', 'translate-y-8', 'pointer-events-none', 'z-0');
          targetPanel.classList.add('opacity-100', 'translate-y-0', 'z-10');
        }
      });
    });
  });
</script>
@endsection
