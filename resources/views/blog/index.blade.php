@extends('layouts.theme')
@section('title', 'Blog - Insights & Inspiration - Alet Inspirationz Prints')
@section('content')

{{-- Blog Hero --}}
<section class="relative bg-gradient-to-br from-gray-900 via-red-950 to-gray-900 py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-red-600/30 border border-red-500/40 text-red-300 text-sm font-semibold rounded-full mb-6 uppercase tracking-wider">
            Our Blog
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
            Insights, Ideas &<br class="hidden sm:block"> Inspiration
        </h1>
        <p class="text-lg sm:text-xl text-gray-300 max-w-2xl mx-auto">
            Tips, trends, and stories from the world of print, design, and creative production — brought to you by the Alet Inspirationz team.
        </p>

        {{-- Search Bar --}}
        <div class="mt-10 max-w-xl mx-auto">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search articles..."
                    class="w-full px-6 py-4 pr-14 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                />
                <button class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-gradient-to-r from-red-600 to-red-800 rounded-lg flex items-center justify-center hover:from-red-700 hover:to-red-900 transition">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Category Filter --}}
<section class="bg-white border-b border-gray-200 sticky top-[64px] md:top-[80px] z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 py-4 overflow-x-auto scrollbar-hide">
            <button class="flex-shrink-0 px-5 py-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold rounded-full transition">
                All Posts
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Design Tips
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Print Guides
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Branding
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Industry News
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Case Studies
            </button>
            <button class="flex-shrink-0 px-5 py-2 bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-700 text-sm font-medium rounded-full transition">
                Business Growth
            </button>
        </div>
    </div>
</section>

<main class="bg-gray-50 py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">

            {{-- Main Content Area --}}
            <div class="lg:col-span-2 space-y-10">

                {{-- Featured Post --}}
                <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative overflow-hidden">
                        <img
                            src="https://placehold.co/800x420/1f2937/ffffff?text=Featured+Article"
                            alt="Featured post"
                            class="w-full h-64 sm:h-80 object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-gradient-to-r from-red-600 to-red-800 text-white text-xs font-bold uppercase tracking-wider rounded-full">
                            Featured
                        </span>
                        <span class="absolute top-4 right-4 px-3 py-1 bg-black/40 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                            Design Tips
                        </span>
                    </div>
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                June 20, 2026
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                8 min read
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Alet Inspirationz Team
                            </span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 leading-tight mb-4 group-hover:text-red-600 transition-colors duration-200">
                            10 Design Principles Every Business Owner Should Know Before Printing
                        </h2>
                        <p class="text-gray-600 text-base leading-relaxed mb-6">
                            Great print materials don't happen by accident. Before you submit your next design for print, understanding these foundational design principles can save you time, money, and the frustration of reprints. From colour theory to bleed settings, we've got you covered.
                        </p>
                        <div class="flex items-center justify-between">
                            <a href="#"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200 text-sm">
                                Read Article
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            <button class="flex items-center gap-2 text-gray-400 hover:text-red-600 transition-colors text-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                Share
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Section Label --}}
                <div class="flex items-center gap-4">
                    <h3 class="text-xl font-bold text-gray-900">Latest Articles</h3>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>

                {{-- Blog Post Card 1 --}}
                <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="sm:w-56 flex-shrink-0 overflow-hidden">
                            <img
                                src="https://placehold.co/300x200/dc2626/ffffff?text=Print+Guide"
                                alt="Post thumbnail"
                                class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            />
                        </div>
                        <div class="flex flex-col justify-between p-6 flex-1">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Print Guides</span>
                                    <span class="text-xs text-gray-400">5 min read</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 group-hover:text-red-600 transition-colors duration-200">
                                    Understanding CMYK vs RGB: Which Colour Mode Should You Use?
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Confused about why your printed flyers look different from the screen? The answer lies in colour modes. We break down CMYK and RGB in plain English.
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">June 15, 2026</span>
                                <a href="#" class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Blog Post Card 2 --}}
                <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="sm:w-56 flex-shrink-0 overflow-hidden">
                            <img
                                src="https://placehold.co/300x200/7f1d1d/ffffff?text=Branding"
                                alt="Post thumbnail"
                                class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            />
                        </div>
                        <div class="flex flex-col justify-between p-6 flex-1">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Branding</span>
                                    <span class="text-xs text-gray-400">7 min read</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 group-hover:text-red-600 transition-colors duration-200">
                                    Why Consistent Branding Across Print Materials Builds Trust
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Your business card, letterhead, and banners all tell a story. When that story is inconsistent, customers notice. Here's how to align your print identity with your brand.
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">June 10, 2026</span>
                                <a href="#" class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Blog Post Card 3 --}}
                <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="sm:w-56 flex-shrink-0 overflow-hidden">
                            <img
                                src="https://placehold.co/300x200/111827/ffffff?text=Business+Growth"
                                alt="Post thumbnail"
                                class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            />
                        </div>
                        <div class="flex flex-col justify-between p-6 flex-1">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="px-3 py-1 bg-gray-900 text-white text-xs font-semibold rounded-full">Business Growth</span>
                                    <span class="text-xs text-gray-400">6 min read</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 group-hover:text-red-600 transition-colors duration-200">
                                    5 Ways Print Marketing Still Outperforms Digital for Local Businesses
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    In an age dominated by social media, print is far from dead. Discover the specific scenarios where well-executed print campaigns drive better ROI for Nigerian businesses.
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">June 3, 2026</span>
                                <a href="#" class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Blog Post Card 4 --}}
                <article class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row">
                        <div class="sm:w-56 flex-shrink-0 overflow-hidden">
                            <img
                                src="https://placehold.co/300x200/991b1b/ffffff?text=Packaging"
                                alt="Post thumbnail"
                                class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            />
                        </div>
                        <div class="flex flex-col justify-between p-6 flex-1">
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold rounded-full">Design Tips</span>
                                    <span class="text-xs text-gray-400">4 min read</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 group-hover:text-red-600 transition-colors duration-200">
                                    Packaging Design Trends 2026: What Nigerian Brands Are Getting Right
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    From minimalist layouts to vibrant Afrocentric patterns, packaging design in Nigeria is evolving. See which trends are resonating with consumers this year.
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">
                                <span class="text-xs text-gray-400">May 28, 2026</span>
                                <a href="#" class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 font-semibold text-sm transition-colors">
                                    Read More
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Pagination --}}
                <div class="flex items-center justify-center gap-2 pt-4">
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-red-500 hover:text-red-600 transition disabled:opacity-40" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-gradient-to-r from-red-600 to-red-800 text-white font-bold text-sm shadow">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:border-red-500 hover:text-red-600 font-medium text-sm transition">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:border-red-500 hover:text-red-600 font-medium text-sm transition">3</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-red-500 hover:text-red-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8">

                {{-- About the Blog --}}
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-800 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">About This Blog</h3>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Welcome to the Alet Inspirationz blog — your go-to resource for print production tips, design best practices, branding insights, and business growth strategies from our team of creative professionals.
                    </p>
                </div>

                {{-- Categories --}}
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-5">Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                    Design Tips
                                </span>
                                <span class="text-xs bg-red-100 text-red-700 font-semibold px-2.5 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Print Guides
                                </span>
                                <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-full">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Branding
                                </span>
                                <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-full">6</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Industry News
                                </span>
                                <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-full">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Business Growth
                                </span>
                                <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-full">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between group">
                                <span class="text-gray-700 group-hover:text-red-600 text-sm font-medium transition-colors flex items-center gap-2">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                                    Case Studies
                                </span>
                                <span class="text-xs bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-full">4</span>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Popular Posts --}}
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-5">Popular Posts</h3>
                    <div class="space-y-5">
                        <a href="#" class="flex gap-4 group">
                            <div class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden">
                                <img src="https://placehold.co/80x80/dc2626/ffffff?text=01" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-red-600 leading-tight line-clamp-2 transition-colors">
                                    The Ultimate File Preparation Checklist for Offset Printing
                                </p>
                                <p class="text-xs text-gray-400 mt-1">May 20, 2026</p>
                            </div>
                        </a>
                        <a href="#" class="flex gap-4 group">
                            <div class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden">
                                <img src="https://placehold.co/80x80/7f1d1d/ffffff?text=02" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-red-600 leading-tight line-clamp-2 transition-colors">
                                    How to Choose the Right Paper Stock for Your Brand
                                </p>
                                <p class="text-xs text-gray-400 mt-1">May 12, 2026</p>
                            </div>
                        </a>
                        <a href="#" class="flex gap-4 group">
                            <div class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden">
                                <img src="https://placehold.co/80x80/111827/ffffff?text=03" alt="" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"/>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-red-600 leading-tight line-clamp-2 transition-colors">
                                    Corporate Identity Packages: What You Need & Why
                                </p>
                                <p class="text-xs text-gray-400 mt-1">April 30, 2026</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Newsletter CTA --}}
                <div class="bg-gradient-to-br from-gray-900 via-red-950 to-gray-900 rounded-2xl p-6 text-white relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-red-600/30 border border-red-500/40 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2">Get Articles in Your Inbox</h3>
                        <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                            No spam — just fresh insights on print, design, and branding delivered to you weekly.
                        </p>
                        <div class="space-y-3">
                            <input
                                type="email"
                                placeholder="your@email.com"
                                class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-500 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                            />
                            <button class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900 text-white font-semibold text-sm rounded-lg shadow-lg hover:shadow-xl transition-all duration-200">
                                Subscribe Now
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Tags Cloud --}}
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Popular Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#PrintDesign</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Branding</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#CMYK</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Packaging</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Typography</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Nigeria</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#OffsetPrint</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Marketing</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#GraphicDesign</a>
                        <a href="#" class="px-3 py-1.5 bg-gray-100 hover:bg-red-600 hover:text-white text-gray-700 text-xs font-medium rounded-lg transition-all duration-200">#Signage</a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</main>

{{-- CTA Banner --}}
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-2xl p-8 sm:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="text-white">
                <h3 class="text-2xl sm:text-3xl font-bold mb-2">Ready to bring your ideas to life?</h3>
                <p class="text-red-100 text-base sm:text-lg">Submit a job order or get an instant estimate today.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 flex-shrink-0">
                <a href="{{ route('jobs.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white text-red-700 font-bold rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create a Job Order
                </a>
                <a href="{{ route('estimator.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-white/15 hover:bg-white/25 border border-white/30 text-white font-semibold rounded-xl transition-all duration-200 text-sm">
                    Get an Estimate
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
