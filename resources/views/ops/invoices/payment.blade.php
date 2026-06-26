@extends('layouts.ops')
@section('page-title', 'Record Payment')
@section('content')
    <livewire:finance.record-payment :invoice-id="$invoiceId" />
@endsection
