@extends('layouts.theme')
@section('title', 'Redefinig Prints')
@section('contents')
    <main role="main" class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0">
            <video class="h-full w-full object-cover" autoplay muted loop playsinline
                poster="{{ asset('/images/hero-poster.jpg') }}">
                <source src="{{ asset('/vid.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 flex min-h-screen items-center justify-center px-6 text-center text-white">
            <div class="max-w-2xl space-y-4">
                
                <div class="flex items-center justify-center my-5 pt-6">
                    <img src="{{ asset('/logo-wt.svg') }}" class="logod h-10 md:h-20" alt="Alet Inspirationz Logo" />
                </div>
                <h1 class="font-serif text-4xl md:text-6xl">Redefining Prints</h1>
                <p class="text-base md:text-lg text-white/90">
                    Premium custom designs, crafted to make your story stand out.
                </p>
                <p class="text-base md:text-lg text-white/90">
                    We are currently building our website 😀😀 <br>
                    Be the first to be notified when we go live!
                </p>
                <form post="#" method="post" class="flex mt-5">
                    @csrf
                    <input type="email" name="email" placeholder="Input your email address" class="bg-slate-900/50 rounded-l-xl w-full p-4" />
                    <button type="submit" class="bg-[#FF00FF] rounded-r-xl md:font-bold md:w-full">Join the waitlist</button>
                </form>
            </div>
        </div>
    </main>
    </main>
@endsection
