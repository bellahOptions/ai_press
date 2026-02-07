@extends('layouts.msg')
@section('title', 'Thanks for Joining the waitlist')
@section('content')
    <div 
    x-data="{
        seconds: 5,
        redirect() {
            if (this.seconds <= 0) {
                window.location.href = '{{ route('landingPage') }}'; // change if needed
            }
        }
    }"
    x-init="
        setInterval(() => {
            seconds--;
            redirect();
        }, 1000)
    "
    class="flex flex-col items-center justify-center bg-red-900 p-10 rounded-xl text-center text-white"
>
    <p class="text-4xl mb-4">🎉✨</p>

    <h1 class="text-4xl">Thanks for Joining the waitlist</h1>

    <p class="text-2xl mb-4">
        We will keep you updated on new developments
    </p>

    <p class="text-2xl mb-4">
        You will be redirected in:
    </p>

    <span 
        x-text="seconds"
        class="text-4xl text-yellow-400 font-bold"
    ></span>
</div>
@endsection