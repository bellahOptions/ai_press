@extends('layouts.theme')

@section('title', 'About Us — Alet Inspirationz Prints Limited')

@section('content')

{{-- Hero --}}
<section class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10"
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/60 via-gray-900/80 to-gray-900"></div>
    <div class="relative max-w-6xl mx-auto px-4 py-28 text-center">
        <span class="inline-block bg-red-600/20 border border-red-500/40 text-red-300 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">About Us</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
            Printing with <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600">Purpose</span> &amp; Passion
        </h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
            An indigenous Nigerian creative powerhouse delivering world-class printing, branding, and digital solutions since 2023.
        </p>
    </div>
</section>

{{-- Our Story --}}
<section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-red-600 text-sm font-bold uppercase tracking-widest">Our Story</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3 mb-6">Born from a Vision to Inspire</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Alet Inspirationz Group was established with a singular purpose — to close the gap between ideas and extraordinary execution in the African creative industry. What began as a bold printing venture in Lagos has grown into a multi-company group spanning print production, digital agency services, and online print commerce.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Under the flagship brand <strong class="text-gray-800">Alet Inspirationz Prints Ltd</strong> (RC: 1878085), we serve businesses of all sizes — from startups seeking their first corporate identity to established enterprises requiring large-scale print and packaging solutions.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Every project we take on reflects our unwavering commitment to integrity, excellence, and client-centred service delivery.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl p-7 text-white">
                    <div class="text-4xl font-extrabold mb-1">2023</div>
                    <div class="text-red-200 text-sm font-medium">Year Founded</div>
                </div>
                <div class="bg-gray-900 rounded-2xl p-7 text-white">
                    <div class="text-4xl font-extrabold mb-1">11+</div>
                    <div class="text-gray-400 text-sm font-medium">Services Offered</div>
                </div>
                <div class="bg-gray-900 rounded-2xl p-7 text-white">
                    <div class="text-4xl font-extrabold mb-1">3</div>
                    <div class="text-gray-400 text-sm font-medium">Subsidiary Companies</div>
                </div>
                <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl p-7 text-white">
                    <div class="text-4xl font-extrabold mb-1">100%</div>
                    <div class="text-red-200 text-sm font-medium">Indigenous Nigerian</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-red-600 text-sm font-bold uppercase tracking-widest">What Drives Us</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3">Mission &amp; Vision</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-10 border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To provide our clients with the highest allied quality printing products and services coupled with exceptional and impeccable service delivery and solutions geared towards optimal client satisfaction.
                </p>
            </div>
            <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl shadow-lg p-10">
                <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Our Vision</h3>
                <p class="text-red-100 leading-relaxed">
                    To become an outstanding brand and a pacesetter in the creative and printing industry globally.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Core Values --}}
<section class="bg-gray-900 py-20">
    <div class="absolute inset-0 opacity-5 pointer-events-none"
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-red-400 text-sm font-bold uppercase tracking-widest">What We Stand For</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">Our Core Values</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @php
            $values = [
                ['name'=>'Integrity','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z','desc'=>'We operate with honesty and transparency in every engagement.'],
                ['name'=>'Excellence','icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z','desc'=>'We set the highest standards and never compromise on quality.'],
                ['name'=>'Professionalism','icon'=>'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z','desc'=>'Every interaction reflects structured, courteous, and skilled conduct.'],
                ['name'=>'Innovativeness','icon'=>'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z','desc'=>'We embrace fresh ideas and creative problem-solving at every turn.'],
                ['name'=>'Client Centred','icon'=>'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z','desc'=>'Our clients are at the heart of every decision we make.'],
            ];
            @endphp
            @foreach($values as $i => $val)
            <div class="bg-gray-800 rounded-2xl p-6 text-center border border-gray-700 hover:border-red-600/50 transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-800 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $val['icon'] }}"/>
                    </svg>
                </div>
                <div class="text-xs font-bold text-red-400 uppercase tracking-widest mb-2">0{{ $i + 1 }}</div>
                <h3 class="text-white font-bold text-base mb-2">{{ $val['name'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $val['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our Group --}}
<section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-red-600 text-sm font-bold uppercase tracking-widest">The Group</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3">Our Subsidiaries</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Three specialized companies, one shared commitment to creative excellence.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-br from-red-600 to-red-800 p-7">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg">Alet Inspirationz Prints Ltd</h3>
                    <p class="text-red-200 text-xs mt-1">RC: 1878085</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Our flagship print production company offering end-to-end printing, packaging, and branding solutions across Nigeria.</p>
                </div>
            </div>
            <div class="rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gray-900 p-7">
                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg">AI Digital Agency</h3>
                    <p class="text-gray-400 text-xs mt-1">RC: 1911945</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Full-service digital agency specializing in web design, digital marketing, brand strategy, and online presence management.</p>
                </div>
            </div>
            <div class="rounded-2xl border border-gray-100 shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-br from-red-700 to-gray-900 p-7">
                    <div class="w-10 h-10 bg-white/15 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg">Printbuka.com</h3>
                    <p class="text-red-200 text-xs mt-1">RC: 1905426 · by AletInspirationz</p>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 text-sm leading-relaxed">Nigeria's emerging online print marketplace — making professional print services accessible, affordable, and delivered to your door.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-red-600 to-red-800 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Ready to Work with Us?</h2>
        <p class="text-red-100 text-lg mb-8">Let's bring your ideas to life with quality, speed, and creativity.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('quote') }}"
               class="inline-flex items-center justify-center gap-2 bg-white text-red-700 font-bold px-8 py-4 rounded-xl hover:bg-gray-50 transition-all duration-300 hover:scale-105 shadow-lg">
                Get a Free Quote
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 border-2 border-white/50 text-white font-bold px-8 py-4 rounded-xl hover:bg-white/10 transition-all duration-300">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection
