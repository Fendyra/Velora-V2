@extends('layouts.velora')

@section('title', ucfirst($routeKey) . ' — Velora')

@section('content')
<div class="page-enter pt-32 pb-28 px-6 lg:px-10">
  <div class="secnum">{{ $title['kicker'] }}</div>
  <h1 class="display text-[14vw] md:text-[10vw] leading-[0.9] mt-3 reveal-up-clip in">
    {{ $title['big'] }} <span class="italic text-velora">{{ $title['italic'] }}</span>
  </h1>
  <p class="mt-8 max-w-md text-[15px] text-ink/70">
    This page is being written. In the meantime, head back to the shop, or read the lookbook.
  </p>
  <div class="mt-8 flex gap-4">
    <a href="{{ route('shop') }}" class="btn-mag border border-ink px-6 py-3 text-[12px] mono tracking-[0.25em]">SHOP →</a>
    <a href="{{ route('lookbook') }}" class="ink-link mono text-[11px] tracking-[0.25em] text-ink/60 self-center">LOOKBOOK →</a>
  </div>
</div>
@endsection
