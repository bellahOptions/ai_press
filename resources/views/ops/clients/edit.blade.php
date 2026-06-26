@extends('layouts.ops')
@section('page-title', 'Edit Client')
@section('content')
    <livewire:crm.client-form :client-id="$clientId" />
@endsection
