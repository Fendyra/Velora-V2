@php
  use App\Support\VeloraCatalog;

  $items = $items ?? ($veloraCartItems ?? []);
  $subtotal = array_reduce($items, fn (int $sum, array $it) => $sum + ((int) $it['price'] * (int) $it['qty']), 0);
  $shippingOptions = [
    ['id' => 'regular', 'label' => 'Regular (3–5 days)', 'fee' => 35000],
    ['id' => 'express', 'label' => 'Express (1–2 days)', 'fee' => 65000],
  ];
@endphp

@extends('layouts.velora')

@section('title', 'Checkout — Velora')

@section('content')
<div class="page-enter pt-28 pb-20" data-reveal-scope>
  <section class="px-6 lg:px-10">
    <div class="flex items-end justify-between">
      <div>
        <div class="secnum reveal">/ CHECKOUT</div>
        <h1 class="display text-[12vw] md:text-[9vw] leading-[0.92] mt-3 reveal-up-clip">Quiet <span class="italic text-velora">finish.</span></h1>
      </div>
      <div class="hidden md:block text-right reveal">
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ TOTAL</div>
        <div class="display text-[36px] leading-none mt-1" data-checkout-total>{{ VeloraCatalog::fmtIDR($subtotal + 35000) }}</div>
      </div>
    </div>
  </section>

  @if (count($items) === 0)
    <section class="px-6 lg:px-10 mt-16">
      <div class="py-28 text-center">
        <div class="display text-[8vw] italic">Empty bag.</div>
        <p class="text-[14px] text-ink/60 mt-4">Add a piece first, then return here.</p>
        <a href="{{ route('shop') }}" class="mt-10 inline-block btn-mag border border-ink px-7 py-4 text-[12px] mono tracking-[0.25em]">ENTER THE SHOP →</a>
      </div>
    </section>
  @else
    <section class="px-6 lg:px-10 mt-12">
      <div class="grid grid-cols-12 gap-10 items-start">

        <div class="col-span-12 lg:col-span-7">
          <div class="border border-ink/10">
            <div class="px-6 py-5 border-b border-ink/10">
              <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ STEPS</div>
              <div class="mt-4 grid grid-cols-3 gap-2" data-checkout-steps>
                @foreach ([['n' => 1, 'l' => 'Contact'], ['n' => 2, 'l' => 'Shipping'], ['n' => 3, 'l' => 'Payment']] as $i => $s)
                  <button type="button"
                    class="w-full px-4 py-3 border text-left flex items-center justify-between gap-3 transition-colors {{ $i === 0 ? 'bg-ink text-bone border-ink' : 'border-ink/15 hover:border-ink' }}"
                    data-step-btn="{{ $i }}">
                    <span class="mono text-[10px] tracking-[0.25em]">0{{ $s['n'] }}</span>
                    <span class="text-[13px]">{{ $s['l'] }}</span>
                  </button>
                @endforeach
              </div>
            </div>

            <form method="POST" action="{{ route('checkout.complete') }}" class="p-6" data-checkout-form>
              @csrf

              <div data-step-panel="0">
                <div class="grid grid-cols-2 gap-4">
                  <div class="col-span-2">
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">EMAIL</label>
                    <input required type="email" name="email" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="you@domain.com" />
                  </div>
                  <div>
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">FIRST NAME</label>
                    <input required type="text" name="firstName" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="Raka" />
                  </div>
                  <div>
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">LAST NAME</label>
                    <input required type="text" name="lastName" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="Prakoso" />
                  </div>
                  <div class="col-span-2">
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">PHONE</label>
                    <input required type="tel" name="phone" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="+62 812 3456 7890" />
                  </div>
                </div>

                <div class="mt-8 flex justify-end">
                  <button type="button" class="btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]" data-next-step>CONTINUE →</button>
                </div>
              </div>

              <div class="hidden" data-step-panel="1">
                <div class="grid grid-cols-2 gap-4">
                  <div class="col-span-2">
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">ADDRESS</label>
                    <input required type="text" name="address" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="Jl. Setiabudi 24" />
                  </div>
                  <div>
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">CITY</label>
                    <input required type="text" name="city" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="Bandung" />
                  </div>
                  <div>
                    <label class="mono text-[10px] tracking-[0.25em] text-ink/60">POSTCODE</label>
                    <input required type="text" name="postcode" class="mt-2 w-full border border-ink/15 px-4 py-3 outline-none focus:border-ink" placeholder="40141" />
                  </div>
                </div>

                <div class="mt-8">
                  <div class="mono text-[10px] tracking-[0.25em] text-ink/60 mb-3">/ SHIPPING METHOD</div>
                  <div class="space-y-2">
                    @foreach ($shippingOptions as $i => $o)
                      <label class="flex items-center justify-between gap-4 border border-ink/15 px-4 py-3 cursor-pointer hover:border-ink transition-colors">
                        <span class="flex items-center gap-3">
                          <input type="radio" name="shipping" value="{{ $o['id'] }}" data-ship-fee="{{ $o['fee'] }}" {{ $i === 0 ? 'checked' : '' }}>
                          <span class="text-[13px]">{{ $o['label'] }}</span>
                        </span>
                        <span class="mono text-[12px]">{{ VeloraCatalog::fmtIDR($o['fee']) }}</span>
                      </label>
                    @endforeach
                  </div>
                </div>

                <div class="mt-8 flex items-center justify-between">
                  <button type="button" class="text-[12px] mono tracking-[0.25em] ink-link" data-prev-step>← BACK</button>
                  <button type="button" class="btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]" data-next-step>CONTINUE →</button>
                </div>
              </div>

              <div class="hidden" data-step-panel="2">
                <div class="mono text-[10px] tracking-[0.25em] text-ink/60 mb-3">/ PAYMENT METHOD</div>
                <div class="border border-ink/15 px-6 py-8 text-center bg-mist/30">
                  <p class="text-[14px] text-ink/80 mb-4">You will be redirected to Midtrans Secure Payment Gateway to complete your purchase safely.</p>
                  <p class="text-[12px] text-ink/60 mb-6">Supports Credit Card, GoPay, ShopeePay, Virtual Accounts, and more.</p>
                </div>

                <div class="mt-8 flex items-center justify-between">
                  <button type="button" class="text-[12px] mono tracking-[0.25em] ink-link" data-prev-step>← BACK</button>
                  <button type="submit" class="btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]" data-pay>PROCEED TO PAYMENT →</button>
                </div>
              </div>

              <input type="hidden" name="subtotal" value="{{ $subtotal }}" />
            </form>
          </div>
        </div>

        <aside class="col-span-12 lg:col-span-5 border border-ink/10 p-6 lg:sticky lg:top-24">
          <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ ORDER SUMMARY</div>
          <div class="mt-6 space-y-4">
            @foreach ($items as $it)
              <div class="flex items-start gap-4">
                <div class="w-16 h-20 bg-mist img-zoom shrink-0">
                  <img src="{{ $it['image'] }}" class="w-full h-full object-contain p-2" />
                </div>
                <div class="flex-1">
                  <div class="text-[14px] font-medium">{{ $it['name'] }}</div>
                  <div class="mono text-[10px] tracking-[0.2em] text-ink/50 mt-1">{{ $it['id'] }} · SIZE {{ $it['size'] }} · {{ $it['color'] }} · QTY {{ $it['qty'] }}</div>
                </div>
                <div class="mono text-[12px] whitespace-nowrap">{{ VeloraCatalog::fmtIDR((int) $it['price'] * (int) $it['qty']) }}</div>
              </div>
            @endforeach
          </div>

          <div class="mt-8 border-t border-ink/10 pt-5 space-y-2">
            <div class="flex items-center justify-between">
              <span class="mono text-[10px] tracking-[0.25em] text-ink/50">/ SUBTOTAL</span>
              <span class="mono text-[12px]">{{ VeloraCatalog::fmtIDR($subtotal) }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="mono text-[10px] tracking-[0.25em] text-ink/50">/ SHIPPING</span>
              <span class="mono text-[12px]" data-ship-label>{{ VeloraCatalog::fmtIDR(35000) }}</span>
            </div>
            <div class="flex items-center justify-between pt-2 border-t border-ink/10">
              <span class="mono text-[10px] tracking-[0.25em] text-ink/50">/ TOTAL</span>
              <span class="display text-[28px] leading-none" data-total-label>{{ VeloraCatalog::fmtIDR($subtotal + 35000) }}</span>
            </div>
          </div>

          <div class="mt-6 text-[11px] text-ink/50">
            By placing this order, you agree to our <a href="{{ route('terms') }}" class="ink-link">terms</a>.
          </div>
        </aside>
      </div>
    </section>

    <div class="fixed inset-0 z-[70] hidden" data-checkout-overlay>
      <div class="absolute inset-0 bg-ink/60"></div>
      <div class="absolute inset-0 grid place-items-center text-bone">
        <div class="text-center">
          <div class="display text-[56px] italic leading-none">Processing</div>
          <div class="mono text-[11px] tracking-[0.25em] text-bone/70 mt-3">PLEASE WAIT</div>
        </div>
      </div>
    </div>

    <script type="application/json" data-checkout-config>{!! json_encode(['subtotal' => $subtotal], JSON_UNESCAPED_SLASHES) !!}</script>
  @endif
</div>
@endsection
