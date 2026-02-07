<header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            
            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="block">
                    <img 
                        src="{{ asset('/logo.svg') }}" 
                        alt="Alet Inspirationz Logo" 
                        class="h-8 md:h-10 w-auto transition-transform duration-200 hover:scale-105"
                    />
                </a>
            </div>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                <a href="#" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200 text-sm xl:text-base">
                    Track Job
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200 text-sm xl:text-base">
                    Estimate Job
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200 text-sm xl:text-base">
                    Lodge New Project
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200 text-sm xl:text-base">
                    Contact Us
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200 text-sm xl:text-base">
                    Open Ticket
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>

            {{-- Desktop Right Section: Notifications & Profile --}}
            <div class="hidden lg:flex items-center space-x-4">
                
                {{-- Notifications Button --}}
                <button 
                    type="button" 
                    class="relative p-2 rounded-full text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-200"
                    aria-label="View notifications"
                >
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    {{-- Notification Badge --}}
                    <span class="absolute top-1 right-1 h-2 w-2 bg-red-600 rounded-full"></span>
                </button>

                {{-- Profile Dropdown --}}
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button 
                        @click="open = !open"
                        class="flex items-center space-x-3 focus:outline-none focus:ring-2 focus:ring-red-500 rounded-lg px-3 py-2 hover:bg-gray-50 transition-colors duration-200"
                    >
                        <img 
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                            alt="{{ Auth::user()->firstName }}" 
                            class="h-9 w-9 rounded-full object-cover ring-2 ring-white shadow-sm" 
                        />
                        <div class="hidden xl:block text-left">
                            <p class="text-sm text-gray-500">Welcome back!</p>
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->firstName }}</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-56 origin-top-right rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        style="display: none;"
                    >
                        <div class="p-2">
                            <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-150">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Your Profile
                            </a>
                            <a href="#" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-150">
                                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </a>
                                                        
                            <hr class="my-2 border-gray-200">
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 rounded-md transition-colors duration-150">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu Button --}}
            <button 
                id="mobileMenuToggle" 
                type="button"
                class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500 transition-colors duration-200"
                aria-expanded="false"
                aria-label="Toggle navigation menu"
            >
                <svg id="menuIconOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="menuIconClose" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile Menu --}}
    <div 
        id="mobileMenu" 
        class="hidden lg:hidden bg-white border-t border-gray-200 shadow-lg"
    >
        <div class="px-4 pt-4 pb-6 space-y-1">
            
            {{-- User Info Mobile --}}
            <div class="flex items-center space-x-3 px-4 py-3 bg-gray-50 rounded-lg mb-4">
                <img 
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                    alt="{{ Auth::user()->firstName }}" 
                    class="h-12 w-12 rounded-full object-cover ring-2 ring-white shadow-sm" 
                />
                <div>
                    <p class="text-xs text-gray-500">Welcome back!</p>
                    <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
                </div>
            </div>

            {{-- Mobile Navigation Links --}}
            <a href="#" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Track Job
            </a>
            <a href="#" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Estimate Job
            </a>
            <a href="#}" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Lodge New Project
            </a>
            <a href="#" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Contact Us
            </a>
            <a href="#" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Open Ticket
            </a>

            {{-- Divider --}}
            <hr class="my-4 border-gray-200">

            {{-- Mobile Account Links --}}
            <a href="#" class="flex items-center px-4 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Your Profile
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Settings
            </a>
            {{-- Sign Out Button --}}
            <div class="pt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

{{-- Mobile Menu Toggle Script --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIconOpen = document.getElementById('menuIconOpen');
        const menuIconClose = document.getElementById('menuIconClose');

        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener('click', function() {
                const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
                
                // Toggle menu visibility
                mobileMenu.classList.toggle('hidden');
                
                // Toggle icons
                menuIconOpen.classList.toggle('hidden');
                menuIconClose.classList.toggle('hidden');
                
                // Update aria-expanded
                mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
            });

            // Close mobile menu when clicking on a link
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideNav = mobileMenuToggle.contains(event.target) || mobileMenu.contains(event.target);
                
                if (!isClickInsideNav && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
</script>
@endpush

{{-- Note: This header requires Alpine.js for the dropdown functionality --}}
{{-- Add to your layout: <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}