@extends('layouts.velora')

@section('title', 'Shopping Guide — Velora')

@section('content')
<div class="page-enter pt-32 pb-20 px-6 lg:px-10" data-reveal-scope>
  <div class="grid grid-cols-12 gap-6 items-end border-b border-ink/15 pb-10">
    <div class="col-span-12 md:col-span-8">
      <div class="secnum reveal">/ THE GUIDE</div>
      <h1 class="display text-[14vw] md:text-[9vw] leading-[0.9] mt-3 reveal-up-clip">
        How to acquire <br><span class="italic text-velora">our pieces.</span>
      </h1>
    </div>
    <div class="col-span-12 md:col-span-4 reveal">
      <p class="text-[13px] text-ink/70 max-w-sm">
        We dispatch from our atelier in Yogyakarta. Here is a straightforward guide on how to secure your garments, whether through our digital storefront or physical stockists.
      </p>
    </div>
  </div>

  <div class="mt-16 grid grid-cols-12 gap-10 lg:gap-20">
    <!-- ONLINE SHOPPING -->
    <div class="col-span-12 md:col-span-6 reveal">
      <div class="flex items-center justify-between mb-8">
        <h2 class="display text-[42px] leading-none">Online</h2>
        <span class="mono text-[10px] tracking-[0.25em] px-3 py-1 border border-ink/20 rounded-full">WORLDWIDE</span>
      </div>
      
      <div class="space-y-0 border-t border-ink/15">
        
        <!-- Step 1 -->
        <div class="group border-b border-ink/15 py-8 flex flex-col gap-4 transition-colors hover:bg-ink/5">
          <div class="flex gap-6 items-start">
            <div class="mono text-[12px] text-ink/40 mt-1">01</div>
            <div class="flex-1">
              <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Select & Secure</h3>
              <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
                Browse our collections and add desired pieces to your cart. Stock is strictly limited. Adding to cart does not reserve the item — checkout completes the reservation.
              </p>
            </div>
          </div>
          <!-- Visual: Mini Product Selection -->
          <div class="ml-[3.25rem] mt-4 p-4 border border-ink/10 bg-bone max-w-sm flex gap-4 items-center grayscale group-hover:grayscale-0 transition-all duration-500">
            <div class="w-16 h-16 bg-ink/5 flex-shrink-0 flex items-center justify-center overflow-hidden">
              <img src="{{ asset('assets/images/products/product4.png') }}" class="w-full h-full object-cover mix-blend-multiply" alt="Product">
            </div>
            <div class="flex-1">
              <div class="text-[12px] font-medium">Static Curve Tee</div>
              <div class="flex gap-2 mt-2">
                <span class="border border-ink px-2 py-0.5 text-[10px] mono">SIZE M</span>
                <span class="bg-velora text-bone px-2 py-0.5 text-[10px] mono">ADD TO BAG</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="group border-b border-ink/15 py-8 flex flex-col gap-4 transition-colors hover:bg-ink/5">
          <div class="flex gap-6 items-start">
            <div class="mono text-[12px] text-ink/40 mt-1">02</div>
            <div class="flex-1">
              <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Checkout & Payment</h3>
              <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
                Provide your shipping details. We accept major credit cards, GoPay, OVO, and Virtual Accounts via Midtrans. Payment must be completed within 15 minutes.
              </p>
            </div>
          </div>
          <!-- Visual: Mini Checkout Form -->
          <div class="ml-[3.25rem] mt-4 p-4 border border-ink/10 bg-bone max-w-sm grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
            <div class="mono text-[9px] tracking-[0.2em] text-ink/50 mb-3">/ SECURE CHECKOUT</div>
            <div class="space-y-2">
              <div class="h-8 border border-ink/15 w-full flex items-center px-3 text-[10px] text-ink/40">Email Address</div>
              <div class="flex gap-2">
                <div class="h-8 border border-ink/15 w-1/2 flex items-center px-3 text-[10px] text-ink/40">First Name</div>
                <div class="h-8 border border-ink/15 w-1/2 flex items-center px-3 text-[10px] text-ink/40">Last Name</div>
              </div>
              <div class="h-8 bg-ink text-bone w-full flex items-center justify-center text-[10px] mono tracking-widest mt-2">PROCEED TO PAYMENT</div>
            </div>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="group border-b border-ink/15 py-8 flex flex-col gap-4 transition-colors hover:bg-ink/5">
          <div class="flex gap-6 items-start">
            <div class="mono text-[12px] text-ink/40 mt-1">03</div>
            <div class="flex-1">
              <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Dispatch</h3>
              <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
                We pack orders on Wednesdays and dispatch every Thursday. You will receive an email containing your tracking number (AWB) once the courier collects the parcel.
              </p>
            </div>
          </div>
          <!-- Visual: Mini Tracking -->
          <div class="ml-[3.25rem] mt-4 p-4 border border-ink/10 bg-bone max-w-sm opacity-70 group-hover:opacity-100 transition-all duration-500">
            <div class="flex items-center justify-between border-b border-ink/10 pb-2 mb-2">
              <span class="mono text-[10px] tracking-widest">ORDER VL-8921</span>
              <span class="text-[10px] bg-green-900 text-green-100 px-2 py-0.5 rounded-full">DISPATCHED</span>
            </div>
            <div class="text-[11px] text-ink/60 font-mono">AWB: JX8829100293</div>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="group border-b border-ink/15 py-8 flex gap-6 items-start transition-colors hover:bg-ink/5">
          <div class="mono text-[12px] text-ink/40 mt-1">04</div>
          <div>
            <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Arrival</h3>
            <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
              Domestic shipments usually take 2-4 working days. International orders may take 7-14 days and may incur local customs duties.
            </p>
          </div>
        </div>

      </div>

      <div class="mt-8">
        <a href="{{ route('shop') }}" class="btn-mag border border-ink px-6 py-4 text-[11px] mono tracking-[0.25em] inline-block bg-ink text-bone hover:bg-transparent hover:text-ink transition-colors">START SHOPPING →</a>
      </div>
    </div>

    <!-- OFFLINE SHOPPING -->
    <div class="col-span-12 md:col-span-6 reveal" style="transition-delay: 150ms">
      <div class="flex items-center justify-between mb-8">
        <h2 class="display text-[42px] leading-none">Offline</h2>
        <span class="mono text-[10px] tracking-[0.25em] px-3 py-1 border border-ink/20 rounded-full">YOGYAKARTA</span>
      </div>

      <div class="space-y-0 border-t border-ink/15">
        
        <!-- Step 1 -->
        <div class="group border-b border-ink/15 py-6 flex gap-6 items-start transition-colors hover:bg-ink/5">
          <div class="mono text-[12px] text-ink/40 mt-1">01</div>
          <div>
            <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Find a Stockist</h3>
            <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
              We do not operate our own flagship store. Our pieces are available exclusively through our curated partner stockists in Yogyakarta and Jakarta.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="group border-b border-ink/15 py-6 flex gap-6 items-start transition-colors hover:bg-ink/5">
          <div class="mono text-[12px] text-ink/40 mt-1">02</div>
          <div>
            <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Visit & Fit</h3>
            <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
              Visit the stockist to see the garments in person. Trying on the pieces is highly encouraged, as our sizing follows a specific boxy and cropped silhouette.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="group border-b border-ink/15 py-6 flex gap-6 items-start transition-colors hover:bg-ink/5">
          <div class="mono text-[12px] text-ink/40 mt-1">03</div>
          <div>
            <h3 class="display text-[28px] italic leading-none group-hover:text-velora transition-colors">Purchase</h3>
            <p class="mt-3 text-[13px] text-ink/70 leading-relaxed max-w-md">
              Complete your transaction directly with the stockist staff. Note that stockist prices are identical to our online prices, but promotional codes cannot be applied.
            </p>
          </div>
        </div>

      </div>

      <div class="mt-8 p-6 bg-ink/5 border border-ink/10">
        <h4 class="mono text-[10px] tracking-[0.25em] text-ink/50 mb-3">/ CURRENT STOCKISTS</h4>
        <ul class="space-y-3">
          <li class="flex justify-between items-center border-b border-ink/10 pb-2">
            <span class="text-[14px]">The Slow Store</span>
            <span class="mono text-[10px] tracking-[0.2em] text-ink/50">YOGYAKARTA</span>
          </li>
          <li class="flex justify-between items-center border-b border-ink/10 pb-2">
            <span class="text-[14px]">Artikel & Co.</span>
            <span class="mono text-[10px] tracking-[0.2em] text-ink/50">JAKARTA SELATAN</span>
          </li>
        </ul>
        <div class="mt-6">
          <a href="{{ route('stockists') }}" class="ink-link mono text-[10px] tracking-[0.25em]">VIEW FULL ADDRESSES →</a>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-24 border-t border-ink/15 pt-8 text-center reveal">
    <div class="mono text-[11px] tracking-[0.25em] text-ink/50 mb-4">/ NEED FURTHER ASSISTANCE?</div>
    <a href="mailto:hello.velorastudio19@gmail.com" class="display italic text-[32px] hover:text-velora transition-colors">support@velora.studio</a>
  </div>
</div>
@endsection
