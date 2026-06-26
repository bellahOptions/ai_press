@extends('layouts.ops')
@section('page-title', 'Add Material')
@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <p class="text-gray-500">Use the Materials list to manage inventory. Direct material creation coming soon.</p>
        <a href="{{ route('ops.inventory.index') }}" class="mt-4 inline-flex items-center gap-2 text-red-600 font-semibold text-sm hover:underline">← Back to Inventory</a>
    </div>
</div>
@endsection
