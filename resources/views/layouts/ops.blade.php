<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ops Dashboard') — Alet Ops</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/apexcharts" defer></script>
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-link { @apply flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:bg-gray-800 hover:text-white transition-all duration-150; }
        .sidebar-link.active { @apply bg-red-600/20 text-red-400 border border-red-600/30; }
        .sidebar-section { @apply text-xs font-bold uppercase tracking-widest text-gray-600 px-3 mb-2 mt-6 first:mt-3; }
    </style>
</head>
<body class="h-full" x-data="{ sidebarOpen: false }">

<div class="flex h-full min-h-screen">

    {{-- Sidebar --}}
    <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-gray-950 border-r border-gray-800 z-30">
        @include('layouts.ops-sidebar')
    </aside>

    {{-- Mobile sidebar overlay --}}
    <div class="lg:hidden" x-show="sidebarOpen" x-cloak>
        <div class="fixed inset-0 bg-black/60 z-40" @click="sidebarOpen = false"></div>
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-950 border-r border-gray-800 z-50 flex flex-col">
            @include('layouts.ops-sidebar')
        </div>
    </div>

    {{-- Main content --}}
    <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">

        {{-- Top bar --}}
        <header class="sticky top-0 z-20 bg-white border-b border-gray-200 shadow-sm">
            <div class="flex items-center justify-between h-14 px-4 lg:px-6">
                <div class="flex items-center gap-3">
                    <button class="lg:hidden text-gray-500 hover:text-gray-900" @click="sidebarOpen = !sidebarOpen">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-base font-bold text-gray-900">@yield('page-title', 'Operations')</h1>
                </div>
                <div class="flex items-center gap-4">
                    {{-- Low stock badge --}}
                    @php $lowStockCount = \App\Models\Material::whereColumn('current_stock', '<=', 'reorder_threshold')->where('active', true)->count(); @endphp
                    @if($lowStockCount > 0)
                    <a href="{{ route('ops.inventory.index') }}" class="flex items-center gap-1.5 bg-amber-50 border border-amber-200 text-amber-700 text-xs font-semibold px-2.5 py-1.5 rounded-lg hover:bg-amber-100 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        {{ $lowStockCount }} Low Stock
                    </a>
                    @endif

                    {{-- User dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-sm text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-bold text-xs">
                                {{ substr(auth()->user()->firstName, 0, 1) }}{{ substr(auth()->user()->lastName, 0, 1) }}
                            </div>
                            <span class="hidden sm:block font-medium">{{ auth()->user()->firstName }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-cloak @click.outside="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                            <div class="px-4 py-2 border-b border-gray-50">
                                <p class="text-xs font-bold text-gray-900">{{ auth()->user()->firstName . ' ' . auth()->user()->lastName }}</p>
                                <p class="text-xs text-gray-500">{{ auth()->user()->getRoleNames()->first() }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="mx-4 mt-4 lg:mx-6 bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mx-4 mt-4 lg:mx-6 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
        @endif

        {{-- Page content --}}
        <main class="flex-1 p-4 lg:p-6">
            @yield('content')
        </main>

        <footer class="text-center py-4 text-xs text-gray-400 border-t border-gray-200 bg-white">
            Alet Inspirationz Ops System &mdash; {{ now()->format('Y') }}
        </footer>
    </div>
</div>

@livewireScripts
@stack('scripts')
<script>
    // Initialize Alpine if not already loaded via Livewire
    document.addEventListener('livewire:navigated', () => {
        window.Alpine && window.Alpine.start();
    });
</script>
</body>
</html>
