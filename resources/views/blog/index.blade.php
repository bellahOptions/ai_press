@extends('layouts.theme')
@section('title', 'Blog - Learn - Alet Inspirationz Prints')
@section('content')
    <main role="main">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 p-6 lg:p-20 min-h-screen">

            <!-- Left Ad -->
            <div class="hidden lg:block lg:col-span-2 bg-gray-100 p-2 rounded-xl
                order-2 lg:order-1">
                Left Ad
            </div>

            <!-- Main Content -->
            <div class="col-span-1 lg:col-span-8 bg-white p-2 rounded-xl
                order-1 lg:order-2">
                <div x-data="{ activeSlide: 0, slides: 3, timer: null }" x-init="timer = setInterval(() => activeSlide = (activeSlide + 1) % slides, 3000)" class="max-w-full mx-auto relative group">

                    <div class="relative overflow-hidden rounded-lg shadow-xl">
                        <div class="flex transition-transform duration-500 ease-in-out"
                            :style="`transform: translateX(-${activeSlide * 100}%)`">
                            <div class="min-w-full h-64 bg-blue-500 flex items-center justify-center text-white text-4xl">1
                            </div>
                            <div class="min-w-full h-64 bg-green-500 flex items-center justify-center text-white text-4xl">2
                            </div>
                            <div class="min-w-full h-64 bg-purple-500 flex items-center justify-center text-white text-4xl">
                                3</div>
                        </div>
                    </div>

                    <button @click="activeSlide = (activeSlide - 1 + slides) % slides; clearInterval(timer)"
                        class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2.5 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button @click="activeSlide = (activeSlide + 1) % slides; clearInterval(timer)"
                        class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2.5 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>

                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                        <template x-for="i in slides" :key="i">
                            <button @click="activeSlide = i - 1; clearInterval(timer)"
                                class="w-3 h-3 rounded-full transition-colors"
                                :class="activeSlide === i - 1 ? 'bg-white' : 'bg-white/50'">
                            </button>
                        </template>
                    </div>
                </div>
                {{-- Blog Posts --}}
<div class="Blogs py-8 px-4 md:px-10">

    <div class="max-w-4xl mx-auto mt-10 md:mt-20 border-b-4 border-gray-200 pb-8">

        <div class="flex flex-col md:flex-row gap-6 bg-white border border-gray-200 rounded-xl p-5 items-start">

            <!-- Image -->
            <div class="w-full md:w-40 flex-shrink-0">
                <img 
                    class="w-full h-48 md:h-40 object-cover rounded-lg"
                    loading="lazy"
                    src="https://www.placehold.co/300x300"
                    alt="Post image">
            </div>

            <!-- Content -->
            <div class="flex flex-col gap-4 flex-1">

                <h2 class="text-xl md:text-2xl font-bold">
                    Post Title
                </h2>

                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>

                <!-- CTA -->
                <a href="#" 
                   class="inline-flex items-center gap-2 bg-gray-800 text-white rounded-lg px-4 py-2 text-sm md:text-base w-fit hover:bg-gray-700 transition">

                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 
                            1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 
                            00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 
                            5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 
                            00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 
                            1 0 10-1.414-1.414l-1.5 1.5a2 2 0 
                            11-2.828-2.828l3-3z"
                            clip-rule="evenodd">
                        </path>
                    </svg>

                    Learn More →
                </a>

            </div>

        </div>

    </div>

</div>

                    
                </div>
            </div>

            <!-- Right Ad -->
            <div class="hidden lg:block lg:col-span-2 bg-gray-300 p-2 rounded-xl
                order-3">
                Right Ad
            </div>

        </div>

    </main>
@endsection
