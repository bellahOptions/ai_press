@extends('layouts.ops')
@section('page-title', 'Invoice')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <a href="{{ route('ops.invoices.index') }}" class="flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Invoices
        </a>
        <a href="{{ route('ops.invoices.pdf', $invoiceId) }}" target="_blank"
           class="flex items-center gap-2 bg-red-600 text-white font-semibold text-sm px-4 py-2 rounded-xl hover:bg-red-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Download PDF
        </a>
    </div>
    <livewire:finance.record-payment :invoice-id="$invoiceId" />
</div>
@endsection
