@extends('layouts.velora')

@section('title', 'Reset Password — Velora')

@section('content')
<div class="page-enter pt-32 pb-28 px-6 lg:px-10 flex justify-center min-h-[80vh] items-center">
  <div class="w-full max-w-md">
    <div class="text-center mb-12">
      <div class="secnum reveal">/ RECOVERY</div>
      <h1 class="display text-[12vw] md:text-[6vw] leading-[0.9] mt-3 reveal-up-clip in">
        Reset <span class="italic text-velora">access.</span>
      </h1>
      <p class="mt-6 text-[14px] text-ink/60 reveal" style="transition-delay: 100ms">
        Enter your email address and we'll send you a link to reset your password.
      </p>
    </div>

    <form method="POST" action="" class="space-y-8 reveal" style="transition-delay: 200ms">
      @csrf
      
      <div class="relative group">
        <label for="email" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">EMAIL ADDRESS</label>
        <input id="email" type="email" name="email" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autofocus autocomplete="email" />
      </div>

      <div class="pt-6">
        <button type="button" class="w-full btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] relative overflow-hidden bg-ink text-bone hover:bg-transparent hover:text-ink transition-colors">
          SEND RESET LINK →
        </button>
      </div>

      <div class="pt-6 text-center border-t border-ink/10">
        <p class="text-[12px] text-ink/60">
          Remembered your password? 
          <a href="{{ route('login') }}" class="text-ink hover:text-velora border-b border-ink/20 pb-0.5 transition-colors ml-2">Sign in</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
