@extends('layouts.theme')
@section('title', 'Get Estimate')
@section('content')
    <main role="main">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="relative min-h-screen overflow-hidden">
        <div class="absolute inset-0">
            <video class="h-full w-full object-cover" autoplay muted loop playsinline
                poster="https://printingworld.home.blog/wp-content/uploads/2019/06/history-of-printing-press.jpg?w=890">
                <source src="{{ asset('/est.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 flex min-h-screen items-center justify-center px-6 text-center text-white">
            <div class="max-w-2xl space-y-4">                
                <h1 class="font-serif text-4xl md:text-6xl">Get detailed estimate for your Project</h1>
                <p class="text-base md:text-lg text-white/90">
                    Premium custom designs, crafted to make your story stand out.
                </p>
            </div>
        </div>
    </div>
            <div class="p-10">
                <h1 class="text-4xl text-center text-gray-500">Get Quote</h1>
            </div>
        </div>
    </main>
@endsection