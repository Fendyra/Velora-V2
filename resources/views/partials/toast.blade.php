@if (session('toast'))
  <div data-toast class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[65] bg-ink text-bone px-5 py-3 rounded-full shadow-2xl flex items-center gap-3 page-enter">
    <span class="w-2 h-2 rounded-full bg-velora pingdot"></span>
    <span class="text-[13px]">{{ session('toast') }}</span>
  </div>
@endif
