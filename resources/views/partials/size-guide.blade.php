<div class="fixed inset-0 z-[80] hidden" id="size-guide-modal">
  <div class="absolute inset-0 bg-ink/60 transition-opacity" id="size-guide-overlay"></div>
  
  <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-6 pointer-events-none">
    <div class="bg-bone w-full max-w-[800px] max-h-[90vh] rounded-xl overflow-hidden shadow-2xl flex flex-col pointer-events-auto relative transform transition-all scale-95 opacity-0" id="size-guide-content">
      
      <!-- Close Button -->
      <button type="button" class="absolute top-4 right-4 w-8 h-8 grid place-items-center rounded-full hover:bg-ink hover:text-bone transition-colors z-10" id="close-size-guide">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" stroke-linecap="round"><path d="m6 6 12 12M18 6 6 18"/></svg>
      </button>

      <div class="overflow-y-auto w-full flex-1 no-scrollbar p-6 sm:p-10">
        <!-- Tabs -->
        <div class="flex items-center gap-6 sm:gap-12 border-b border-ink/15 overflow-x-auto no-scrollbar pb-1">
          @foreach(['tshirt' => 'T-SHIRT', 'hoodie' => 'HOODIE', 'sweatshirt' => 'SWEATSHIRT', 'bottom' => 'BOTTOM'] as $key => $label)
            <button type="button" class="sg-tab flex items-center gap-2 pb-3 border-b-2 transition-colors whitespace-nowrap {{ $loop->first ? 'border-ink text-ink font-medium' : 'border-transparent text-ink/50 hover:text-ink' }}" data-sg-target="{{ $key }}">
              <span class="mono text-[12px] tracking-[0.1em]">{{ $label }}</span>
            </button>
          @endforeach
        </div>

        <div class="mt-8">
          <h2 class="display text-[24px] uppercase" id="sg-title">OVERSIZED T-SHIRT</h2>
          <p class="text-[13px] text-ink/60 mt-1">All measurements are garment measurements in cm.</p>
        </div>

        <!-- Table -->
        <div class="mt-6 border border-ink/10 rounded-lg overflow-hidden bg-bone">
          <div class="flex">
            <!-- Left Col (Sizes) -->
            <div class="w-20 sm:w-24 bg-ink text-bone shrink-0 flex flex-col">
              <div class="h-14 flex items-center justify-center border-b border-bone/20">
                <span class="mono text-[11px] tracking-[0.2em]">SIZE</span>
              </div>
              <div id="sg-sizes-col" class="flex flex-col">
                <!-- Size labels injected here -->
              </div>
            </div>
            
            <!-- Right Cols (Metrics) -->
            <div class="flex-1 overflow-x-auto no-scrollbar border-l border-ink/10">
              <div class="min-w-[400px]">
                <!-- Table Header -->
                <div class="h-14 grid border-b border-ink/10 bg-mist/50" id="sg-metrics-header">
                  <!-- Metrics injected here -->
                </div>
                <!-- Table Body -->
                <div id="sg-table-body" class="flex flex-col">
                  <!-- Rows injected here -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Still Not Sure Steps -->
        <div class="mt-8 p-6 sm:p-8 bg-mist/50 rounded-xl border border-ink/5 flex flex-col lg:flex-row gap-8 items-start lg:items-center justify-between overflow-x-auto no-scrollbar">
          
          <div class="shrink-0 lg:w-40">
            <h3 class="mono text-[11px] tracking-[0.2em] font-medium">STILL NOT SURE?</h3>
            <p class="text-[12px] text-ink/70 mt-2 leading-relaxed">Compare it with your favorite tee at home.</p>
          </div>

          <div class="flex-1 flex items-center gap-4 lg:gap-6 min-w-max">
            
            <!-- Step 1 -->
            <div class="flex items-center gap-3 w-[160px] relative group">
              <span class="absolute -top-1 -left-1 w-4 h-4 rounded-full bg-ink text-bone text-[9px] font-bold flex items-center justify-center z-10 transition-transform group-hover:scale-110">1</span>
              <div class="w-12 h-12 rounded-lg border border-ink/10 flex items-center justify-center shrink-0 bg-bone shadow-sm text-ink/70">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.38 3.46 16 2a8.5 8.5 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
              </div>
              <p class="text-[11px] text-ink/80 leading-relaxed">Take your favorite tee that fits you well.</p>
            </div>
            
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-ink/20 shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>

            <!-- Step 2 -->
            <div class="flex items-center gap-3 w-[160px] relative group">
              <span class="absolute -top-1 -left-1 w-4 h-4 rounded-full bg-ink text-bone text-[9px] font-bold flex items-center justify-center z-10 transition-transform group-hover:scale-110">2</span>
              <div class="w-12 h-12 rounded-lg border border-ink/10 flex items-center justify-center shrink-0 bg-bone shadow-sm text-ink/70">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="8" width="18" height="8" rx="2" ry="2"/><path d="M7 8v8M11 8v4M15 8v8"/></svg>
              </div>
              <p class="text-[11px] text-ink/80 leading-relaxed">Measure the key points as shown.</p>
            </div>

            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-ink/20 shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>

            <!-- Step 3 -->
            <div class="flex items-center gap-3 w-[160px] relative group">
              <span class="absolute -top-1 -left-1 w-4 h-4 rounded-full bg-ink text-bone text-[9px] font-bold flex items-center justify-center z-10 transition-transform group-hover:scale-110">3</span>
              <div class="w-12 h-12 rounded-lg border border-ink/10 flex items-center justify-center shrink-0 bg-bone shadow-sm text-ink/70">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
              </div>
              <p class="text-[11px] text-ink/80 leading-relaxed">Compare with our size chart.</p>
            </div>

            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-ink/20 shrink-0"><path d="M5 12h14M12 5l7 7-7 7"/></svg>

            <!-- Step 4 -->
            <div class="flex items-center gap-3 w-[160px] relative group">
              <span class="absolute -top-1 -left-1 w-4 h-4 rounded-full bg-ink text-bone text-[9px] font-bold flex items-center justify-center z-10 transition-transform group-hover:scale-110">4</span>
              <div class="w-12 h-12 rounded-lg border border-ink/10 flex items-center justify-center shrink-0 bg-bone shadow-sm text-ink/70">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4zM3 6h18M16 10a4 4 0 0 1-8 0"/></svg>
              </div>
              <p class="text-[11px] text-ink/80 leading-relaxed">Choose your perfect size.</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('size-guide-modal');
  const overlay = document.getElementById('size-guide-overlay');
  const content = document.getElementById('size-guide-content');
  const closeBtn = document.getElementById('close-size-guide');
  
  const sgTitle = document.getElementById('sg-title');
  const sgSizesCol = document.getElementById('sg-sizes-col');
  const sgMetricsHeader = document.getElementById('sg-metrics-header');
  const sgTableBody = document.getElementById('sg-table-body');
  
  const sgTabs = document.querySelectorAll('.sg-tab');

  const sgData = {
    tshirt: {
      title: "OVERSIZED T-SHIRT",
      metrics: ["CHEST", "SHOULDER", "LENGTH", "HEM WIDTH"],
      sizes: ["XS", "S", "M", "L", "XL", "XXL"],
      data: [
        [110, 52, 68, 110],
        [114, 54, 70, 114],
        [118, 56, 72, 118],
        [122, 58, 74, 122],
        [126, 60, 76, 126],
        [130, 62, 78, 130]
      ]
    },
    hoodie: {
      title: "BOXY HOODIE",
      metrics: ["CHEST", "SHOULDER", "LENGTH", "SLEEVE"],
      sizes: ["XS", "S", "M", "L", "XL", "XXL"],
      data: [
        [114, 56, 64, 58],
        [118, 58, 66, 60],
        [122, 60, 68, 62],
        [126, 62, 70, 64],
        [130, 64, 72, 66],
        [134, 66, 74, 68]
      ]
    },
    sweatshirt: {
      title: "RELAXED SWEATSHIRT",
      metrics: ["CHEST", "SHOULDER", "LENGTH", "SLEEVE"],
      sizes: ["XS", "S", "M", "L", "XL", "XXL"],
      data: [
        [112, 54, 66, 59],
        [116, 56, 68, 61],
        [120, 58, 70, 63],
        [124, 60, 72, 65],
        [128, 62, 74, 67],
        [132, 64, 76, 69]
      ]
    },
    bottom: {
      title: "LOOSE PANTS",
      metrics: ["WAIST", "HIP", "THIGH", "LENGTH"],
      sizes: ["XS", "S", "M", "L", "XL", "XXL"],
      data: [
        [72, 100, 62, 102],
        [76, 104, 64, 104],
        [80, 108, 66, 106],
        [84, 112, 68, 108],
        [88, 116, 70, 110],
        [92, 120, 72, 112]
      ]
    }
  };

  function renderTable(type) {
    const d = sgData[type];
    if (!d) return;

    sgTitle.textContent = d.title;

    // Render Metrics Header
    const colsCount = d.metrics.length;
    sgMetricsHeader.style.gridTemplateColumns = `repeat(${colsCount}, minmax(0, 1fr))`;
    sgMetricsHeader.innerHTML = d.metrics.map((m, i) => `
      <div class="flex flex-col items-center justify-center border-r border-ink/10 last:border-0 h-14">
        <span class="w-4 h-4 rounded-full bg-ink text-bone text-[8px] flex items-center justify-center font-bold mb-1">${String.fromCharCode(65 + i)}</span>
        <span class="mono text-[10px] tracking-[0.1em] text-ink/70">${m}</span>
      </div>
    `).join('');

    // Render Sizes Col
    sgSizesCol.innerHTML = d.sizes.map(s => `
      <div class="h-12 flex items-center justify-center border-b border-bone/10 last:border-0">
        <span class="mono text-[12px] font-medium">${s}</span>
      </div>
    `).join('');

    // Render Table Body
    sgTableBody.innerHTML = d.data.map(row => `
      <div class="grid h-12 border-b border-ink/5 last:border-0 hover:bg-mist/30 transition-colors" style="grid-template-columns: repeat(${colsCount}, minmax(0, 1fr));">
        ${row.map(val => `
          <div class="flex items-center justify-center border-r border-ink/5 last:border-0">
            <span class="text-[13px] text-ink/80">${val}</span>
          </div>
        `).join('')}
      </div>
    `).join('');
  }

  // Tab switching
  sgTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      sgTabs.forEach(t => {
        t.classList.remove('border-ink', 'text-ink', 'font-medium');
        t.classList.add('border-transparent', 'text-ink/50');
      });
      tab.classList.remove('border-transparent', 'text-ink/50');
      tab.classList.add('border-ink', 'text-ink', 'font-medium');
      renderTable(tab.getAttribute('data-sg-target'));
    });
  });

  // Modal logic
  function openModal() {
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    // Trigger animation
    requestAnimationFrame(() => {
      content.classList.remove('scale-95', 'opacity-0');
      content.classList.add('scale-100', 'opacity-100');
    });
  }

  function closeModal() {
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
      modal.classList.add('hidden');
      document.body.style.overflow = '';
    }, 200); // match transition duration
  }

  closeBtn.addEventListener('click', closeModal);
  overlay.addEventListener('click', closeModal);

  // Global trigger listener
  document.addEventListener('click', (e) => {
    if (e.target.closest('[data-open-modal="size-guide"]')) {
      e.preventDefault();
      openModal();
    }
  });

  // Initialize first tab
  renderTable('tshirt');
});
</script>
