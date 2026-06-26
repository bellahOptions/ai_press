@extends('layouts.theme')
@section('title', 'Printing FAQs — Alet Inspirationz Lagos | Common Questions Answered')

@section('content')

{{-- Hero --}}
<section class="bg-gray-900 py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-red-600 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-red-800 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 bg-red-600/20 border border-red-500/30 text-red-400 text-sm font-semibold px-4 py-2 rounded-full mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Frequently Asked Questions
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Everything You Want to Know About
            <span class="bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent block mt-1">Our Printing Services</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Quick, honest answers to the most common questions from our clients across Lagos and Nigeria.
        </p>
    </div>
</section>

{{-- FAQ Accordion --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Categories intro --}}
        <div class="text-center mb-12">
            <p class="text-gray-600">Can't find your answer here?
                <a href="{{ route('contact') }}" class="text-red-600 font-semibold hover:text-red-700">Contact us directly</a>
                — we respond within 24 hours.
            </p>
        </div>

        <div class="space-y-4" x-data="{ open: 0 }">
            @foreach($faqs as $i => $faq)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <button
                    class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left font-semibold text-gray-900 hover:text-red-600 transition-colors duration-150 focus:outline-none"
                    @click="open = (open === {{ $i }}) ? null : {{ $i }}"
                >
                    <span class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 rounded-full bg-red-600 text-white text-xs font-bold flex items-center justify-center mt-0.5">{{ $i + 1 }}</span>
                        <span>{{ $faq['question'] }}</span>
                    </span>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 transition-transform duration-200"
                         :class="{ 'rotate-180': open === {{ $i }} }"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div
                    x-show="open === {{ $i }}"
                    x-collapse
                    x-cloak
                    class="px-6 pb-6"
                >
                    <div class="pl-10 text-gray-600 leading-relaxed border-t border-gray-50 pt-4">
                        {{ $faq['answer'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- Still have questions --}}
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-6">

            {{-- Contact card --}}
            <div class="bg-gray-900 rounded-2xl p-8 text-white">
                <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Still have questions?</h3>
                <p class="text-gray-300 text-sm mb-5">Our team is ready to answer anything. Reach us via email or our contact form.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors duration-150 text-sm">
                    Send us a message
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            {{-- Quote card --}}
            <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl p-8 text-white">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Ready to start a project?</h3>
                <p class="text-white/80 text-sm mb-5">Get a free, no-obligation quote tailored to your specific print job. We respond within 24 business hours.</p>
                <a href="{{ route('quote') }}" class="inline-flex items-center gap-2 bg-white text-red-700 hover:bg-gray-50 font-semibold px-5 py-2.5 rounded-xl transition-colors duration-150 text-sm">
                    Get a free quote
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>

<style>
    [x-cloak] { display: none !important; }
</style>

<script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>

@endsection
