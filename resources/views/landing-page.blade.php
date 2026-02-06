@extends('layouts.theme')
@section('title', 'Join the Waitlist - Alet Inspirationz Prints')
@section('content')

{{-- Hero Section --}}
<header class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Video Background --}}
    <div class="absolute inset-0">
        <video class="h-full w-full object-cover" autoplay muted loop playsinline
            poster="{{ asset('/images/hero-poster.jpg') }}">
            <source src="{{ asset('/vid.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/70"></div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-20">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight">
                A Smarter Way to Create,<br class="hidden sm:block"> Print & Deliver
            </h1>
            
            <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto">
                by <span class="font-semibold text-white">Alet Inspirationz Prints Limited</span>
            </p>
            
            <div class="space-y-4 text-base sm:text-lg text-gray-100 max-w-2xl mx-auto">
                <p>We are currently building our website 🚀</p>
                <p class="font-medium">Be the first to be notified when we go live!</p>
            </div>

            <div>
                <a href="#waitForm" class="bg-gradient-to-r from-red-600 to-red-800 p-4 text-white font-bold rounded-lg"> Join the Waitlist</a>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</header>

{{-- Main Content --}}
<main class="bg-gray-50">
    
    {{-- Introduction Section --}}
    <section class="py-20 lg:py-28 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-6">
                <p class="text-xl sm:text-2xl lg:text-3xl leading-relaxed text-gray-700 font-light">
                    At <span class="font-semibold text-gray-900">Alet Inspirationz Prints</span>, we've always been about turning ideas into quality, tangible results.
                </p>
                <p class="text-xl sm:text-2xl lg:text-3xl leading-relaxed text-gray-700 font-light max-w-4xl mx-auto">
                    Now, we are taking things further with a platform designed to give our clients more <span class="font-semibold text-red-600">clarity, control, and confidence</span> from start to finish.
                </p>
                <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto pt-4">
                    No guesswork. No endless follow-ups. Just structured processes, transparent progress, and reliable delivery.
                </p>
            </div>
        </div>
    </section>

    {{-- What to Expect Section --}}
    <section class="py-20 lg:py-28 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Section Header with Image --}}
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-20">
                <div class="space-y-6">
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900">
                        What to Expect
                    </h2>
                    <p class="text-2xl sm:text-3xl text-red-600 font-semibold">
                        The Alet Inspirationz Experience Reimagined
                    </p>
                    <p class="text-lg sm:text-xl text-gray-700 leading-relaxed">
                        We are building a smarter digital experience that brings our creative, printing, and production services into one powerful system.
                    </p>
                    <p class="text-lg text-gray-600">
                        Here's what to expect from the first release:
                    </p>
                </div>
                
                <div class="relative order-first lg:order-last">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-300">
                        <img 
                            src="https://thumbs.dreamstime.com/b/colorful-printing-process-modern-press-vibrant-action-showcasing-sheets-being-printed-various-hues-image-captures-369139979.jpg" 
                            alt="Modern printing press"
                            class="w-full h-full object-cover"
                        />
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-tr from-red-600/20 to-red-800/20 rounded-2xl transform rotate-2"></div>
                </div>
            </div>

            {{-- Features Grid --}}
            <div class="grid md:grid-cols-2 gap-8 lg:gap-10">
                
                {{-- Feature 1 --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-10 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-red-800 rounded-xl flex items-center justify-center text-white text-xl font-bold shadow-lg">
                            1
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight">
                            Your Personal Project Portal
                        </h3>
                    </div>
                    <p class="text-gray-600 text-lg mb-6">
                        A centralized dashboard where you can track the progress of all your jobs and projects with Alet Inspirationz Prints.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">See updates in real time</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Understand timelines clearly</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Stay informed from submission to delivery</span>
                        </li>
                    </ul>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-10 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-red-800 rounded-xl flex items-center justify-center text-white text-xl font-bold shadow-lg">
                            2
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight">
                            Smart Project Estimator
                        </h3>
                    </div>
                    <p class="text-gray-600 text-lg mb-6">
                        Built to help you plan better before you commit. Our estimator allows you to:
                    </p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Make realistic cost estimates</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Understand project scope upfront</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Budget confidently for any creative or print project</span>
                        </li>
                    </ul>
                    <p class="text-gray-900 font-semibold italic">
                        No surprises. Just informed decisions.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-10 hover:shadow-xl  md:col-span-2 transition-shadow duration-300">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-red-800 rounded-xl flex items-center justify-center text-white text-xl font-bold shadow-lg">
                            3
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight">
                            Create Job Orders Instantly
                        </h3>
                    </div>
                    <p class="text-gray-600 text-lg mb-6">
                        Submit job orders directly on our website quickly and seamlessly.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Provide project details once</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Get your work moving faster</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700">Enjoy a smoother, more efficient workflow</span>
                        </li>
                    </ul>
                </div>

                {{-- Feature 4 - Services (Spans 2 columns) --}}
                <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl shadow-lg p-8 lg:p-10 md:col-span-2 text-white hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white text-xl font-bold">
                            4
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-bold leading-tight">
                            Our Products & Services
                        </h3>
                    </div>
                    <p class="text-lg mb-8 text-white/90">
                        At Alet Inspirationz Prints, we provide a full range of creative, printing, and production solutions:
                    </p>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Ideas Conceptualization & Graphic Design</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Corporate Identity & Brand Consultancy</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Packaging Design and Production</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Digital, Offset & Large Format Printing</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Printing & Publishing</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Web Graphics & Designs</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Signages & Monogramming</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Schools' Writing Materials & Yearbooks</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Corporate Gifts & Awards</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Printing Consumables Supply</span>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm">Training & Consultancy</span>
                        </div>
                    </div>
                    <p class="text-lg font-semibold mt-8 text-center">
                        Everything you need, delivered with professionalism and attention to detail.
                    </p>
                </div>

            </div>
        </div>
    </section>

     {{-- Waitlist CTA Section --}}
    <section id="waitForm" class="py-20 lg:py-32 bg-gradient-to-br from-gray-900 via-red-900 to-red-900 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            {{-- Section Header --}}
            <div class="text-center space-y-6 mb-16">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white">
                    Join the Waitlist
                </h2>
                <p class="text-2xl sm:text-3xl text-red-300 font-semibold">
                    Be the First to Experience What's Next
                </p>
                <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto leading-relaxed">
                    This platform is an extension of the Alet Inspirationz commitment to quality, efficiency, and excellence.
                </p>
            </div>

            {{-- Two Column Layout: Benefits & Form --}}
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
                
                {{-- Left Column: Benefits --}}
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-white mb-6">Why Join Early?</h3>
                    
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-lg mb-2">Early Access</h4>
                                <p class="text-gray-300">Priority use of the platform and project estimator when we launch</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-lg mb-2">Faster Job Initiation</h4>
                                <p class="text-gray-300">Get started immediately when we launch with streamlined processes</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-lg mb-2">Direct Updates</h4>
                                <p class="text-gray-300">Receive important updates quickly via WhatsApp and email</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-lg mb-2">Your Data is Safe</h4>
                                <p class="text-gray-300">We only use your info for platform updates and service communication</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Waitlist Form --}}
                <div class="lg:sticky lg:top-24">
                    <form action="#" method="POST" class="bg-white rounded-2xl shadow-2xl p-8 lg:p-10">
                        @csrf
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Reserve Your Spot</h3>
                        
                        <div class="space-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="Enter your full name"
                                />
                            </div>

                            <div>
                                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">
                                    WhatsApp Number <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    id="whatsapp" 
                                    name="whatsapp" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="+234 800 000 0000"
                                />
                            </div>

                            <div>
                                <label for="email_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    id="email_address" 
                                    name="email" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                                    placeholder="your.email@example.com"
                                />
                            </div>

                            <div class="bg-red-50 border border-red-100 rounded-lg p-4 text-sm text-gray-600">
                                <p class="font-medium text-gray-700 mb-2">We collect this information to:</p>
                                <ul class="space-y-1.5 ml-4">
                                    <li class="flex items-start gap-2">
                                        <span class="text-red-600 mt-1">•</span>
                                        <span>Notify you as soon as the platform goes live</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-red-600 mt-1">•</span>
                                        <span>Share important updates quickly via WhatsApp</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-red-600 mt-1">•</span>
                                        <span>Send detailed launch information by email</span>
                                    </li>
                                </ul>
                                <p class="mt-3 text-xs font-medium text-gray-700">
                                    No spam. Just clear communication and early access.
                                </p>
                            </div>

                            <button 
                                type="submit" 
                                class="w-full px-8 py-4 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-bold text-lg rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                            >
                                Join the Waitlist Now
                            </button>

                            <p class="text-xs text-center text-gray-500">
                                🔒 Your information is safe with Alet Inspirationz and will only be used for platform updates and service communication.
                            </p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main>

@endsection