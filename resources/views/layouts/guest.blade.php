<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="backdrop-blur-md bg-[#FFF7E8]/90 border-b border-[#E5C07B]/40 shadow-sm" x-data="{ isOpen: false }">
            <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
        
                <!-- Logo -->
                <a href="/" class="flex items-center">
                    <img src="{{ asset('storage/assets/Gusteaus_logo.png') }}"
                        alt="Gusteau Logo"
                        class="h-20 w-auto object-contain drop-shadow-sm">
                </a>
        
                <!-- Mobile Menu Button -->
                <button @click="isOpen = !isOpen"
                    class="md:hidden text-[#3A3A3A] hover:text-[#C9A35A] transition">
                    <svg viewBox="0 0 24 24" class="w-8 h-8 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2z" />
                    </svg>
                </button>
        
                <!-- Desktop Menu -->
                <div :class="isOpen ? 'flex' : 'hidden'"
                    class="flex-col md:flex md:flex-row md:items-center md:space-x-12 mt-6 md:mt-0 
                        space-y-4 md:space-y-0 text-lg font-medium tracking-wide">
        
                    <a href="/" 
                    class="text-[#3A3A3A] hover:text-[#C9A35A] transition duration-200">
                    Home
                    </a>
        
                    <a href="{{ route('menus.index') }}" 
                    class="text-[#3A3A3A] hover:text-[#C9A35A] transition duration-200">
                    Our Menu
                    </a>
        
                    <a href="{{ route('reservations.step.one') }}"
                    class="px-5 py-2 rounded-full border border-[#C9A35A] text-[#3A3A3A] 
                            hover:bg-[#C9A35A] hover:text-white transition duration-300">
                    Reserve Now
                    </a>
                </div>
        
            </nav>
        </div>
        
        
        <div class="min-h-screen">
            <div class="min-h-screen font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
            <footer class="bg-[#2F2F2F] py-14 border-t border-gray-700">
                <div class="container mx-auto px-6 flex flex-col items-center">
                    
                    <h2 class="text-3xl font-serif text-[#E5C07B] mb-6">
                        Gusteau's Restaurant
                    </h2>
            
                    <ul class="flex space-x-10 text-gray-300 text-lg mb-6">
                        <li class="hover:text-[#E5C07B] transition">Home</li>
                        <li class="hover:text-[#E5C07B] transition">About</li>
                        <li class="hover:text-[#E5C07B] transition">Contact</li>
                        <li class="hover:text-[#E5C07B] transition">Terms</li>
                    </ul>
            
                    <!-- Social Icons -->
                    <div class="flex space-x-6">
                        <a class="text-gray-300 hover:text-[#E5C07B] transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
            
                        <a class="text-gray-300 hover:text-[#E5C07B] transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                            </svg>
                        </a>
            
                        <a class="text-gray-300 hover:text-[#E5C07B] transition">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" 
                                viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                            </svg>
                        </a>
            
                        <a class="text-gray-300 hover:text-[#E5C07B] transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 
                                2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    </div>
            
                    <p class="text-gray-500 text-sm mt-6">
                        © 2025 Gusteau's. All rights reserved.
                    </p>
            
                </div>
            </footer>
            
        </div>
    </body>
</html>
