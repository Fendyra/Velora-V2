
const $ = (sel, root = document) => root.querySelector(sel);
const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

function clamp(n, min, max) {
  return Math.max(min, Math.min(max, n));
}

function onReady(fn) {
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
  else fn();
}

function initLoader() {
  const loader = $('[data-loader]');
  if (!loader) return;

  const pct = $('[data-loader-pct]', loader);
  const bar = $('[data-loader-bar]', loader);

  const startedAt = performance.now();
  const durationMs = 900;

  const tick = (t) => {
    const p = clamp((t - startedAt) / durationMs, 0, 1);
    const v = Math.round(p * 100);

    if (pct) pct.textContent = `${String(v).padStart(3, '0')} / 100`;
    if (bar) bar.style.transform = `scaleX(${p})`;

    if (p < 1) {
      requestAnimationFrame(tick);
      return;
    }

    loader.classList.add('lift-out');
    window.setTimeout(() => loader.remove(), 1200);
  };

  requestAnimationFrame(tick);
}

function initToast() {
  const toast = $('[data-toast]');
  if (!toast) return;
  window.setTimeout(() => {
    toast.style.transition = 'opacity .5s ease, transform .5s ease';
    toast.style.opacity = '0';
    toast.style.transform = 'translate(-50%, 10px)';
    window.setTimeout(() => toast.remove(), 600);
  }, 2600);
}

function initDrawers() {
  const drawers = new Map($$('[data-drawer]').map((el) => [el.getAttribute('data-drawer'), el]));
  if (!drawers.size) return;

  let openKey = null;

  const open = (key) => {
    const el = drawers.get(key);
    if (!el) return;

    openKey = key;
    el.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  };

  const close = () => {
    if (!openKey) return;
    const el = drawers.get(openKey);
    openKey = null;
    if (el) el.classList.add('hidden');
    document.body.style.overflow = '';
  };

  document.addEventListener('click', (e) => {
    const openBtn = e.target.closest('[data-open-drawer]');
    if (openBtn) {
      e.preventDefault();
      open(openBtn.getAttribute('data-open-drawer'));
      return;
    }

    if (e.target.closest('[data-close-drawer]')) {
      e.preventDefault();
      close();
      return;
    }

    const overlay = e.target.closest('[data-drawer-overlay]');
    if (overlay) {
      e.preventDefault();
      close();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
  });
}

function initReveal() {
  const els = $$(' .reveal, .reveal-clip, .reveal-up-clip, .grow-line');
  if (!els.length) return;

  const io = new IntersectionObserver(
    (entries) => {
      for (const en of entries) {
        if (!en.isIntersecting) continue;
        en.target.classList.add('in');
        io.unobserve(en.target);
      }
    },
    { threshold: 0.12, rootMargin: '0px 0px -10% 0px' },
  );

  for (const el of els) io.observe(el);
}

function initCursor() {
  if (!window.matchMedia('(pointer: fine)').matches) return;

  const dot = $('[data-cursor-dot]');
  const ring = $('[data-cursor-ring]');
  if (!dot || !ring) return;

  let x = window.innerWidth / 2;
  let y = window.innerHeight / 2;
  let rx = x;
  let ry = y;

  dot.style.opacity = '1';
  ring.style.opacity = '1';

  const raf = () => {
    rx += (x - rx) * 0.12;
    ry += (y - ry) * 0.12;
    dot.style.transform = `translate(${x}px, ${y}px)`;
    ring.style.transform = `translate(${rx}px, ${ry}px)`;
    requestAnimationFrame(raf);
  };

  document.addEventListener('mousemove', (e) => {
    x = e.clientX;
    y = e.clientY;
  });
  document.addEventListener('mousedown', () => ring.style.transform += ' scale(0.85)');
  document.addEventListener('mouseup', () => {});

  requestAnimationFrame(raf);
}

function initJakartaTime() {
  const els = $$('[data-jakarta-time]');
  if (!els.length) return;

  const fmt = new Intl.DateTimeFormat('en-GB', {
    timeZone: 'Asia/Jakarta',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    hour12: false,
  });

  const tick = () => {
    const now = fmt.format(new Date());
    for (const el of els) el.textContent = now;
  };

  tick();
  window.setInterval(tick, 1000);
}

function initParallax() {
  const els = $$('[data-parallax-speed]');
  if (!els.length) return;

  let ticking = false;
  const onScroll = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => {
      const y = window.scrollY;
      for (const el of els) {
        const speed = Number(el.getAttribute('data-parallax-speed') || '0');
        el.style.transform = `translateY(${y * speed}px)`;
      }
      ticking = false;
    });
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

function initGallery() {
  const mainImg = $('[data-gallery-main-img]');
  const thumbs = $$('[data-gallery-thumb]');
  const countEl = $('[data-gallery-count]');
  const json = $('[data-gallery-images]');
  if (!mainImg || !thumbs.length || !json) return;

  let images;
  try {
    images = JSON.parse(json.textContent || '[]');
  } catch {
    images = [];
  }
  if (!images.length) return;

  const setActive = (idx) => {
    const i = clamp(Number(idx) || 0, 0, images.length - 1);
    mainImg.src = images[i];
    if (countEl) countEl.textContent = '/ ' + String(i + 1).padStart(2, '0') + ' of ' + String(images.length).padStart(2, '0');
    for (const t of thumbs) {
      const on = Number(t.getAttribute('data-gallery-thumb')) === i;
      t.classList.toggle('border-velora', on);
      t.classList.toggle('border-transparent', !on);
    }
  };

  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-gallery-thumb]');
    if (!btn) return;
    e.preventDefault();
    setActive(btn.getAttribute('data-gallery-thumb'));
  });

  setActive(0);
}

function initProductForm() {
  const form = $('[data-product-form]');
  if (!form) return;

  const colorLabel = $('[data-color-label]', form);
  const colorRadios = $$('[data-color-radio]', form);
  if (colorLabel && colorRadios.length) {
    const update = () => {
      const selected = colorRadios.find((r) => r.checked);
      if (selected) colorLabel.textContent = selected.value;
    };
    form.addEventListener('change', (e) => {
      if (e.target && e.target.matches('[data-color-radio]')) update();
    });
    update();
  }

  const qtyWrap = $('[data-qty]');
  if (qtyWrap) {
    const input = $('[data-qty-input]', qtyWrap);
    const label = $('[data-qty-label]', qtyWrap);
    const dec = $('[data-qty-dec]', qtyWrap);
    const inc = $('[data-qty-inc]', qtyWrap);
    if (input && dec && inc) {
      const getVal = () => clamp(parseInt(String(input.value || '1'), 10) || 1, 1, 99);
      const setVal = (v) => {
        const clamped = clamp(v, 1, 99);
        input.value = String(clamped);
        if (label) label.textContent = String(clamped);
      };

      dec.addEventListener('click', () => setVal(getVal() - 1));
      inc.addEventListener('click', () => setVal(getVal() + 1));
      input.addEventListener('input', () => setVal(getVal()));
    }
  }
}

function initAccordion() {
  const items = $$('[data-accordion-item]');
  if (!items.length) return;

  // open first by default
  if (items[0]) {
    const panel = $('[data-accordion-panel]', items[0]);
    const icon = $('[data-accordion-icon]', items[0]);
    if (panel) { panel.classList.remove('max-h-0', 'opacity-0'); panel.classList.add('max-h-48', 'opacity-100', 'pb-4'); }
    if (icon) icon.style.transform = 'rotate(45deg)';
  }

  document.addEventListener('click', (e) => {
    const toggle = e.target.closest('[data-accordion-toggle]');
    if (!toggle) return;
    const item = toggle.closest('[data-accordion-item]');
    if (!item) return;
    const panel = $('[data-accordion-panel]', item);
    const icon = $('[data-accordion-icon]', item);
    if (!panel) return;

    const isOpen = !panel.classList.contains('max-h-0');
    // close all
    items.forEach(it => {
      const p = $('[data-accordion-panel]', it);
      const ic = $('[data-accordion-icon]', it);
      if (p) { p.classList.add('max-h-0', 'opacity-0'); p.classList.remove('max-h-48', 'opacity-100', 'pb-4'); }
      if (ic) ic.style.transform = '';
    });
    if (!isOpen) {
      panel.classList.remove('max-h-0', 'opacity-0');
      panel.classList.add('max-h-48', 'opacity-100', 'pb-4');
      if (icon) icon.style.transform = 'rotate(45deg)';
    }
  });
}

function initColorSwatch() {
  const form = $('[data-product-form]');
  if (!form) return;

  const colorLabel = $('[data-color-label]', form);
  const swatches = $$('[data-color-swatch]', form);
  const radios = $$('input[type="radio"][name="color"]', form);
  if (!colorLabel || !radios.length) return;

  const updateSwatch = () => {
    const selected = radios.find(r => r.checked);
    if (!selected) return;
    if (colorLabel) colorLabel.textContent = selected.value;
    swatches.forEach(sw => {
      const parent = sw.closest('label');
      if (!parent) return;
      const radio = $('input[type="radio"]', parent);
      const on = radio && radio.checked;
      sw.classList.toggle('border-velora', on);
      sw.classList.toggle('border-ink/20', !on);
    });
  };

  form.addEventListener('change', e => {
    if (e.target && e.target.name === 'color') updateSwatch();
  });
  updateSwatch();
}

function initLogbook() {
  const root = $('[data-logbook]');
  if (!root) return;

  root.addEventListener('click', (e) => {
    const toggle = e.target.closest('[data-logbook-toggle]');
    if (!toggle) return;
    const entry = toggle.closest('[data-logbook-entry]');
    if (!entry) return;

    const body = $('[data-logbook-body]', entry);
    const more = $('[data-logbook-more]', entry);
    const cta = $('[data-logbook-cta]', entry);
    if (!body) return;

    const isOpen = !body.classList.contains('hidden');
    body.classList.toggle('hidden', isOpen);
    if (more) more.classList.toggle('hidden', isOpen);
    if (cta) cta.textContent = isOpen ? 'OPEN ENTRY →' : 'CLOSE ENTRY →';
  });
}

function initFaq() {
  const tabs = $$('[data-faq-tab]');
  const panels = new Map($$('[data-faq-panel]').map((p) => [p.getAttribute('data-faq-panel'), p]));
  if (!tabs.length || !panels.size) return;

  const set = (key) => {
    for (const [k, el] of panels) el.classList.toggle('hidden', k !== key);
    for (const t of tabs) t.classList.toggle('on', t.getAttribute('data-faq-tab') === key);
  };

  tabs.forEach((t) => t.classList.add('chip'));
  const first = tabs[0]?.getAttribute('data-faq-tab');
  if (first) set(first);

  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-faq-tab]');
    if (!btn) return;
    e.preventDefault();
    set(btn.getAttribute('data-faq-tab'));
  });
}

function initCheckout() {
  const form = $('[data-checkout-form]');
  if (!form) return;

  const stepBtns = $$('[data-step-btn]');
  const panels = $$('[data-step-panel]');
  const nextBtns = $$('[data-next-step]');
  const prevBtns = $$('[data-prev-step]');
  const overlay = $('[data-checkout-overlay]');

  const cfgNode = $('[data-checkout-config]');
  let subtotal = 0;
  try {
    subtotal = Number(JSON.parse(cfgNode?.textContent || '{}')?.subtotal || 0);
  } catch {
    subtotal = 0;
  }

  const shipLabel = $('[data-ship-label]');
  const totalLabel = $('[data-total-label]');
  const totalTop = $('[data-checkout-total]');

  const setStep = (idx) => {
    const i = clamp(Number(idx) || 0, 0, panels.length - 1);
    for (const p of panels) p.classList.toggle('hidden', p.getAttribute('data-step-panel') !== String(i));
    for (const b of stepBtns) {
      const on = b.getAttribute('data-step-btn') === String(i);
      b.classList.toggle('bg-ink', on);
      b.classList.toggle('text-bone', on);
      b.classList.toggle('border-ink', on);
      b.classList.toggle('border-ink/15', !on);
    }
    form.setAttribute('data-step', String(i));
  };

  const compute = () => {
    const ship = form.querySelector('input[name="shipping"]:checked');
    const fee = Number(ship?.getAttribute('data-ship-fee') || 0);
    const total = subtotal + fee;
    if (shipLabel) shipLabel.textContent = formatIDR(fee);
    if (totalLabel) totalLabel.textContent = formatIDR(total);
    if (totalTop) totalTop.textContent = formatIDR(total);
  };

  stepBtns.forEach((b) => b.addEventListener('click', () => setStep(b.getAttribute('data-step-btn'))));
  nextBtns.forEach((b) => b.addEventListener('click', () => setStep((Number(form.getAttribute('data-step') || '0') || 0) + 1)));
  prevBtns.forEach((b) => b.addEventListener('click', () => setStep((Number(form.getAttribute('data-step') || '0') || 0) - 1)));
  form.addEventListener('change', (e) => {
    if (e.target && e.target.name === 'shipping') compute();
  });

  form.addEventListener('submit', () => {
    if (!overlay) return;
    overlay.classList.remove('hidden');
  });

  setStep(0);
  compute();
}

function formatIDR(amount) {
  try {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(amount);
  } catch {
    return `IDR ${amount}`;
  }
}

onReady(() => {
  initLoader();
  initToast();
  initDrawers();
  initReveal();
  initCursor();
  initJakartaTime();
  initParallax();
  initGallery();
  initProductForm();
  initColorSwatch();
  initAccordion();
  initLogbook();
  initFaq();
  initCheckout();
});
