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
            <div class="hidden md:flex items-center space-x-8">
                <a href="#about" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200">
                    About Us
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#services" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200">
                    Services
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#products" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200">
                    Products
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#contact" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200">
                    Contact Us
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="#blog" class="nav-link group relative text-gray-700 hover:text-red-600 font-medium transition-colors duration-200">
                    Blog
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </div>

            {{-- Desktop CTA Buttons --}}
            <div class="hidden md:flex items-center space-x-4">
                <a href="#quote">
                    <button class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                        Get Quote
                    </button>
                </a>
                <a href="#signup">
                    <button class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-lg border border-gray-300 transition-all duration-200">
                        Create Account
                    </button>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button 
                id="mobileMenuToggle" 
                type="button"
                class="md:hidden inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500 transition-colors duration-200"
                aria-expanded="false"
                aria-label="Toggle navigation menu"
            >
                {{-- Hamburger Icon --}}
                <svg id="menuIconOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                {{-- Close Icon (hidden by default) --}}
                <svg id="menuIconClose" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile Menu (hidden by default) --}}
    <div 
        id="mobileMenu" 
        class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg"
    >
        <div class="px-4 pt-2 pb-4 space-y-1">
            {{-- Mobile Navigation Links --}}
            <a href="#about" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                About Us
            </a>
            <a href="#services" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Services
            </a>
            <a href="#products" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Products
            </a>
            <a href="#contact" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Contact Us
            </a>
            <a href="#blog" class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-200">
                Blog
            </a>

            {{-- Mobile CTA Buttons --}}
            <div class="pt-4 space-y-3">
                <a href="#quote" class="block">
                    <button class="w-full px-5 py-3 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg shadow-md transition-all duration-200">
                        Get Quote
                    </button>
                </a>
                <a href="#signup" class="block">
                    <button class="w-full px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-lg border border-gray-300 transition-all duration-200">
                        Create Account
                    </button>
                </a>
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