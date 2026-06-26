@extends('layouts.theme')

@section('title', 'Our Services — Alet Inspirationz Prints Limited')

@section('content')

{{-- Hero --}}
<section class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10"
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/60 via-gray-900/80 to-gray-900"></div>
    <div class="relative max-w-6xl mx-auto px-4 py-28 text-center">
        <span class="inline-block bg-red-600/20 border border-red-500/40 text-red-300 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">What We Do</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
            Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600">Services</span>
        </h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
            From concept to delivery — we offer a comprehensive suite of creative, printing, and branding services tailored to elevate your brand.
        </p>
    </div>
</section>

{{-- Services Grid --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-red-600 text-sm font-bold uppercase tracking-widest">Full Service Range</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3">11 Ways We Serve You</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Every service is backed by skilled professionals, premium materials, and a relentless commitment to quality.</p>
        </div>

        @php
        $services = [
            [
                'num' => '01',
                'name' => 'Ideas Conceptualization & Graphic Design',
                'desc' => 'We transform raw ideas into compelling visual concepts. From initial brainstorming to polished design deliverables, our creative team brings your vision to life with precision and artistry.',
                'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'tags' => ['Logo Design', 'Brochures', 'Flyers', 'Illustrations'],
            ],
            [
                'num' => '02',
                'name' => 'Corporate Identity & Brand Consultancy',
                'desc' => 'Build a brand that resonates. We develop cohesive identity systems — logos, colour palettes, brand guidelines, and strategy — that distinguish your business in a crowded market.',
                'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z',
                'tags' => ['Brand Identity', 'Style Guides', 'Brand Strategy'],
            ],
            [
                'num' => '03',
                'name' => 'Packaging Design & Production',
                'desc' => 'Packaging that sells. We design and produce custom product packaging that stands out on shelves — from food-grade boxes to luxury gift sets and everything in between.',
                'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                'tags' => ['Product Boxes', 'Gift Packaging', 'Labels', 'Cartons'],
            ],
            [
                'num' => '04',
                'name' => 'Digital, Offset & Large Format Printing',
                'desc' => 'State-of-the-art printing technology for every scale. We deliver sharp, vibrant output across digital presses, traditional offset machines, and wide-format printers for banners and outdoor visuals.',
                'icon' => 'M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z',
                'tags' => ['Digital Print', 'Offset', 'Banners', 'Billboards'],
            ],
            [
                'num' => '05',
                'name' => 'Printing & Publishing',
                'desc' => 'From books and magazines to catalogues and reports — we handle complete print publishing projects with professional typesetting, binding, and finishing to world-class standards.',
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'tags' => ['Books', 'Magazines', 'Catalogues', 'Annual Reports'],
            ],
            [
                'num' => '06',
                'name' => 'Web Graphics & Designs',
                'desc' => 'Eye-catching digital visuals designed for the web. We create social media graphics, email templates, website banners, and UI assets that maintain brand consistency across all digital platforms.',
                'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                'tags' => ['Social Media', 'Email Graphics', 'Web Banners', 'UI Assets'],
            ],
            [
                'num' => '07',
                'name' => 'Signages & Monogramming',
                'desc' => 'Make a lasting impression with premium signage. We produce indoor and outdoor signs, vehicle branding, wayfinding systems, and custom monogrammed items for corporate and personal use.',
                'icon' => 'M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9',
                'tags' => ['Outdoor Signs', 'Vehicle Branding', 'Embroidery', 'Engraving'],
            ],
            [
                'num' => '08',
                'name' => "Schools' Writing Materials & Yearbooks",
                'desc' => 'Dedicated solutions for educational institutions. We supply custom-branded exercise books, diaries, yearbooks, graduation programs, and school stationery with school logos and colours.',
                'icon' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222',
                'tags' => ['Exercise Books', 'Yearbooks', 'Diaries', 'School Stationery'],
            ],
            [
                'num' => '09',
                'name' => 'Corporate Gifts & Awards',
                'desc' => 'Strengthen relationships with branded gifts that leave lasting impressions. From personalized plaques and trophies to branded merchandise packages for events, staff, and clients.',
                'icon' => 'M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7',
                'tags' => ['Plaques', 'Trophies', 'Branded Merch', 'Event Gifts'],
            ],
            [
                'num' => '10',
                'name' => 'Printing Consumables Supply',
                'desc' => 'A reliable source for quality printing consumables. We supply inks, toners, papers, and substrates to print bureaus, organizations, and individuals who require consistent, top-grade materials.',
                'icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
                'tags' => ['Inks', 'Toners', 'Paper', 'Print Media'],
            ],
            [
                'num' => '11',
                'name' => 'Training & Consultancy',
                'desc' => 'Equip your team with industry-leading knowledge. We offer practical training programs in graphic design, print production, brand management, and creative entrepreneurship for individuals and organizations.',
                'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                'tags' => ['Workshops', 'Brand Training', 'Print Courses', 'Consultancy'],
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($services as $service)
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-gray-100 hover:border-red-200 transition-all duration-300 hover:-translate-y-1 flex flex-col p-7">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-800 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service['icon'] }}"/>
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-red-400 uppercase tracking-widest mt-1">{{ $service['num'] }}</span>
                </div>
                <h3 class="text-gray-900 font-bold text-lg mb-3 leading-snug">{{ $service['name'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed flex-1">{{ $service['desc'] }}</p>
                <div class="flex flex-wrap gap-2 mt-5">
                    @foreach($service['tags'] as $tag)
                    <span class="bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- How We Work --}}
<section class="bg-gray-900 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-14">
            <span class="text-red-400 text-sm font-bold uppercase tracking-widest">Our Process</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">How We Work</h2>
            <p class="text-gray-400 mt-3 max-w-xl mx-auto">A clear, collaborative process that keeps you informed at every step.</p>
        </div>
        <div class="relative">
            <div class="hidden lg:block absolute top-8 left-1/2 -translate-x-1/2 w-full h-0.5 bg-gradient-to-r from-red-600/20 via-red-600/60 to-red-600/20"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                @foreach([['Consultation','Tell us about your project and goals — we listen and understand your unique requirements.',1],['Design & Proof','Our creative team develops concepts and presents proofs for your review and approval.',2],['Production','Approved designs go to production using precision equipment and quality materials.',3],['Delivery','Finished products are quality-checked and delivered to you on time, every time.',4]] as $step)
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center mx-auto mb-5 text-white font-extrabold text-xl shadow-lg shadow-red-900/30">
                        {{ $step[2] }}
                    </div>
                    <h3 class="text-white font-bold text-base mb-2">{{ $step[0] }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $step[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-red-600 to-red-800 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Let's Start Your Project</h2>
        <p class="text-red-100 text-lg mb-8">Request a free, no-obligation quote and let our team craft the perfect solution for you.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('quote') }}"
               class="inline-flex items-center justify-center gap-2 bg-white text-red-700 font-bold px-8 py-4 rounded-xl hover:bg-gray-50 transition-all duration-300 hover:scale-105 shadow-lg">
                Request a Quote
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 border-2 border-white/50 text-white font-bold px-8 py-4 rounded-xl hover:bg-white/10 transition-all duration-300">
                Talk to Us
            </a>
        </div>
    </div>
</section>

@endsection
