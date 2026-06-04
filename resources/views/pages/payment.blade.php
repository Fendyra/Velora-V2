@extends('layouts.velora')

@section('title', 'Payment — Velora')

@section('content')
<div class="page-enter pt-28 pb-20" data-reveal-scope>
  <section class="px-6 lg:px-10 text-center max-w-2xl mx-auto">
    <div class="secnum reveal">/ PAYMENT</div>
    <h1 class="display text-[48px] leading-tight mt-6 reveal-up-clip">Complete your <span class="italic text-velora">order.</span></h1>
    
    <div class="mt-8 border border-ink/10 p-8 text-left bg-mist/30">
        <div class="mono text-[11px] tracking-[0.25em] text-ink/50 mb-6">/ ORDER SUMMARY</div>
        
        <div class="flex justify-between border-b border-ink/10 pb-4 mb-4">
            <span class="text-[14px]">Order Number</span>
            <span class="mono text-[12px] font-medium">{{ $order->order_number }}</span>
        </div>
        
        <div class="flex justify-between border-b border-ink/10 pb-4 mb-4">
            <span class="text-[14px]">Total Amount</span>
            <span class="mono text-[12px] font-medium">IDR {{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>
        
        <div class="flex justify-between">
            <span class="text-[14px]">Status</span>
            <span class="mono text-[12px] font-medium uppercase">{{ $order->payment_status }}</span>
        </div>
    </div>

    <div class="mt-12">
        <button id="pay-button" class="btn-mag border border-ink px-8 py-4 text-[12px] mono tracking-[0.25em] w-full max-w-md mx-auto block hover:bg-ink hover:text-bone transition-colors">
            PROCEED TO PAYMENT →
        </button>
        <p class="mt-4 text-[12px] text-ink/60">Securely processed by Midtrans.</p>
        
        <form action="{{ route('payment.cancel', $order->order_number) }}" method="POST" class="mt-8">
            @csrf
            <button type="submit" class="text-[11px] mono tracking-[0.25em] text-ink/50 hover:text-ink transition-colors underline decoration-ink/30 underline-offset-4">
                CANCEL ORDER
            </button>
        </form>
    </div>
  </section>
</div>

<!-- Midtrans Snap Script -->
@php
    $snapJsUrl = config('midtrans.is_production') 
        ? 'https://app.midtrans.com/snap/snap.js' 
        : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp
<script src="{{ $snapJsUrl }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $order->snap_token }}', {
            // Optional
            onSuccess: function(result){
                window.location.href = "{{ route('success', ['orderId' => $order->order_number, 'total' => $order->total_amount]) }}";
            },
            // Optional
            onPending: function(result){
                window.location.href = "{{ route('success', ['orderId' => $order->order_number, 'total' => $order->total_amount]) }}";
            },
            // Optional
            onError: function(result){
                alert("Payment failed!");
            }
        });
    };

    // Auto trigger on load
    window.onload = function() {
        if('{{ $order->payment_status }}' === 'unpaid' || '{{ $order->payment_status }}' === 'pending') {
            document.getElementById('pay-button').click();
        }
    };
</script>
@endsection
