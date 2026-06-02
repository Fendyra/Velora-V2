@extends('layouts.velora')

@section('title', 'Verify Email — Velora')

@section('content')
<div class="page-enter pt-32 pb-28 px-6 lg:px-10 flex justify-center min-h-[80vh] items-center">
  <div class="w-full max-w-md">
    <div class="text-center mb-12">
      <div class="secnum reveal">/ VERIFICATION</div>
      <h1 class="display text-[12vw] md:text-[6vw] leading-[0.9] mt-3 reveal-up-clip in">
        Check <span class="italic text-velora">inbox.</span>
      </h1>
      <p class="mt-6 text-[14px] text-ink/60 reveal" style="transition-delay: 100ms">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
      </p>
    </div>

    <div class="space-y-6 reveal" style="transition-delay: 200ms">
      <form method="POST" action="">
        @csrf
        <button type="button" class="w-full btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] relative overflow-hidden bg-ink text-bone hover:bg-transparent hover:text-ink transition-colors">
          RESEND EMAIL →
        </button>
      </form>

      <form method="POST" action="">
        @csrf
        <button type="button" class="w-full border border-ink/20 py-4 text-[12px] mono tracking-[0.25em] text-ink/70 hover:text-ink hover:border-ink transition-colors">
          LOG OUT
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
