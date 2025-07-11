<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900">
    {{-- Header --}}
    <header class="fixed top-0 left-0 right-0 z-50 bg-white bg-opacity-90 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
            <a class="flex items-center space-x-2" href="/">
                <img alt="Tesla logo" class="h-11 w-auto object-contain" height="32" src="https://storage.googleapis.com/a1aa/image/226ae27f-4f42-4f5f-af0c-9670296cb4c9.jpg" width="48"/>
            </a>
            <nav class="hidden md:flex space-x-8 font-semibold text-sm">
                <a class="hover:text-gray-700 transition" href="/">Home</a>
                <a class="hover:text-gray-700 transition" href="#">Car</a>
                <a class="hover:text-gray-700 transition" href="#">Accessories</a>
                <a class="hover:text-gray-700 transition" href="#">Blog</a>
            </nav>
            <div class="hidden md:flex space-x-6 font-semibold text-sm">
                @guest
                    <a class="hover:text-gray-700 transition" href="{{ route('login') }}">Login</a>
                    <a class="hover:text-gray-700 transition" href="{{ route('register') }}">Register</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-gray-700 transition bg-transparent border-none p-0 m-0">Logout</button>
                    </form>
                @endguest
            </div>
            <button aria-label="Open menu" class="md:hidden focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-700" id="menu-btn">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
        <nav aria-label="Mobile menu" class="hidden md:hidden bg-white border-t border-gray-200" id="mobile-menu">
            <div class="px-6 py-4 space-y-4 font-semibold text-base">
                <a class="block hover:text-gray-700 transition" href="/">Home</a>
                <a class="block hover:text-gray-700 transition" href="#">Model S</a>
                <a class="block hover:text-gray-700 transition" href="#">Model 3</a>
                <a class="block hover:text-gray-700 transition" href="#">Model X</a>
                <a class="block hover:text-gray-700 transition" href="#">Model Y</a>
                <a class="block hover:text-gray-700 transition" href="#">Solar Roof</a>
                <a class="block hover:text-gray-700 transition" href="#">Solar Panels</a>
                <a class="block hover:text-gray-700 transition" href="#">Powerwall</a>
                <a class="block hover:text-gray-700 transition" href="#">Shop</a>
                @guest
                    <a class="block hover:text-gray-700 transition" href="{{ route('login') }}">Login</a>
                    <a class="block hover:text-gray-700 transition" href="{{ route('register') }}">Register</a>
                    <a class="block hover:text-gray-700 transition" href="{{ route('password.request') }}">Forgot Password</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-gray-700 transition bg-transparent border-none p-0 m-0">Logout</button>
                    </form>
                @endguest
            </div>
        </nav>
    </header>
    <main class="pt-20">
        @yield('content')
    </main>
    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <h3 class="text-white font-semibold mb-4">Tesla</h3>
                <ul class="space-y-2 text-sm">
                    <li><a class="hover:underline" href="#">Model S</a></li>
                    <li><a class="hover:underline" href="#">Model 3</a></li>
                    <li><a class="hover:underline" href="#">Model X</a></li>
                    <li><a class="hover:underline" href="#">Model Y</a></li>
                    <li><a class="hover:underline" href="#">Solar Roof</a></li>
                    <li><a class="hover:underline" href="#">Solar Panels</a></li>
                    <li><a class="hover:underline" href="#">Powerwall</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Shop & Learn</h3>
                <ul class="space-y-2 text-sm">
                    <li><a class="hover:underline" href="#">Shop</a></li>
                    <li><a class="hover:underline" href="#">Account</a></li>
                    <li><a class="hover:underline" href="#">Charging</a></li>
                    <li><a class="hover:underline" href="#">Find Us</a></li>
                    <li><a class="hover:underline" href="#">Support</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Tesla © 2024</h3>
                <ul class="space-y-2 text-sm">
                    <li><a class="hover:underline" href="#">Privacy & Legal</a></li>
                    <li><a class="hover:underline" href="#">Vehicle Recalls</a></li>
                    <li><a class="hover:underline" href="#">Contact</a></li>
                    <li><a class="hover:underline" href="#">Careers</a></li>
                    <li><a class="hover:underline" href="#">News</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-4">Follow Tesla</h3>
                <div class="flex space-x-6 text-gray-400 text-xl">
                    <a aria-label="Tesla Facebook" class="hover:text-white" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a aria-label="Tesla Twitter" class="hover:text-white" href="#"><i class="fab fa-twitter"></i></a>
                    <a aria-label="Tesla Instagram" class="hover:text-white" href="#"><i class="fab fa-instagram"></i></a>
                    <a aria-label="Tesla YouTube" class="hover:text-white" href="#"><i class="fab fa-youtube"></i></a>
                    <a aria-label="Tesla LinkedIn" class="hover:text-white" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if(menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
        const carouselItemsContainer = document.getElementById('carousel-items');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        const carouselDotsContainer = document.getElementById('carousel-dots');

        if (!carouselItemsContainer || !prevButton || !nextButton || !carouselDotsContainer) {
            console.warn("Carousel elements not found. Carousel functionality will not work.");
            return;
        }

        const items = Array.from(carouselItemsContainer.children);
        let currentIndex = 0;

        // Function to update active dot
        const updateDots = () => {
            carouselDotsContainer.innerHTML = ''; // Clear existing dots
            items.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.classList.add('w-3', 'h-3', 'rounded-full', 'bg-gray-400', 'hover:bg-gray-600', 'transition-colors', 'duration-300');
                if (index === currentIndex) {
                    dot.classList.remove('bg-gray-400');
                    dot.classList.add('bg-gray-800'); // Active dot color
                }
                dot.addEventListener('click', () => {
                    currentIndex = index;
                    scrollToCurrentItem();
                });
                carouselDotsContainer.appendChild(dot);
            });
        };

        // Function to scroll to the current item
        const scrollToCurrentItem = () => {
            const itemWidth = carouselItemsContainer.firstElementChild ? carouselItemsContainer.firstElementChild.offsetWidth + (parseInt(getComputedStyle(carouselItemsContainer.firstElementChild).marginRight) || 0) + (parseInt(getComputedStyle(carouselItemsContainer.firstElementChild).paddingLeft) || 0)*2 : 0; // Approximate item width + gap
            carouselItemsContainer.scrollLeft = currentIndex * itemWidth;
            updateDots();
        };
        
        // Initial setup
        updateDots();


        // Previous Slide Button
        prevButton.addEventListener('click', () => {
            currentIndex = Math.max(0, currentIndex - 1);
            scrollToCurrentItem();
        });

        // Next Slide Button
        nextButton.addEventListener('click', () => {
            currentIndex = Math.min(items.length - 1, currentIndex + 1);
            scrollToCurrentItem();
        });

        // Optional: Update current index when user scrolls manually (more complex for precise item detection)
        // For simplicity, we'll just update dots based on scroll position.
        carouselItemsContainer.addEventListener('scroll', () => {
            const scrollPosition = carouselItemsContainer.scrollLeft;
            const itemWidth = carouselItemsContainer.firstElementChild ? carouselItemsContainer.firstElementChild.offsetWidth + (parseInt(getComputedStyle(carouselItemsContainer.firstElementChild).marginRight) || 0) + (parseInt(getComputedStyle(carouselItemsContainer.firstElementChild).paddingLeft) || 0)*2 : 0;
            const newIndex = Math.round(scrollPosition / itemWidth);
            if (newIndex !== currentIndex) {
                currentIndex = newIndex;
                updateDots();
            }
        });

        // Adjust scroll on resize
        window.addEventListener('resize', scrollToCurrentItem);
    });
    </script>
    
</body>
</html>