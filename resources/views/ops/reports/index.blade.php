@extends('layouts.ops')
@section('page-title', 'Reports')
@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center max-w-lg mx-auto mt-10">
    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
    </div>
    <h3 class="text-gray-900 font-bold text-lg mb-2">Reports &amp; Analytics</h3>
    <p class="text-gray-500 text-sm mb-5">Advanced reporting with CSV exports, job profitability, and staff productivity coming in the next phase. Use the Dashboard for now.</p>
    <a href="{{ route('ops.dashboard') }}" class="inline-flex items-center gap-2 bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-red-700 transition-colors">View Dashboard</a>
</div>
@endsection
