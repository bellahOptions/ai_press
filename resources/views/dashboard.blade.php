@extends('layouts.admin.theme')
@section('title', 'Hello'.' '. Auth::user()->firstName)
@section('content')
    <main role="main">
        <section id="header">
            <div class="py-10 mx-auto">
                
            </div>
        </section> 
    </main>
@endsection