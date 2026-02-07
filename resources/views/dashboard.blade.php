@extends('layouts.auth.theme')
@section('title', 'Hello' . ' ' . Auth::user()->firstName)
@section('content')
    <main role="main" class="w-full lg:w-[90%] xl:w-[80%] 2xl:w-[70%] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Banner --}}
        <section id="header" class="py-6 md:py-10">
            <div class="flex items-center justify-center">
                <img 
                    src="https://www.placehold.co/1200x300" 
                    alt="Welcome Banner" 
                    class="w-full rounded-xl md:rounded-2xl shadow-lg object-cover max-h-[150px] sm:max-h-[200px] md:max-h-[250px] lg:max-h-[300px]" 
                />
            </div>
        </section>

        {{-- Jobs Management Section --}}
        <section id="job-history" class="pb-8">
            
            {{-- Section Header --}}
            <div class="py-4 md:py-6 border-b-2 md:border-b-4 border-gray-300 mb-6">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900">Jobs Management</h1>
                <p class="text-sm md:text-base text-gray-600 mt-1">Track and manage your print jobs</p>
            </div>

            {{-- Jobs Grid --}}
            <div class="jobs-cards grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                
                {{-- Job Card 1 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    APC Calendar
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">10,000 copies</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Sourcing
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">94 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Action Buttons --}}
                    <div class="action-links bg-gray-50 px-4 py-2 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

                {{-- Job Card 2 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    Company Brochure
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">5,000 copies</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            In Progress
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">48 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-links bg-gray-50 px-4 py-3 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

                {{-- Job Card 3 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    Event Banners
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">50 pieces</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">24 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-links bg-gray-50 px-4 py-3 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

                {{-- Job Card 4 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    Business Cards
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">1,000 copies</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            Printing
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">12 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-links bg-gray-50 px-4 py-3 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

                {{-- Job Card 5 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    Annual Report
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">500 copies</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Pending
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">72 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-links bg-gray-50 px-4 py-3 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

                {{-- Job Card 6 --}}
                <div class="job-card bg-white border-2 border-gray-100 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-lg overflow-hidden">
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                            <img 
                                src="https://www.placehold.co/100x100" 
                                alt="Job thumbnail"
                                class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg flex-shrink-0 object-cover self-start" 
                            />
                            <div class="flex-1 min-w-0">
                                <h3 class="job-name font-bold text-xl md:text-2xl text-gray-900 mb-2 truncate">
                                    Promotional Flyers
                                </h3>
                                <div class="space-y-1 text-sm md:text-base">
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Qty:</span> 
                                        <span class="text-gray-900">2,500 copies</span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Status:</span> 
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            Designing
                                        </span>
                                    </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold text-red-600">Est. Time:</span> 
                                        <span class="text-gray-900">36 hrs</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="action-links bg-gray-50 px-4 py-3 sm:px-5 sm:py-4 flex flex-col sm:flex-row gap-3">
                        <a href="#" class="flex-1 bg-gray-900 hover:bg-gray-800 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                            <span>View Job</span>
                        </a>
                        <a href="#" class="flex-1 bg-red-600 hover:bg-red-700 flex items-center justify-center space-x-2 text-white py-3 px-4 rounded-lg transition-colors duration-200 text-sm md:text-base font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                            </svg>
                            <span>Drop Review</span>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Empty State (show when no jobs) --}}
            {{-- <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No jobs yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new print job.</p>
                <div class="mt-6">
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                        Create New Job
                    </a>
                </div>
            </div> --}}

        </section>
    </main>
@endsection