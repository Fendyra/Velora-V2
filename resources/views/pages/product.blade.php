@php
  use App\Support\VeloraCatalog;
  $p = $product;
  
  if ($p['id'] === 'V04') {
      $galleryImgs = [
          '/assets/images/products/product1-front.png',
          '/assets/images/products/product1-back.png',
          '/assets/images/products/product1-mockup1.png',
          '/assets/images/products/product1-mockup2.png',
      ];
  } else {
      $galleryImgs = [
          $p['image'], 
          '/assets/images/home/landingpage/model2.jpg', 
          '/assets/images/home/landingpage/model3.jpg', 
          '/assets/images/atelier/pattern.png'
      ];
  }

  $allSizes = ['XS', 'S', 'M', 'L', 'XL'];
  $colorSwatch = ['Bone' => '#F1ECE2', 'Ink' => '#0B0B10', 'Sand' => '#C9BFA8'];
@endphp

@extends('layouts.velora')

@section('title', $p['name'] . ' — Velora')

@section('content')
<div class="page-enter pt-24 pb-20" data-reveal-scope>
  <div class="px-6 lg:px-10 mono text-[11px] tracking-[0.25em] text-ink/50 flex items-center gap-2">
    <a href="{{ route('home') }}" class="ink-link">HOME</a>
    <span>/</span>
    <a href="{{ route('shop') }}" class="ink-link">SHOP</a>
    <span>/</span>
    <span class="text-ink">{{ $p['id'] }}</span>
  </div>

  <div class="grid grid-cols-12 gap-6 px-6 lg:px-10 mt-8">
    <div class="col-span-12 lg:col-span-7">
      <div class="grid grid-cols-12 gap-3">
        <script type="application/json" data-gallery-images>{!! json_encode($galleryImgs) !!}</script>
        <div class="col-span-12 md:col-span-2 order-2 md:order-1">
          <div class="flex md:flex-col gap-2 overflow-x-auto no-scrollbar md:max-h-[80vh]">
            @foreach ($galleryImgs as $i => $img)
              <button type="button" data-gallery-thumb="{{ $i }}"
                class="shrink-0 w-20 md:w-full aspect-square bg-mist img-zoom overflow-hidden border-2 transition-all {{ $i === 0 ? 'border-velora' : 'border-transparent' }}">
                <img src="{{ $img }}" class="w-full h-full object-contain p-2" />
              </button>
            @endforeach
          </div>
        </div>

        <div class="col-span-12 md:col-span-10 order-1 md:order-2 relative aspect-[3/4] bg-mist overflow-hidden img-zoom">
          <img src="{{ $galleryImgs[0] }}" data-gallery-main-img class="w-full h-full object-contain p-8 transition-transform duration-500" />
          <div class="absolute top-4 left-4 mono text-[10px] tracking-[0.25em] text-ink/60" data-gallery-count>/ 01 of {{ str_pad((string) count($galleryImgs), 2, '0', STR_PAD_LEFT) }}</div>

          <form method="POST" action="{{ route('wishlist.toggle') }}" class="absolute top-4 right-4">
            @csrf
            <input type="hidden" name="id" value="{{ $p['id'] }}" />
            <button class="w-10 h-10 grid place-items-center rounded-full bg-bone/80 backdrop-blur-md hover:bg-ink hover:text-bone transition-colors" type="submit">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="{{ $inWishlist ? 'currentColor' : 'none' }}" stroke="currentColor" strokeWidth="1.6"><path d="M12 21s-7-4.5-9.5-9C1 9 2.5 5 6.5 5 9 5 10.5 6.5 12 8.5 13.5 6.5 15 5 17.5 5c4 0 5.5 4 4 7-2.5 4.5-9.5 9-9.5 9z"/></svg>
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-span-12 lg:col-span-5 lg:pl-8 lg:sticky lg:top-24 self-start">
      <div class="mono text-[10px] tracking-[0.25em] text-ink/50 reveal">{{ strtoupper($p['collection']) }} · {{ $p['id'] }}</div>
      <h1 class="display text-[7vw] lg:text-[4vw] leading-none mt-3 reveal text-velora">{{ $p['name'] }}</h1>
      <div class="mt-4 flex items-baseline gap-3 reveal">
        <div class="display text-[28px]">{{ VeloraCatalog::fmtIDR((int) $p['price']) }}</div>
        <span class="mono text-[11px] tracking-[0.25em] text-ink/50">VAT incl.</span>
      </div>
      <p class="mt-6 text-[14px] leading-relaxed text-ink/80 max-w-md reveal">
        {{ $p['description'] }}
      </p>

      <form method="POST" action="{{ route('cart.add') }}" class="mt-8" data-product-form data-unit-price="{{ (int) $p['price'] }}">
        @csrf
        <input type="hidden" name="id" value="{{ $p['id'] }}" />



        <div class="mt-8 reveal">
          <div class="flex items-center justify-between mb-3">
            <div class="mono text-[10px] tracking-[0.25em] text-ink/60">/ SIZE</div>
            <button class="ink-link text-[11px] mono tracking-[0.25em] text-ink/60" type="button" data-open-modal="size-guide">SIZE GUIDE →</button>
          </div>
          <div class="grid grid-cols-5 gap-2" id="size-picker-container">
            @foreach ($allSizes as $s)
              @php $avail = in_array($s, $p['sizes'], true); @endphp
              <label class="{{ $avail ? 'cursor-pointer' : '' }}">
                <input type="radio" name="size" value="{{ $s }}" data-size-radio class="sr-only" {{ $s === $defaultSize ? 'checked' : '' }} {{ $avail ? '' : 'disabled' }} />
                <span data-size-label class="block text-center py-3 text-[12px] mono tracking-wide border transition-all {{ $s === $defaultSize ? 'bg-ink text-bone border-ink' : ($avail ? 'border-ink/15 hover:border-ink' : 'border-ink/8 text-ink/25 line-through cursor-not-allowed') }}">
                  {{ $s }}
                </span>
              </label>
            @endforeach
          </div>
          
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              const radios = document.querySelectorAll('input[data-size-radio]');
              radios.forEach(radio => {
                radio.addEventListener('change', function() {
                  radios.forEach(r => {
                    if (!r.disabled) {
                      const label = r.nextElementSibling;
                      label.classList.remove('bg-ink', 'text-bone', 'border-ink');
                      label.classList.add('border-ink/15', 'hover:border-ink');
                    }
                  });
                  if (this.checked) {
                    const activeLabel = this.nextElementSibling;
                    activeLabel.classList.remove('border-ink/15', 'hover:border-ink');
                    activeLabel.classList.add('bg-ink', 'text-bone', 'border-ink');
                  }
                });
              });
            });
          </script>
        </div>

        <div class="mt-8 reveal">
          <div class="mono text-[10px] tracking-[0.25em] text-ink/60 mb-3">/ QUANTITY</div>
          <div class="inline-flex items-center border border-ink/20 rounded-full" data-qty>
            <button type="button" data-qty-dec class="w-10 h-10 grid place-items-center hover:text-velora">−</button>
            <span class="mono text-[14px] w-8 text-center" data-qty-label>1</span>
            <button type="button" data-qty-inc class="w-10 h-10 grid place-items-center hover:text-velora">+</button>
            <input type="hidden" name="qty" value="1" data-qty-input />
          </div>
        </div>

        <div class="mt-10 flex gap-3 reveal">
          <button class="flex-1 btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] relative overflow-hidden" type="submit" data-add-button>
            ADD TO BAG — {{ VeloraCatalog::fmtIDR((int) $p['price']) }}
          </button>
        </div>
      </form>

      <div class="mt-5 flex items-center gap-6 text-[12px] text-ink/60">
        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600 pingdot"></span>In stock</span>
        <span>Ships Thursdays · Yogyakarta</span>
      </div>

      <div class="mt-10 border-t border-ink/10">
        @foreach ([
          ['k' => 'details', 'l' => 'Details & composition', 't' => $p['details']],
          ['k' => 'care', 'l' => 'Care', 't' => $p['care_instructions']],
          ['k' => 'shipping', 'l' => 'Shipping & returns', 't' => $p['shipping_returns']],
        ] as $i => $x)
          <div class="border-b border-ink/10" data-accordion-item>
            <button type="button" class="w-full flex items-center justify-between py-4 text-left text-[14px]" data-accordion-toggle>
              <span>{{ $x['l'] }}</span>
              <span class="transition-transform duration-500" data-accordion-icon>+</span>
            </button>
            <div class="overflow-hidden transition-all duration-500 {{ $i === 0 ? 'max-h-48 opacity-100 pb-4' : 'max-h-0 opacity-0' }}" data-accordion-panel>
              <p class="text-[13px] text-ink/70 leading-relaxed">{{ $x['t'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  
  <section class="mt-24 px-6 lg:px-10">
    <div class="flex items-end justify-between mb-2">
      <div>
        <div class="secnum reveal">/ ALSO CONSIDERED</div>
        <h3 class="display text-[8vw] lg:text-[5vw] leading-none mt-3 reveal-up-clip">Pieces that pair.</h3>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-12">
      @foreach ($related as $i => $rp)
        <a href="{{ route('product', ['id' => $rp['id']]) }}" class="group text-left reveal" style="transition-delay: {{ $i * 80 }}ms">
          <div class="relative aspect-[3/4] bg-mist img-zoom overflow-hidden">
            <img src="{{ $rp['image'] }}" class="w-full h-full object-contain p-6" />
          </div>
          <div class="mt-2 flex items-start justify-between">
            <div class="text-[14px]">{{ $rp['name'] }}</div>
            <div class="mono text-[12px]">{{ VeloraCatalog::fmtIDR((int) $rp['price']) }}</div>
          </div>
        </a>
      @endforeach
    </div>
  </section>
</div>

@include('partials.size-guide')

@endsection
