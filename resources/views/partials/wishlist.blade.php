@php
  use App\Support\VeloraCatalog;
  $items = $veloraWishlistItems ?? [];
@endphp

<div class="fixed inset-0 z-[60] hidden" data-drawer="wishlist">
  <div class="absolute inset-0 bg-ink/40 overlay-in" data-drawer-overlay></div>
  <aside class="absolute right-0 top-0 bottom-0 w-full max-w-[460px] bg-bone drawer-in flex flex-col">
    <div class="px-6 py-5 flex items-center justify-between border-b border-ink/10">
      <div>
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50">/ WISHLIST</div>
        <div class="display text-[28px] leading-none mt-1">
          <span>Saved </span>
          <span class="italic">— {{ count($items) }}</span>
        </div>
      </div>
      <button type="button" class="w-9 h-9 grid place-items-center border border-ink/20 rounded-full hover:bg-ink hover:text-bone transition-colors" data-close-drawer>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.6"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>
    </div>

    @if (count($items) === 0)
      <div class="flex-1 grid place-items-center px-8 text-center">
        <div>
          <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.4" class="mx-auto text-ink/30"><path d="M12 21s-7-4.5-9.5-9C1 9 2.5 5 6.5 5 9 5 10.5 6.5 12 8.5 13.5 6.5 15 5 17.5 5c4 0 5.5 4 4 7-2.5 4.5-9.5 9-9.5 9z"/></svg>
          <div class="display text-[42px] italic leading-none mt-4">Nothing saved.</div>
          <p class="mt-3 text-[14px] text-ink/60">Tap the heart on any piece to keep it close.</p>
          <a href="{{ route('shop') }}" class="mt-8 inline-block btn-mag px-6 py-3 border border-ink text-[12px] mono tracking-[0.2em]">BROWSE THE SHOP →</a>
        </div>
      </div>
    @else
      <div class="flex-1 overflow-y-auto px-6 py-4 divide-y divide-ink/8">
        @foreach ($items as $it)
          <div class="py-5 flex gap-4 group">
            <a href="{{ route('product', ['id' => $it['id']]) }}" class="w-20 h-24 bg-mist img-zoom shrink-0 overflow-hidden">
              <img src="{{ $it['image'] }}" alt="{{ $it['name'] }}" class="w-full h-full object-contain p-2" />
            </a>
            <div class="flex-1 flex flex-col">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <div class="text-[14px] font-medium">{{ $it['name'] }}</div>
                  <div class="mono text-[10px] tracking-[0.2em] text-ink/50 mt-1">{{ $it['id'] }} · {{ strtoupper($it['collection']) }}</div>
                </div>
                <form method="POST" action="{{ route('wishlist.remove') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $it['id'] }}" />
                  <button class="text-ink/40 hover:text-velora transition-colors" title="Remove" type="submit">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" strokeWidth="1.4"><path d="M12 21s-7-4.5-9.5-9C1 9 2.5 5 6.5 5 9 5 10.5 6.5 12 8.5 13.5 6.5 15 5 17.5 5c4 0 5.5 4 4 7-2.5 4.5-9.5 9-9.5 9z"/></svg>
                  </button>
                </form>
              </div>
              <div class="mt-auto flex items-center justify-between gap-3">
                <div class="mono text-[13px]">{{ VeloraCatalog::fmtIDR((int) $it['price']) }}</div>
                <form method="POST" action="{{ route('wishlist.move') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $it['id'] }}" />
                  <button class="text-[11px] mono tracking-[0.2em] px-3 py-1.5 border border-ink hover:bg-ink hover:text-bone transition-colors" type="submit">MOVE TO BAG →</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

    @if (count($items) > 0)
      <div class="border-t border-ink/10 p-6">
        <form method="POST" action="{{ route('wishlist.moveAll') }}">
          @csrf
          <button class="w-full btn-mag border border-ink py-3.5 text-[12px] mono tracking-[0.25em]" type="submit">MOVE ALL TO BAG →</button>
        </form>
        <button type="button" class="mt-3 w-full text-[12px] mono tracking-[0.2em] text-ink/50 ink-link" data-close-drawer>CONTINUE LOOKING</button>
      </div>
    @endif
  </aside>
</div>
