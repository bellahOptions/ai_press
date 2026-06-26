<header class="bg-white/95 backdrop-blur-sm shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">

            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ route('landingPage') }}" class="block">
                    <img
                        src="{{ asset('/logo.svg') }}"
                        alt="Alet Inspirationz Logo"
                        class="h-8 md:h-10 w-auto transition-transform duration-200 hover:scale-105"
                    />
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center space-x-1">
                @php
                    $navLinks = [
                        ['label' => 'Home',     'route' => 'landingPage'],
                        ['label' => 'About',    'route' => 'about'],
                        ['label' => 'Services', 'route' => 'services'],
                        ['label' => 'Blog',     'route' => 'blog'],
                        ['label' => 'FAQ',      'route' => 'faq'],
                        ['label' => 'Contact',  'route' => 'contact'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    @php $active = request()->routeIs($link['route']); @endphp
                    <a href="{{ route($link['route']) }}"
                       class="group relative px-3 py-2 text-sm font-medium transition-colors duration-200 rounded-lg
                              {{ $active
                                  ? 'text-red-600'
                                  : 'text-gray-700 hover:text-red-600 hover:bg-red-50' }}">
                        {{ $link['label'] }}
                        <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-red-600 rounded-full
                                     transition-all duration-300
                                     {{ $active ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"></span>
                    </a>
                @endforeach
            </div>

            {{-- Desktop CTAs --}}
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('quote') }}"
                   class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-800 hover:from-red-700 hover:to-red-900
                          text-white text-sm font-semibold rounded-xl shadow-md hover:shadow-lg
                          transform hover:scale-105 transition-all duration-200">
                    Get a Free Quote
                </a>
                @auth
                <a href="{{ route('dashboard') }}"
                   class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold
                          rounded-xl border border-gray-200 transition-all duration-200">
                    My Account
                </a>
                @else
                <a href="{{ route('login') }}"
                   class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-semibold
                          rounded-xl border border-gray-200 transition-all duration-200">
                    Sign In
                </a>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button
                id="mobileMenuToggle"
                type="button"
                class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-gray-700
                       hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500
                       transition-colors duration-200"
                aria-expanded="false"
                aria-label="Toggle navigation menu"
            >
                <svg id="menuIconOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg id="menuIconClose" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="px-4 pt-3 pb-5 space-y-1">
            @foreach($navLinks as $link)
                @php $active = request()->routeIs($link['route']); @endphp
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-base font-medium transition-colors duration-200
                          {{ $active
                              ? 'bg-red-50 text-red-600 border border-red-100'
                              : 'text-gray-700 hover:bg-red-50 hover:text-red-600' }}">
                    @if($active)
                    <span class="w-1.5 h-1.5 rounded-full bg-red-600 flex-shrink-0"></span>
                    @endif
                    {{ $link['label'] }}
                </a>
            @endforeach

            <div class="pt-4 space-y-3 border-t border-gray-100 mt-3">
                <a href="{{ route('quote') }}" class="flex items-center justify-center gap-2 w-full px-5 py-3
                   bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-xl shadow-md
                   transition-all duration-200">
                    Get a Free Quote
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                @auth
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-full px-5 py-3
                   bg-gray-100 text-gray-800 font-semibold rounded-xl border border-gray-200 transition-all duration-200">
                    My Account
                </a>
                @else
                <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-5 py-3
                   bg-gray-100 text-gray-800 font-semibold rounded-xl border border-gray-200 transition-all duration-200">
                    Sign In
                </a>
                @endauth
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle  = document.getElementById('mobileMenuToggle');
        const menu    = document.getElementById('mobileMenu');
        const iconOpen  = document.getElementById('menuIconOpen');
        const iconClose = document.getElementById('menuIconClose');

        if (!toggle || !menu) return;

        toggle.addEventListener('click', function () {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            menu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
            toggle.setAttribute('aria-expanded', !expanded);
        });

        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });

        document.addEventListener('click', function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>
@endpush
