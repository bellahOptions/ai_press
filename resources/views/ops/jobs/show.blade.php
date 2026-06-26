@extends('layouts.ops')
@section('page-title', 'Job Detail')
@section('content')
    <livewire:orm.job-order-detail :job-id="$jobId" />
@endsection
