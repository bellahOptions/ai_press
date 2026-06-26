@extends('layouts.ops')
@section('page-title', 'Purchase Orders')
@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center max-w-lg mx-auto mt-10">
    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
    </div>
    <h3 class="text-gray-900 font-bold text-lg mb-2">Purchase Orders</h3>
    <p class="text-gray-500 text-sm">Purchase order management is coming in the next update. You can log stock receipts directly through Stock Adjustments in the meantime.</p>
    <a href="{{ route('ops.inventory.index') }}" class="mt-5 inline-flex items-center gap-2 bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-red-700 transition-colors">Go to Inventory</a>
</div>
@endsection
