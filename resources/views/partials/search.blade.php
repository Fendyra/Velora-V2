<div data-drawer="search" class="fixed inset-0 z-[100] hidden">
  <div class="absolute inset-0 bg-ink/60 backdrop-blur-sm" data-drawer-overlay></div>
  <div class="absolute inset-x-0 top-0 bg-bone text-ink p-6 lg:p-10 shadow-2xl transform transition-transform" data-drawer-panel>
    <div class="flex items-center justify-between">
      <div class="mono text-[10px] tracking-[0.25em] text-ink/60">/ SEARCH</div>
      <button type="button" data-close-drawer class="mono text-[12px] hover:text-velora transition-colors">CLOSE [X]</button>
    </div>
    
    <div class="mt-12 max-w-2xl mx-auto pb-12">
      <form action="{{ route('shop') }}" method="GET" class="relative">
        <input type="text" name="q" placeholder="Search products..." class="w-full bg-transparent border-b-2 border-ink/20 focus:border-ink outline-none py-4 text-[24px] lg:text-[32px] display transition-colors" autofocus autocomplete="off" />
        <button type="submit" class="absolute right-0 top-1/2 -translate-y-1/2 w-12 h-12 grid place-items-center hover:text-velora transition-colors">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="7"/><path d="m20 20-3-3"/></svg>
        </button>
      </form>
      <div class="mt-4 flex gap-4 text-[12px] mono tracking-wider text-ink/40">
        <span>Trending:</span>
        <a href="{{ route('shop', ['q' => 'Hoodie']) }}" class="hover:text-ink transition-colors">Hoodie</a>
        <a href="{{ route('shop', ['q' => 'Tee']) }}" class="hover:text-ink transition-colors">Tee</a>
        <a href="{{ route('shop', ['q' => 'Jacket']) }}" class="hover:text-ink transition-colors">Jacket</a>
      </div>
    </div>
  </div>
</div>
