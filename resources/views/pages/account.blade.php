@extends('layouts.velora')

@section('title', 'My Account — Velora')

@section('content')
<div class="page-enter pt-32 pb-28 px-6 lg:px-10 min-h-[80vh]">
  <div class="max-w-4xl mx-auto">
    <div class="mb-16">
      <div class="secnum reveal">/ ACCOUNT</div>
      <h1 class="display text-[10vw] md:text-[5vw] leading-[0.9] mt-3 reveal-up-clip in">
        Hello, <span class="italic text-velora">{{ explode(' ', $user->name)[0] }}.</span>
      </h1>
      <p class="mt-4 text-[14px] text-ink/60 reveal" style="transition-delay: 100ms">
        Manage your profile and security settings.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 reveal" style="transition-delay: 200ms">
      
      <!-- Profile Information -->
      <div>
        <h2 class="mono text-[12px] tracking-[0.25em] mb-6">/ PROFILE INFORMATION</h2>
        <div class="space-y-6">
          <div>
            <div class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase mb-1">FULL NAME</div>
            <div class="text-[16px]">{{ $user->name }}</div>
          </div>
          <div>
            <div class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase mb-1">EMAIL ADDRESS</div>
            <div class="text-[16px]">{{ $user->email }}</div>
          </div>
        </div>

        <div class="mt-12">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="border border-ink/20 px-6 py-3 text-[11px] mono tracking-[0.25em] text-ink/70 hover:text-ink hover:border-ink transition-colors">
              LOG OUT
            </button>
          </form>
        </div>
      </div>

      <!-- Security / Change Password -->
      <div>
        <h2 class="mono text-[12px] tracking-[0.25em] mb-6">/ SECURITY</h2>
        
        @if (session('status') === 'password-updated')
          <div class="mb-6 p-4 border border-emerald-500/50 bg-emerald-50/10 text-emerald-500 text-[13px]">
            Password updated successfully.
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-6 p-4 border border-red-500/50 bg-red-50/10 text-red-500 text-[13px]">
            <ul class="list-disc list-inside">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('account.password.update') }}" class="space-y-8">
          @csrf
          
          <div class="relative group">
            <label for="current_password" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">CURRENT PASSWORD</label>
            <input id="current_password" type="password" name="current_password" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autocomplete="current-password" />
          </div>

          <div class="relative group">
            <label for="password" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">NEW PASSWORD</label>
            <input id="password" type="password" name="password" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autocomplete="new-password" />
          </div>
          
          <div class="relative group">
            <label for="password_confirmation" class="mono text-[10px] tracking-[0.25em] text-ink/50 uppercase absolute -top-2 left-0 transition-all group-focus-within:text-velora group-focus-within:-top-4">CONFIRM NEW PASSWORD</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="w-full bg-transparent border-b border-ink/20 focus:border-ink outline-none py-3 text-[16px] transition-colors" required autocomplete="new-password" />
          </div>

          <div class="pt-2">
            <button type="submit" class="w-full btn-mag border border-ink py-4 text-[12px] mono tracking-[0.25em] relative overflow-hidden bg-ink text-bone hover:bg-transparent hover:text-ink transition-colors">
              UPDATE PASSWORD →
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
