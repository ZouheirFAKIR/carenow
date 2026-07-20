<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CareNow')</title>
    <link rel="icon" href="{{ asset('images/LogoPNG.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@0.462.0/dist/umd/lucide.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --header-height: 0px;
        }

        .hero-fill {
            height: calc(100vh - var(--header-height));
            /* fallback */
            height: calc(100dvh - var(--header-height));
            /* mobile-safe */
            min-height: 480px;
            /* safety floor so it never gets too short */
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 overflow-x-hidden antialiased">

    <header id="site-header" class="w-full">
        <!-- Top Bar -->
        <div class="bg-gradient-to-r from-[#0f2d40] to-[#1b4560] text-white text-[11px] sm:text-xs">
            <div class="max-w-[1600px] mx-auto px-3 sm:px-6 py-2 sm:py-2.5 flex flex-wrap items-center justify-between gap-2">
                <div class="flex items-center flex-wrap gap-2 sm:gap-4 divide-x divide-white/20">
                    <a href="tel:+212600000000" class="flex items-center gap-1.5 sm:gap-2 pr-2 sm:pr-4 hover:text-[#80ED99] transition">
                        <i data-lucide="phone" class="w-3 h-3 sm:w-3.5 sm:h-3.5 shrink-0"></i>
                        <span class="whitespace-nowrap">+212 6 00 00 00 00</span>
                    </a>
                    <span class="hidden min-[380px]:flex items-center gap-1.5 sm:gap-2 pl-2 sm:pl-4">
                        <i data-lucide="map-pin" class="w-3 h-3 sm:w-3.5 sm:h-3.5 shrink-0"></i>
                        <span class="whitespace-nowrap">Casablanca, Maroc</span>
                    </span>
                </div>
                <div class="flex items-center gap-2 sm:gap-4">
                    <div class="hidden sm:flex items-center gap-2">
                        <a href="#" class="w-6 h-6 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#80ED99] hover:text-[#0f2d40] transition">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.732-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                            </svg>
                        </a>
                        <a href="#" class="w-6 h-6 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#80ED99] hover:text-[#0f2d40] transition">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.451 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.446-2.136 2.94v5.666H9.355V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124zM7.114 20.452H3.558V9h3.556v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="#" class="w-6 h-6 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#80ED99] hover:text-[#0f2d40] transition">
                            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                    <div class="relative pl-2 sm:pl-4 border-l border-white/20" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-1 sm:gap-1.5 hover:text-[#80ED99] transition">
                            <i data-lucide="globe" class="w-3 h-3 sm:w-3.5 sm:h-3.5 shrink-0"></i>
                            <span>Français</span>
                            <i data-lucide="chevron-down" class="w-2.5 h-2.5 sm:w-3 sm:h-3 transition" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-cloak
                            class="absolute right-0 mt-2 bg-white text-gray-700 rounded-lg shadow-xl w-32 sm:w-36 overflow-hidden z-50">
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-xs sm:text-sm hover:bg-gray-50">🇫🇷 Français</a>
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-xs sm:text-sm hover:bg-gray-50">🇲🇦 العربية</a>
                            <a href="#" class="flex items-center gap-2 px-3 py-2 text-xs sm:text-sm hover:bg-gray-50">🇬🇧 English</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation bar -->
        <nav class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-40 w-full" x-data="{ mobileNav: false }">
            <div class="max-w-[1600px] mx-auto px-3 sm:px-6 py-2.5 sm:py-3.5 flex items-center justify-between gap-2">
                <a href="/" class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                    <img src="{{ asset('images/LogoPNG.png') }}" alt="CareNow" class="h-7 sm:h-10 w-auto">
                    <span class="text-base sm:text-xl font-bold tracking-tight">
                        <span class="text-[#22577A]">Care</span><span class="text-[#38A3A5]">Now</span>
                    </span>
                </a>

                <!-- Desktop Links -->
                <div class="hidden md:flex items-center gap-4 lg:gap-6 text-xs sm:text-sm font-medium text-gray-600">
                    <a href="{{ route('medecins.index') }}" class="hover:text-[#38A3A5] transition">Médecins</a>

                    @auth
                    <a href="{{ route('rendezvous.index') }}" class="hover:text-[#38A3A5] transition">Mes rendez-vous</a>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-1.5 sm:gap-2 bg-[#22577A] text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg hover:bg-[#1b4560] transition">
                            <i data-lucide="user" class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0"></i>
                            <span class="max-w-[120px] truncate">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-3 h-3 sm:w-3.5 sm:h-3.5 transition" :class="open ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-cloak
                            class="absolute right-0 mt-2 bg-white text-gray-700 rounded-xl shadow-xl w-48 sm:w-52 overflow-hidden z-50 border border-gray-100">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm hover:bg-gray-50">
                                <i data-lucide="layout-dashboard" class="w-4 h-4 text-[#22577A]"></i> Tableau de bord
                            </a>
                            <a href="{{ route('rendezvous.index') }}" class="flex items-center gap-2 px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm hover:bg-gray-50">
                                <i data-lucide="calendar" class="w-4 h-4 text-[#22577A]"></i> Mes rendez-vous
                            </a>
                            @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm hover:bg-gray-50 text-[#22577A] font-semibold">
                                <i data-lucide="shield" class="w-4 h-4"></i> Administration
                            </a>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm hover:bg-gray-50">
                                <i data-lucide="settings" class="w-4 h-4 text-[#22577A]"></i> Mon profil
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-100">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-3.5 sm:px-4 py-2.5 sm:py-3 text-xs sm:text-sm text-red-500 hover:bg-red-50">
                                    <i data-lucide="log-out" class="w-4 h-4"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="bg-[#22577A] text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg hover:bg-[#1b4560] transition flex items-center gap-1.5 sm:gap-2">
                        <i data-lucide="user" class="w-3.5 h-3.5 sm:w-4 sm:h-4 shrink-0"></i>
                        <span>Connexion</span>
                    </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileNav = !mobileNav" class="md:hidden p-1.5 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                    <i data-lucide="menu" x-show="!mobileNav" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                    <i data-lucide="x" x-show="mobileNav" x-cloak class="w-5 h-5 sm:w-6 sm:h-6"></i>
                </button>
            </div>

            <!-- Mobile Navigation Drawer -->
            <div x-show="mobileNav" x-cloak class="md:hidden bg-white border-b border-gray-100 px-4 py-3 space-y-2 text-xs sm:text-sm">
                <a href="{{ route('medecins.index') }}" class="block py-2 font-medium text-gray-700 hover:text-[#38A3A5]">Médecins</a>
                @auth
                    <a href="{{ route('rendezvous.index') }}" class="block py-2 font-medium text-gray-700 hover:text-[#38A3A5]">Mes rendez-vous</a>
                    <a href="{{ route('dashboard') }}" class="block py-2 font-medium text-gray-700 hover:text-[#38A3A5]">Tableau de bord</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 font-semibold text-[#22577A]">Administration</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="block py-2 font-medium text-gray-700 hover:text-[#38A3A5]">Mon profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-100">
                        @csrf
                        <button type="submit" class="block w-full text-left py-1.5 font-bold text-red-500">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block w-full text-center bg-[#22577A] text-white py-2 rounded-lg font-semibold mt-2">Connexion</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="w-full">
        @yield('content')
    </main>

    <footer class="bg-[#0f2d40] text-white/70 py-8 sm:py-12 w-full">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <div>
                <div class="flex items-center gap-2 mb-3 sm:mb-4">
                    <img src="{{ asset('images/LogoPNG.png') }}" alt="CareNow" class="h-7 sm:h-8 w-auto">
                    <span class="text-base sm:text-lg font-bold text-white">CareNow</span>
                </div>
                <p class="text-xs sm:text-sm leading-relaxed">Des soins de qualité, disponibles quand vous en avez besoin.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-2 sm:mb-3 text-xs sm:text-sm">Contact</h4>
                <p class="text-xs sm:text-sm mb-1.5 sm:mb-2 flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 shrink-0"></i> +212 6 00 00 00 00</p>
                <p class="text-xs sm:text-sm mb-1.5 sm:mb-2 flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 shrink-0"></i> contact@carenow.ma</p>
                <p class="text-xs sm:text-sm flex items-center gap-2"><i data-lucide="map-pin" class="w-3.5 h-3.5 shrink-0"></i> Casablanca, Maroc</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-2 sm:mb-3 text-xs sm:text-sm">Suivez-nous</h4>
                <div class="flex gap-2.5 sm:gap-3">
                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#38A3A5] transition"><svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.732-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                        </svg></a>
                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#38A3A5] transition"><svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.451 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.446-2.136 2.94v5.666H9.355V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124zM7.114 20.452H3.558V9h3.556v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg></a>
                    <a href="#" class="w-8 h-8 sm:w-9 sm:h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#38A3A5] transition"><svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-white/10 text-center text-[10px] sm:text-xs">
            © {{ date('Y') }} CareNow. Tous droits réservés.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });

        function setHeaderHeightVar() {
            const header = document.getElementById('site-header');
            if (header) {
                document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);
            }
        }

        setHeaderHeightVar();
        window.addEventListener('load', setHeaderHeightVar);
        window.addEventListener('resize', setHeaderHeightVar);

        if (window.ResizeObserver) {
            const header = document.getElementById('site-header');
            if (header) new ResizeObserver(setHeaderHeightVar).observe(header);
        }
    </script>

</body>

</html>