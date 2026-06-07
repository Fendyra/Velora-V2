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
      <div class="mono text-[10px] tracking-[0.25em] text-ink/50 mt-6">/ LAST UPDATED: 02 JUNE 2026</div>
    </div>
    <div class="col-span-12 md:col-span-4 mb-2">
      <p class="text-[13px] text-ink/70 max-w-sm">
        Velora is fully committed to protecting the privacy and security of your personal data. This Privacy Policy explains how we collect, use, store, and protect your information when using the Velora e-commerce platform.
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
            <p>When you interact with Velora services, we collect the following types of information:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
              <div class="p-5 border border-ink/10 bg-white">
                <div class="mono text-[10px] tracking-widest text-velora mb-2">/ ACCOUNT & PROFILE DATA</div>
                <p class="text-[13px]">Full name and email address obtained automatically when you register or log in using the Google account authentication feature (Single Sign-On).</p>
              </div>
              <div class="p-5 border border-ink/10 bg-white">
                <div class="mono text-[10px] tracking-widest text-velora mb-2">/ TRANSACTION & SHIPPING DATA</div>
                <p class="text-[13px]">Shipping address, phone number, and order details of the clothing products you purchase through our platform.</p>
              </div>
            </div>
            <p class="pt-4 border-t border-ink/10 mt-6"><strong>Technical & Tracking Data:</strong> IP address, browser type, device used, and interaction history (such as clicks, products viewed, and visit duration) recorded automatically through third-party analytics services (Google Analytics).</p>
          </div>
        </div>
      </div>

      <!-- Panel 2 -->
      <div id="panel-2" class="privacy-panel transition-all duration-500 opacity-0 translate-y-8 pointer-events-none z-0" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Processing & Usage</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>The collected data is used solely for the operational and development purposes of the platform, including:</p>
            <ul class="space-y-4 mt-6">
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>Processing orders, verifying payment status, and arranging the delivery of goods to your address.</div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>Providing quick, efficient, and secure login access without requiring manual password creation.</div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>Analyzing visitor behavior to improve the website interface, catalog layout, and Velora's fashion product marketing strategies.</div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div>Preventing fraudulent activities, maintaining website system security, and complying with applicable legal obligations.</div>
              </li>
            </ul>

            <h3 class="font-bold text-[16px] mt-8 mb-2">Data Sharing with Third Parties</h3>
            <p>Velora does not sell or rent your personal data. However, to ensure the system runs as intended, we share specific data with the following third-party services:</p>
            <ul class="space-y-4 mt-4">
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div><strong>Google (OAuth & Analytics):</strong> To manage third-party login access and process aggregate visit analytics without revealing individual identities directly.</div>
              </li>
              <li class="flex gap-4 items-start">
                <div class="w-1.5 h-1.5 rounded-full bg-velora mt-2 shrink-0"></div>
                <div><strong>Payment Gateways (Midtrans/Xendit):</strong> We send billing details (such as name, email, and payment amount) to the payment gateway system to process billing creation (Virtual Account or other methods). Velora never stores users' bank account or credit/debit card numbers on our servers.</div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Panel 3 -->
      <div id="panel-3" class="privacy-panel transition-all duration-500 opacity-0 translate-y-8 pointer-events-none z-0" style="grid-area: 1 / 1;">
        <div class="bg-ivory p-8 md:p-12 border border-ink/10 h-full flex flex-col">
          <h2 class="display text-[32px] md:text-[42px] leading-none mb-6">Storage & Security</h2>
          <div class="text-[14px] text-ink/80 leading-relaxed max-w-2xl space-y-4">
            <p>All user operational data is stored centrally in our Virtual Private Server (VPS).</p>
            <div class="bg-white text-bone p-6 mt-6 space-y-4">
              <div class="border-b border-bone/20 pb-4">
                <div class="mono text-[10px] tracking-widest text-velora mb-1">ENCRYPTION PROTOCOLS</div>
                <p class="text-[13px] text-ink/80">We implement SSL/HTTPS security encryption protocols to ensure that data transmission between the device you use and the Velora server system runs securely and is protected from interception by unauthorized parties.</p>
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
            <p>As a user of the Velora platform, you have the right to:</p>
            <div class="flex flex-col gap-3 mt-6">
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg></div>
                <div>Request a copy of your personal data stored in our system.</div>
              </div>
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></div>
                <div>Update your shipping address or contact information at any time through your profile dashboard.</div>
              </div>
              <div class="flex items-center gap-4 p-4 border border-ink/10 bg-white">
                <div class="text-velora"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
                <div>Request deletion of your account and order history data from Velora's database by contacting our support service.</div>
              </div>
            </div>

            <h3 class="font-bold text-[16px] mt-8 mb-2">Changes to Privacy Policy</h3>
            <p>Velora reserves the right to update this Privacy Policy from time to time to adapt to operational or regulatory changes. Any changes will be informed on this page along with an updated revision date at the top of the document.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-32 border-t border-ink/15 pt-8 text-center">
    <div class="mono text-[11px] tracking-[0.25em] text-ink/50 mb-4">/ EXERCISE YOUR RIGHTS</div>
    <a href="mailto:hello.velorastudio19@gmail.com" class="display italic text-[32px] hover:text-velora transition-colors">hello.velorastudio19@gmail.com</a>
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
