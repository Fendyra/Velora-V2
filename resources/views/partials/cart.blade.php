@php
  use App\Support\VeloraCatalog;
  $items = $veloraCartItems ?? [];
  $subtotal = array_reduce($items, fn (int $sum, array $it) => $sum + ((int) $it['price'] * (int) $it['qty']), 0);
@endphp

<div class="fixed inset-0 z-[60] hidden" data-drawer="cart">
  <div class="absolute inset-0 bg-ink/40 overlay-in" data-drawer-overlay></div>
  <aside class="absolute right-0 top-0 bottom-0 w-full max-w-[460px] bg-bone drawer-in flex flex-col">
    <div class="px-6 py-5 flex items-center justify-between border-b border-ink/10">
      <div>
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ YOUR BAG</div>
        <div class="display text-[28px] leading-none mt-1">{{ count($items) }} {{ count($items) === 1 ? 'piece' : 'pieces' }}</div>
      </div>
      <button type="button" class="w-9 h-9 grid place-items-center border border-ink/20 rounded-full hover:bg-ink hover:text-bone transition-colors" data-close-drawer>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </div>

    @if (count($items) === 0)
      <div class="flex-1 grid place-items-center px-8 text-center">
        <div>
          <div class="display text-[42px] italic leading-none">Empty.</div>
          <p class="mt-3 text-[14px] text-ink/60">No pieces yet — a quiet, considered start.</p>
          <a href="{{ route('shop') }}" class="mt-8 inline-block btn-mag px-6 py-3 border border-ink text-[12px] mono tracking-[0.2em]">ENTER THE SHOP →</a>
        </div>
      </div>
    @else
      <div class="flex-1 overflow-y-auto px-6 py-4 divide-y divide-ink/8">
        @foreach ($items as $idx => $it)
          <div class="py-5 flex gap-4 items-center">
            <input type="checkbox" value="{{ $it['key'] }}" class="cart-item-checkbox w-4 h-4 accent-ink cursor-pointer shrink-0" data-price="{{ (int) $it['price'] * (int) $it['qty'] }}" checked onchange="updateCartSubtotal()" />
            <div class="w-20 h-24 bg-mist img-zoom shrink-0">
              <img src="{{ $it['image'] }}" alt="{{ $it['name'] }}" class="w-full h-full object-contain p-2" />
            </div>
            <div class="flex-1 flex flex-col">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <div class="text-[14px] font-medium">{{ $it['name'] }}</div>
                  <div class="mono text-[10px] tracking-[0.2em] text-ink/50 mt-1">{{ $it['id'] }} · SIZE {{ $it['size'] }} · {{ $it['color'] }}</div>
                </div>
                <form method="POST" action="{{ route('cart.remove') }}">
                  @csrf
                  <input type="hidden" name="key" value="{{ $it['key'] }}" />
                  <button class="text-[11px] mono tracking-[0.15em] text-ink/50 ink-link" type="submit">REMOVE</button>
                </form>
              </div>
              <div class="mt-auto flex items-center justify-between">
                <div class="flex items-center gap-3 border border-ink/15 rounded-full px-3 py-1">
                  <form method="POST" action="{{ route('cart.update') }}">
                    @csrf
                    <input type="hidden" name="key" value="{{ $it['key'] }}" />
                    <input type="hidden" name="delta" value="-1" />
                    <button class="text-ink/70 hover:text-velora" type="submit">−</button>
                  </form>
                  <span class="mono text-[12px] w-4 text-center">{{ $it['qty'] }}</span>
                  <form method="POST" action="{{ route('cart.update') }}">
                    @csrf
                    <input type="hidden" name="key" value="{{ $it['key'] }}" />
                    <input type="hidden" name="delta" value="1" />
                    <button class="text-ink/70 hover:text-velora" type="submit">+</button>
                  </form>
                </div>
                <div class="mono text-[13px]">{{ VeloraCatalog::fmtIDR((int) $it['price'] * (int) $it['qty']) }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    @if (count($items) > 0)
      <div class="border-t border-ink/10 p-6">
        <div class="flex items-baseline justify-between">
          <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ SUBTOTAL</div>
          <div class="display text-[28px] leading-none" id="cart-subtotal-display">{{ VeloraCatalog::fmtIDR($subtotal) }}</div>
        </div>
        <p class="text-[11px] text-ink/50 mt-1">Shipping and duties calculated at checkout.</p>
        
        <form id="cart-checkout-form" method="POST" action="{{ route('cart.checkout.prepare') }}" class="hidden">
            @csrf
        </form>

        <button type="button" onclick="submitCheckout()" class="mt-5 w-full btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] flex items-center justify-center gap-3">CHECKOUT →</button>
        <button type="button" class="mt-3 w-full text-[12px] mono tracking-[0.2em] text-ink/50 ink-link" data-close-drawer>CONTINUE LOOKING</button>
      </div>
    @endif
  </aside>
</div>

<script>
function updateCartSubtotal() {
    const checkboxes = document.querySelectorAll('.cart-item-checkbox:checked');
    let sum = 0;
    checkboxes.forEach(cb => {
        sum += parseInt(cb.getAttribute('data-price') || 0);
    });
    
    const subtotalEl = document.getElementById('cart-subtotal-display');
    if (subtotalEl) {
        subtotalEl.innerText = 'IDR ' + sum.toLocaleString('id-ID').replace(/,/g, '.');
    }
}

function submitCheckout() {
    const form = document.getElementById('cart-checkout-form');
    const checkboxes = document.querySelectorAll('.cart-item-checkbox:checked');
    
    if (checkboxes.length === 0) {
        alert('Please select at least one item to checkout.');
        return;
    }
    
    // Clear old hidden inputs except csrf
    const csrfToken = form.querySelector('input[name="_token"]').value;
    form.innerHTML = '<input type="hidden" name="_token" value="' + csrfToken + '" />';
    
    checkboxes.forEach(cb => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'selected_items[]';
        input.value = cb.value;
        form.appendChild(input);
    });
    
    form.submit();
}
</script>
