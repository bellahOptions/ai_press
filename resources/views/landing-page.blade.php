@extends('layouts.theme')
@section('title', 'Best Printing Company in Lagos Nigeria | Alet Inspirationz')

@section('content')

{{-- ═══════════════════════════════════════════════════════════
     HERO — Video Background (preserved from original)
     ═══════════════════════════════════════════════════════════ --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">

    {{-- Video Background --}}
    <div class="absolute inset-0">
        <video class="h-full w-full object-cover" autoplay muted loop playsinline
               poster="{{ asset('/images/hero-poster.jpg') }}">
            <source src="{{ asset('/vid.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/60 to-black/80"></div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-24">
        <div class="max-w-5xl mx-auto text-center space-y-7">

            {{-- Headline --}}
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tighter tracking-tight">
                Quality Printing.<br class="hidden sm:block">
                <span class="bg-red-500 bg-clip-text text-transparent">Creative Excellence.</span><br class="hidden sm:block">
                On Time. Every Time.
            </h1>

            <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                From ideas to delivery — Alet Inspirationz Prints Limited handles your
                printing, branding, packaging, and creative production with precision and speed.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2">
                <a href="{{ route('quote') }}"
                   class="inline-flex items-center justify-center gap-2 px-8 py-4
                          bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700
                          text-white font-bold text-lg rounded-xl shadow-xl hover:shadow-red-900/40
                          transform hover:scale-105 transition-all duration-200">
                    Get a Free Quote
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex items-center justify-center gap-2 px-8 py-4
                          bg-white/10 hover:bg-white/20 border border-white/30 hover:border-white/50
                          text-white font-semibold text-lg rounded-xl backdrop-blur-sm
                          transition-all duration-200">
                    Explore Services
                </a>
            </div>

        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     TRUST BAR
     ═══════════════════════════════════════════════════════════ --}}
<section class="bg-white border-b border-gray-100 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center gap-1.5">
                <span class="text-2xl font-bold text-gray-900">20+</span>
                <span class="text-xs text-gray-500 uppercase tracking-wider font-medium">Years in Business</span>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <span class="text-2xl font-bold text-gray-900">11+</span>
                <span class="text-xs text-gray-500 uppercase tracking-wider font-medium">Services Offered</span>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <span class="text-2xl font-bold text-gray-900">3</span>
                <span class="text-xs text-gray-500 uppercase tracking-wider font-medium">Group Companies</span>
            </div>
            <div class="flex flex-col items-center gap-1.5">
                <div class="flex items-center gap-1.5">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="text-2xl font-bold text-gray-900">CAC</span>
                </div>
                <span class="text-xs text-gray-500 uppercase tracking-wider font-medium">RC: 1878085</span>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     INTRO STATEMENT
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <p class="text-xl sm:text-2xl lg:text-3xl text-gray-700 font-light leading-relaxed">
            At <span class="font-semibold text-gray-900">Alet Inspirationz Prints</span>, we turn ideas into
            quality, tangible results — from the first concept sketch to the final delivered product.
        </p>
        <p class="text-xl sm:text-2xl text-gray-700 font-light leading-relaxed max-w-3xl mx-auto">
            We are an indigenous Nigerian company built on
            <span class="font-semibold text-red-600">integrity, excellence, and a relentless commitment</span>
            to making every print job count.
        </p>
        <div class="pt-4">
            <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition-colors">
                Learn our story
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     SERVICES — Featured 6
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-14">
            <p class="text-red-600 font-semibold text-sm uppercase tracking-widest mb-3">What We Do</p>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-5">
                End-to-End Print & Creative Services
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                One company. Every creative and print need you have. All delivered with the quality Lagos deserves.
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Graphic Design --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Graphic Design</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Logos, brochures, flyers, and complete design systems that make your brand impossible to ignore.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Ideas Conceptualization</span>
                </div>
            </div>

            {{-- Corporate Branding --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Corporate Branding</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Full brand identity systems — from logos to brand guidelines — that position your business for growth.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Identity & Consultancy</span>
                </div>
            </div>

            {{-- Packaging --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Packaging Design & Production</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Custom boxes, cartons, labels, and luxury gift sets designed and produced to international standards.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Packaging</span>
                </div>
            </div>

            {{-- Printing --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Digital, Offset & Large Format</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Flyers, banners, billboards, posters — printed on digital presses, offset machines, and wide-format printers.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Printing</span>
                </div>
            </div>

            {{-- Signage --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Signages & Monogramming</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Premium indoor and outdoor signage, vehicle branding, wayfinding systems, and custom monogrammed items.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Signage</span>
                </div>
            </div>

            {{-- Corporate Gifts --}}
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-100 transition-all duration-300 group">
                <div class="w-12 h-12 bg-red-50 group-hover:bg-red-600 rounded-xl flex items-center justify-center mb-5 transition-colors duration-300">
                    <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Corporate Gifts & Awards</h3>
                <p class="text-gray-600 text-sm leading-relaxed">Plaques, trophies, branded merchandise, and premium gift packages for events, staff, and client appreciation.</p>
                <div class="mt-4 pt-4 border-t border-gray-50">
                    <span class="text-xs font-semibold text-red-600 uppercase tracking-wide">Corporate Gifts</span>
                </div>
            </div>

        </div>

        {{-- View All --}}
        <div class="text-center mt-10">
            <a href="{{ route('services') }}"
               class="inline-flex items-center gap-2 px-8 py-4 border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white
                      font-semibold rounded-xl transition-all duration-200">
                View All 11 Services
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     WHY CHOOSE US
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- Left: Image --}}
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img
                        src="https://thumbs.dreamstime.com/b/colorful-printing-process-modern-press-vibrant-action-showcasing-sheets-being-printed-various-hues-image-captures-369139979.jpg"
                        alt="Alet Inspirationz printing production floor"
                        class="w-full h-full object-cover"
                    />
                </div>
                {{-- Floating badge --}}
                <div class="absolute -bottom-5 -right-5 bg-white rounded-2xl shadow-xl p-5 border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">CAC Registered</p>
                            <p class="text-xs text-gray-500">RC: 1878085</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Content --}}
            <div class="space-y-8">
                <div>
                    <p class="text-red-600 font-semibold text-sm uppercase tracking-widest mb-3">Why Alet Inspirationz</p>
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 leading-tight">
                        The Difference You Can See, Feel & Trust
                    </h2>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 bg-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-1">In-House Design + Production</h3>
                            <p class="text-gray-600 leading-relaxed">No outsourcing. Our creative and production teams work together under one roof, so your brief is never lost in translation.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 bg-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Fast, Reliable Turnaround</h3>
                            <p class="text-gray-600 leading-relaxed">24–72 hours for digital print. 3–5 days for large offset runs. We understand deadlines are non-negotiable.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 bg-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Client-Centred from Start to Finish</h3>
                            <p class="text-gray-600 leading-relaxed">Our 5 core values — Integrity, Excellence, Professionalism, Innovativeness, Client Centeredness — aren't just words. They shape every job we take.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-11 h-11 bg-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-1">Fully Indigenous & CAC Registered</h3>
                            <p class="text-gray-600 leading-relaxed">Built in Lagos, built for Nigeria. A legitimate, registered company you can trust with your brand.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition-colors">
                    Read our full story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     HOW IT WORKS — 4 Steps
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-gray-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-14">
            <p class="text-red-400 font-semibold text-sm uppercase tracking-widest mb-3">Our Process</p>
            <h2 class="text-4xl sm:text-5xl font-bold text-white mb-5">
                How We Work
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                A simple, transparent process from request to delivery. No surprises.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">

            <div class="relative">
                <div class="bg-gray-800 rounded-2xl p-7 border border-gray-700 hover:border-red-600/50 transition-colors duration-300 h-full">
                    <div class="text-6xl font-black text-red-600/20 mb-4 leading-none">01</div>
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Request a Quote</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Share your project details — service type, quantity, timeline, and any files — via our quote form or email.</p>
                </div>
                {{-- Arrow connector --}}
                <div class="hidden lg:block absolute top-1/2 -right-4 z-10">
                    <svg class="w-8 h-8 text-red-600/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </div>
            </div>

            <div class="relative">
                <div class="bg-gray-800 rounded-2xl p-7 border border-gray-700 hover:border-red-600/50 transition-colors duration-300 h-full">
                    <div class="text-6xl font-black text-red-600/20 mb-4 leading-none">02</div>
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Review & Approve</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">We send a detailed estimate and design proof. You review, give feedback, and approve before production starts.</p>
                </div>
                <div class="hidden lg:block absolute top-1/2 -right-4 z-10">
                    <svg class="w-8 h-8 text-red-600/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </div>
            </div>

            <div class="relative">
                <div class="bg-gray-800 rounded-2xl p-7 border border-gray-700 hover:border-red-600/50 transition-colors duration-300 h-full">
                    <div class="text-6xl font-black text-red-600/20 mb-4 leading-none">03</div>
                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Production Begins</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Our in-house team takes over — design, print, finishing, QC. We keep you updated at every milestone.</p>
                </div>
                <div class="hidden lg:block absolute top-1/2 -right-4 z-10">
                    <svg class="w-8 h-8 text-red-600/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </div>
            </div>

            <div>
                <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl p-7 border border-red-500 h-full">
                    <div class="text-6xl font-black text-white/20 mb-4 leading-none">04</div>
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Delivery</h3>
                    <p class="text-white/80 text-sm leading-relaxed">Your finished product is dispatched or ready for pickup. Quality-checked and packaged with care — exactly as approved.</p>
                </div>
            </div>

        </div>

        <div class="text-center mt-12">
            <a href="{{ route('quote') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-red-600 hover:bg-red-700
                      text-white font-bold rounded-xl shadow-lg transition-all duration-200">
                Start a Project Now
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     THE ALET GROUP — 3 Subsidiaries
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14">
            <p class="text-red-600 font-semibold text-sm uppercase tracking-widest mb-3">Our Group</p>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-5">
                Alet Inspirationz Group
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Three registered companies. One shared mission. Covering print, digital, and e-commerce — all under one Nigerian group.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-gray-900 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-red-600/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative z-10">
                    <div class="inline-block bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full mb-5">Main Entity</div>
                    <h3 class="text-xl font-bold text-white mb-2">Alet Inspirationz Prints Limited</h3>
                    <p class="text-xs text-gray-400 mb-4">RC: 1878085</p>
                    <p class="text-gray-300 text-sm leading-relaxed mb-5">
                        The flagship company — delivering print, creative design, packaging, branding, signage, and publishing services across Nigeria.
                    </p>
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-1.5 text-red-400 hover:text-red-300 text-sm font-semibold transition-colors">
                        Learn more <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative z-10">
                    <div class="inline-block bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-5">Digital Agency</div>
                    <h3 class="text-xl font-bold text-white mb-2">AI Digital Agency</h3>
                    <p class="text-xs text-blue-300 mb-4">RC: 1911945</p>
                    <p class="text-blue-100 text-sm leading-relaxed mb-5">
                        Digital marketing, web design, social media strategy, and creative content production for businesses across Nigeria and beyond.
                    </p>
                    <span class="inline-flex items-center gap-1.5 text-blue-300 text-sm font-semibold">
                        Coming soon <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                </div>
            </div>

            <div class="bg-gradient-to-br from-emerald-900 to-emerald-800 rounded-2xl p-8 text-white relative overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative z-10">
                    <div class="inline-block bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-5">E-Commerce</div>
                    <h3 class="text-xl font-bold text-white mb-2">Printbuka.com</h3>
                    <p class="text-xs text-emerald-300 mb-4">RC: 1905426</p>
                    <p class="text-emerald-100 text-sm leading-relaxed mb-5">
                        Online print ordering platform — bringing Alet's quality printing to customers nationwide through a simple, self-service digital storefront.
                    </p>
                    <span class="inline-flex items-center gap-1.5 text-emerald-300 text-sm font-semibold">
                        Coming soon <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     FAQ TEASER — 3 Top Questions
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 lg:py-28 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <p class="text-red-600 font-semibold text-sm uppercase tracking-widest mb-3">Common Questions</p>
            <h2 class="text-4xl font-bold text-gray-900 mb-5">Things People Ask Us</h2>
            <p class="text-gray-600 text-lg">Quick answers to the most frequent questions from new clients.</p>
        </div>

        <div class="space-y-4">
            @php
                $topFaqs = [
                    [
                        'q' => 'How do I get a quote for my print job?',
                        'a' => 'Visit our Get a Quote page, fill in the project details form, and we respond within 24 business hours with a detailed estimate. You can also email info@aletinspirationz.com directly.',
                    ],
                    [
                        'q' => 'How long does a print job typically take?',
                        'a' => '24–72 hours for digital printing, 3–5 business days for large offset runs, and up to 7–10 days for complex packaging or publishing projects. Rush orders are available on request.',
                    ],
                    [
                        'q' => 'Is Alet Inspirationz a registered Nigerian company?',
                        'a' => 'Yes. Alet Inspirationz Prints Limited is CAC-registered (RC: 1878085) — a fully indigenous Nigerian company headquartered in Lagos, established in 2023.',
                    ],
                ];
            @endphp

            @foreach($topFaqs as $i => $faq)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }">
                <button class="w-full flex items-center justify-between gap-4 text-left focus:outline-none" @click="open = !open">
                    <span class="font-semibold text-gray-900 text-base">{{ $faq['q'] }}</span>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-cloak class="mt-4 text-gray-600 text-sm leading-relaxed border-t border-gray-50 pt-4">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('faq') }}"
               class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition-colors">
                See all 12 frequently asked questions
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════
     CTA BANNER
     ═══════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-gradient-to-br from-gray-900 via-red-900 to-red-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-600/20 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-7">
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
            Ready to Bring Your<br class="hidden sm:block">
            <span class="text-red-300">Project to Life?</span>
        </h2>
        <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto">
            Whether you need 500 flyers, a full brand identity, custom packaging, or a school yearbook — we're ready.
            Tell us about your project and let's get started.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('quote') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-4
                      bg-white text-red-700 hover:bg-gray-50
                      font-bold text-lg rounded-xl shadow-xl hover:shadow-2xl
                      transform hover:scale-105 transition-all duration-200">
                Get a Free Quote
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 px-8 py-4
                      bg-transparent border-2 border-white/40 hover:border-white/70 text-white
                      font-semibold text-lg rounded-xl transition-all duration-200">
                Talk to Us
            </a>
        </div>
        <p class="text-gray-400 text-sm">
            Call us:
            <a href="tel:+2348000000000" class="text-white hover:text-red-300 font-medium transition-colors">+234 800 000 0000</a>
            &nbsp;&bull;&nbsp;
            Email:
            <a href="mailto:info@aletinspirationz.com" class="text-white hover:text-red-300 font-medium transition-colors">info@aletinspirationz.com</a>
        </p>
    </div>
</section>

<style>[x-cloak] { display: none !important; }</style>

@endsection
