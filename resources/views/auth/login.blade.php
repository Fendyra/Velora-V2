@extends('layouts.velora')

@section('title', 'Sign In — Velora')

@section('content')
<div class="page-enter pt-32 pb-28 px-6 lg:px-10 flex justify-center min-h-[80vh] items-center">
  <div class="w-full max-w-md">
    <div class="text-center mb-12">
      <div class="secnum reveal">/ ACCOUNT</div>
      <h1 class="display text-[12vw] md:text-[6vw] leading-[0.9] mt-3 reveal-up-clip in">
        Welcome <span class="italic text-velora">back.</span>
      </h1>
    </div>

    @if ($errors->any())
      <div class="mb-8 p-4 border border-red-500/50 bg-red-50/10 text-red-500 text-[13px] reveal">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('status'))
      <div class="mb-8 p-4 border border-emerald-500/50 bg-emerald-50/10 text-emerald-500 text-[13px] reveal">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-8 reveal" style="transition-delay: 200ms">
      @csrf
      
      <div class="relative group">
        <label for="email" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">EMAIL ADDRESS</label>
        <input id="email" type="email" name="email" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autofocus autocomplete="email" />
      </div>

      <div class="relative group">
        <label for="password" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">PASSWORD</label>
        <input id="password" type="password" name="password" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autocomplete="current-password" />
      </div>

      <div class="flex items-center justify-between pt-2">
        <label class="flex items-center gap-3 cursor-pointer group">
          <div class="relative w-4 h-4 border border-ink/30 group-hover:border-ink flex items-center justify-center transition-colors">
            <input type="checkbox" name="remember" class="peer sr-only" />
            <svg class="w-2.5 h-2.5 opacity-0 peer-checked:opacity-100 transition-opacity" viewBox="0 0 14 14" fill="none"><path d="M2 7L5.5 10.5L12 3" stroke="currentColor" stroke-width="1.5"/></svg>
          </div>
          <span class="text-[12px] text-ink/70">Remember me</span>
        </label>

        <a href="{{ route('password.request') }}" class="text-[12px] text-ink/70 hover:text-velora transition-colors">Forgot Password?</a>
      </div>

      <div class="pt-4">
        <button type="submit" class="w-full btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] relative overflow-hidden bg-ink text-bone hover:bg-transparent hover:text-ink transition-colors">
          SIGN IN →
        </button>
      </div>

      <div class="relative flex items-center justify-center pt-2">
        <span class="absolute inset-x-0 h-px bg-ink/10"></span>
        <span class="relative bg-bone px-4 text-[10px] mono tracking-[0.25em] text-ink/40 uppercase">OR</span>
      </div>

      <div>
        <a href="{{ route('auth.google') }}" class="w-full flex items-center justify-center gap-3 border border-ink/20 py-3 text-[13px] text-ink/80 hover:bg-ink hover:text-bone hover:border-ink transition-colors">
          <svg class="w-4 h-4" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="currentColor"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="currentColor"/></svg>
          Sign in with Google
        </a>
      </div>

      <div class="pt-6 text-center border-t border-ink/10">
        <p class="text-[12px] text-ink/60">
          Don't have an account? 
          <a href="{{ route('register') }}" class="text-ink hover:text-velora border-b border-ink/20 pb-0.5 transition-colors ml-2">Create one</a>
        </p>
      </div>
    </form>
  </div>
</div>
@endsection
