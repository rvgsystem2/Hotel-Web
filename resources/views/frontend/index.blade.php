@extends('components.main')

@section('content')
    <style>
        /* Parallax Effect for Background */
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Glass Effect */
        .glass-effect {
            background: rgba(26, 26, 46, 0.8);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Hover Lift Effect */
        .hover-lift {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        /* Animated Gradient Effect */
        .animated-gradient {
            background: linear-gradient(270deg, #1a1a2e, #16213e, #8B4513);
            background-size: 600% 600%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Scroll Reveal Effect */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Ripple Button Effect */
        .ripple-button {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .ripple-button:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease-out, height 0.6s ease-out;
        }

        .ripple-button:hover:after {
            width: 300px;
            height: 300px;
        }

        .ripple-button:hover {
            transform: scale(1.05) translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Scroll Indicator - Smooth Bounce Animation */
        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>


    <!-- Hero Section with Video Background -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background with improved loading -->
        <video autoplay muted loop playsinline class="absolute w-full h-full object-cover filter brightness-75">
            <source src="{{ asset('storage/' . ($heroSection->video ?? 'default-video.mp4')) }}" type="video/mp4">
            </video>
        
        

        <!-- Enhanced glass effect overlay -->
        <div class="absolute inset-0 "></div>

        <!-- Main Content Container -->
        <div class="relative container mx-auto px-6 md:px-12 h-full flex flex-col justify-center">
            <div class="max-w-4xl text-white transform transition-all duration-700 opacity-100">
                <h1 class="text-6xl md:text-7xl font-bold mb-6 leading-tight tracking-tight drop-shadow-lg">
                    {{ $heroSection->title ?? 'Default Title' }} 
                    <span class="text-[#8B4513] block hover:text-[#9B5523] transition-colors duration-300">Redefined</span>
                </h1>
                <p class="text-lg md:text-xl mb-8 text-gray-200 font-light leading-relaxed tracking-wide">
                    {{ $heroSection->description ?? 'Default Description' }}
                </p>

                <!-- Enhanced Button Container -->
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                    <a href="{{$heroSection->button_link ??''}}"
                        class="ripple-button bg-[#8B4513] text-white px-10 py-4 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                        Book Now
                    </a>
                    <a href=" {{ $heroSection->button_text ?? '' }}"
                        class="ripple-button bg-transparent border-2 border-white text-white px-10 py-4 rounded-lg text-lg font-semibold hover:bg-white/10 hover:text-white transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                        Virtual Tour
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced scroll indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
            <div class="animate-bounce hover:animate-none cursor-pointer group">
                <i
                    class="fas fa-chevron-down text-white text-3xl opacity-75 group-hover:opacity-100 transition-opacity duration-300"></i>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section class="relative py-32 overflow-hidden bg-gradient-to-b from-white to-gray-50">
        <!-- Decorative Elements -->
        <div
            class="absolute top-0 left-0 w-64 h-64 bg-[#8B4513] opacity-5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 right-0 w-96 h-96 bg-[#1a1a2e] opacity-5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
        </div>

        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-16 relative">
                <!-- Image Section with Multiple Images -->
                <div class="w-full lg:w-1/2 space-y-6 group">
                    <!-- Main Image with Hover Effect -->
                    <div
                        class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-transform duration-500 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1a2e]/20 to-transparent z-10"></div>
                        <img id="main-image" src="{{ asset('asset/images/s1.jpg') }}" alt="Hotel Krinoscco Main"
                            class="w-full h-[500px] object-cover transform transition-transform duration-700 hover:scale-110" />
                        <!-- Floating Badge -->
                        <div
                            class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg z-20">
                            <span class="text-[#1a1a2e] font-semibold">Est. 2024</span>
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="grid grid-cols-3 gap-4 transition-opacity duration-500">
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/s2.jpg') }}" alt="Hotel Detail 1"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/s3.jpg') }}" alt="Hotel Detail 2"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/s4.jpg') }}" alt="Hotel Detail 3"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="w-full lg:w-1/2 space-y-8">
                    <!-- Section Title -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-20 h-[2px] bg-[#8B4513]"></div>
                            <span class="text-[#8B4513] font-semibold uppercase tracking-wider">About Us</span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold text-[#1a1a2e] leading-tight">
                            Where Every Moment
                            <span class="relative">Resonates
                                <div class="absolute bottom-0 left-0 w-full h-[8px] bg-[#8B4513]/20"></div>
                            </span> Luxury
                        </h2>
                    </div>

                    <!-- Content -->
                    <div class="space-y-6">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            The standard room has all the essential conveniences and is tastefully designed for your
                            enjoyable stay. Hotel Krinoscco redefines luxury with an unwavering commitment to international
                            standards of service and style.
                        </p>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Setting a new benchmark for unparalleled accommodation and exceptional value, it embodies the
                            epitome of contemporary elegance. Here, the fusion of "high tech" amenities seamlessly
                            intertwines with an unparalleled "high touch" service ethos.
                        </p>

                        <!-- Feature List -->
                        <div class="grid grid-cols-2 gap-6 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#1a1a2e]">Prime Location</h4>
                                    <p class="text-sm text-gray-600">Heart of Ayodhya</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-[#8B4513]/10 flex items-center justify-center">
                                    <i class="fas fa-clock text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[#1a1a2e]">Quick Access</h4>
                                    <p class="text-sm text-gray-600">15min from stations</p>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Section -->
                        <div class="flex items-center gap-6 pt-4">
                            <a href="{{route('gallery')}}"
                                class="group relative px-8 py-4 bg-[#8B4513] text-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                                <div
                                    class="absolute inset-0 bg-[#6B3410] transform translate-y-full transition-transform duration-300 group-hover:translate-y-0">
                                </div>
                                <span class="relative z-10 font-semibold">Discover More</span>
                            </a>
                            <a href="{{route('gallery')}}"
                                class="group flex items-center gap-3 text-[#1a1a2e] font-semibold hover:text-[#8B4513] transition-colors duration-300">
                                <span>View Gallery</span>
                                <i
                                    class="fas fa-arrow-right transform transition-transform duration-300 group-hover:translate-x-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Interactive Room Explorer -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Enhanced Header -->
            <h2 class="text-5xl font-bold text-white mb-16 text-center">
                Explore Our Rooms
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                <p class="text-lg text-gray-400 mt-4 max-w-2xl mx-auto">Experience luxury reimagined through interactive
                    virtual tours</p>
            </h2>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- 3D Viewer Section -->
                <div class="space-y-8">
                    <div class="bg-[#16213e] rounded-2xl h-[500px] relative overflow-hidden shadow-2xl group">
                        <!-- 3D View Container -->
                        <img src="{{ asset('asset/images/s2.jpg') }}" alt="3D Room View"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                        <!-- Interactive Controls -->
                        <div class="absolute top-4 right-4 flex space-x-3">
                            <button
                                class="p-3 bg-black/50 rounded-full backdrop-blur-sm hover:bg-[#8B4513] transition-colors duration-300">
                                <i class="fas fa-vr-cardboard text-white text-xl"></i>
                            </button>
                            <button
                                class="p-3 bg-black/50 rounded-full backdrop-blur-sm hover:bg-[#8B4513] transition-colors duration-300">
                                <i class="fas fa-expand-arrows-alt text-white text-xl"></i>
                            </button>
                        </div>

                        <!-- Information Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/90 to-transparent">
                            <h3 class="text-2xl font-bold text-white mb-3">Interactive Room Preview</h3>
                            <p class="text-gray-300 flex items-center">
                                <i class="fas fa-mouse mr-2"></i>
                                Drag to explore in 360°
                            </p>
                            <!-- Room Navigation -->
                            <div class="flex space-x-4 mt-4">
                                <button
                                    class="px-4 py-2 bg-white/10 rounded-lg hover:bg-[#8B4513] transition-colors duration-300 text-white text-sm">
                                    Bedroom
                                </button>
                                <button
                                    class="px-4 py-2 bg-white/10 rounded-lg hover:bg-[#8B4513] transition-colors duration-300 text-white text-sm">
                                    Bathroom
                                </button>
                                <button
                                    class="px-4 py-2 bg-white/10 rounded-lg hover:bg-[#8B4513] transition-colors duration-300 text-white text-sm">
                                    Living Area
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="bg-[#16213e] p-6 rounded-xl">
                        <div class="flex justify-between text-gray-400 mb-2">
                            <span>Loading 3D Model</span>
                            <span>78%</span>
                        </div>
                        <div class="h-2 bg-gray-700 rounded-full">
                            <div class="h-full w-[78%] bg-gradient-to-r from-[#8B4513] to-[#D4A017] rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="space-y-6">
                    <!-- Room Features Card -->
                    <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl backdrop-blur-lg border border-white/5">
                        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                            <i class="fas fa-star text-[#8B4513] mr-3"></i>
                            Premium Room Features
                        </h3>
                        <ul class="space-y-6 text-gray-300">
                            <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                                <div class="w-12 h-12 bg-[#8B4513]/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-bed text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Smart Bed System</h4>
                                    <p class="text-sm text-gray-400">Adjustable firmness with ambient lighting control</p>
                                </div>
                            </li>
                            <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                                <div class="w-12 h-12 bg-[#8B4513]/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-tablet-alt text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Room Automation</h4>
                                    <p class="text-sm text-gray-400">Voice-controlled environment and entertainment</p>
                                </div>
                            </li>
                            <li class="flex items-center transform hover:translate-x-2 transition-transform duration-300">
                                <div class="w-12 h-12 bg-[#8B4513]/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-bath text-[#8B4513] text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">Digital Shower</h4>
                                    <p class="text-sm text-gray-400">Customizable temperature and pressure settings</p>
                                </div>
                            </li>
                        </ul>

                        <!-- Room Specifications -->
                        <div class="grid grid-cols-2 gap-4 mt-8 p-4 bg-black/20 rounded-lg">
                            <div class="text-center p-3">
                                <div class="text-[#8B4513] text-xl font-bold">45m²</div>
                                <div class="text-gray-400 text-sm">Room Size</div>
                            </div>
                            <div class="text-center p-3">
                                <div class="text-[#8B4513] text-xl font-bold">4</div>
                                <div class="text-gray-400 text-sm">Max Guests</div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <!-- CTA Button as <a> -->
                        <a href="#booking"
                            class="w-full mt-8 py-4 text-white text-center font-semibold rounded-lg
       bg-gradient-to-r from-[#8B4513] to-[#D4A017]
       hover:from-[#D4A017] hover:to-[#8B4513]
       transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/50
       block">
                            Book This Room
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Smart Services Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-72 h-72 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#8B4513]/5 rounded-full blur-[120px]">
            </div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%239C92AC\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Enhanced Header -->
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-white mb-6">
                    Smart Services
                    <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">Experience the future of hospitality with our
                    cutting-edge smart services</p>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- AI Concierge Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6 relative">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-robot text-[#8B4513] text-3xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 bg-[#8B4513] text-white text-xs px-2 py-1 rounded-full">24/7
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">AI Concierge</h3>
                    <p class="text-gray-300 mb-6">24/7 virtual assistance powered by advanced AI to cater to all your needs
                        instantly</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Instant response time
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Multi-language support
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Personalized recommendations
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Smart Room Control Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-home text-[#8B4513] text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Smart Room Control</h3>
                    <p class="text-gray-300 mb-6">Control your entire room environment with voice commands or our mobile
                        app</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Climate control
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Lighting scenes
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Entertainment systems
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>

                <!-- Digital Key Card -->
                <div
                    class="bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-8 rounded-xl border border-white/5 shadow-xl group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div
                            class="w-16 h-16 bg-[#8B4513]/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-key text-[#8B4513] text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Digital Key</h3>
                    <p class="text-gray-300 mb-6">Access your room and hotel facilities seamlessly with your smartphone</p>
                    <ul class="space-y-3 text-sm text-gray-400 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Contactless entry
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Secure encryption
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[#8B4513] mr-2"></i>
                            Share access easily
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-flex items-center text-white hover:text-[#8B4513] transition-colors duration-300">
                        Learn More
                        <i
                            class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Features Counter -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">100+</div>
                    <div class="text-gray-400">Smart Features</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">98%</div>
                    <div class="text-gray-400">Guest Satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">0.5s</div>
                    <div class="text-gray-400">Response Time</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">24/7</div>
                    <div class="text-gray-400">Support</div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <a href="#"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg hover:from-[#D4A017] hover:to-[#8B4513] transition-all duration-300 transform hover:scale-105">
                    Experience Smart Living
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Immersive Experiences Section -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-[#8B4513]/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Enhanced Header -->
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-16 text-center">
                Immersive Experiences
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Experience Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                <!-- VR Spa Experience Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s7.jpg') }}" alt="VR Spa Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Virtual Reality Spa</h3>
                            <p class="text-gray-200 mb-6">Immerse yourself in tranquility with our VR-enhanced spa
                                treatments</p>
                            <a href="#" class="inline-flex items-center text-white">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Smart Room Experience Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s8.jpg') }}" alt="Smart Room Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Smart Room Technology</h3>
                            <p class="text-gray-200 mb-6">Control your entire room environment with our cutting-edge smart
                                systems</p>
                            <a href="#" class="inline-flex items-center text-white">
                                Explore Features
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Culinary Journey Card -->
                <div
                    class="relative overflow-hidden rounded-2xl shadow-lg transition-transform duration-700 ease-in-out hover:translate-y-[-10px] hover:shadow-2xl">
                    <img src="{{ asset('asset/images/s9.jpg') }}" alt="Culinary Experience"
                        class="w-full h-[400px] object-cover transition-transform duration-1000 ease-in-out hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="p-8 h-full flex flex-col justify-end">
                            <h3 class="text-2xl font-bold text-white mb-4">Interactive Culinary Journey</h3>
                            <p class="text-gray-200 mb-6">Experience interactive cooking sessions with world-renowned chefs
                            </p>
                            <a href="#" class="inline-flex items-center text-white">
                                View Menu
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Experience Stats -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">5000+</div>
                    <div class="text-gray-600">Happy Guests</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">50+</div>
                    <div class="text-gray-600">Unique Experiences</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">24/7</div>
                    <div class="text-gray-600">Service Available</div>
                </div>
                <div
                    class="text-center p-6 rounded-xl bg-white shadow-lg transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105">
                    <div class="text-4xl font-bold text-[#8B4513] mb-2">4.9★</div>
                    <div class="text-gray-600">Guest Rating</div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-20 text-center">
                <a href="#booking"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105">
                    Book Your Experience
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>


    <!-- Our Signature Offerings -->
    <section class="py-20 bg-[#f7f7f7]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-[#1a1a2e] mb-4">
                Our Signature Offerings
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            <p class="text-lg text-gray-700 mb-16 mt-4">
                Step into an oasis of elegance and warmth at Hotel Krinoscco, where luxury meets tradition to redefine your
                unforgettable experience.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Offering 1 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">key</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Keycard Access</h3>
                    <p class="text-gray-600">Access to all rooms with a secure keycard for your convenience and safety.</p>
                </div>

                <!-- Offering 2 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">wifi</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Internet Access</h3>
                    <p class="text-gray-600">Stay connected with high-speed internet access throughout the property.</p>
                </div>

                <!-- Offering 3 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">phone</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Telephone with Intercom</h3>
                    <p class="text-gray-600">Stay in touch with hotel staff at any time with our telephone and intercom
                        system.</p>
                </div>

                <!-- Offering 4 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">access_alarm</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">24/7 Accessibility</h3>
                    <p class="text-gray-600">Our services are available around the clock to cater to your needs.</p>
                </div>

                <!-- Offering 5 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">bathtub</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Ensuite Bathroom</h3>
                    <p class="text-gray-600">Each room comes with a private ensuite bathroom for ultimate comfort.</p>
                </div>

                <!-- Offering 6 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">tv</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Entertainment</h3>
                    <p class="text-gray-600">Enjoy various entertainment options during your stay, including TV, music, and
                        more.</p>
                </div>

                <!-- Offering 7 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">room_service</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Room Service</h3>
                    <p class="text-gray-600">Enjoy 24/7 room service for meals, beverages, and more, delivered right to
                        your door.</p>
                </div>

                <!-- Offering 8 -->
                <div
                    class="offering-item p-6 bg-white rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="bg-[#8B4513] p-4 rounded-full mb-4 mx-auto">
                        <span class="material-icons text-white text-3xl">storage</span>
                    </div>
                    <h3 class="text-xl font-semibold text-[#1a1a2e] mb-2">Storage Space</h3>
                    <p class="text-gray-600">Keep your belongings safe with ample storage space available in your room.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Real-time Availability Section -->
    <section id="booking" class="py-20 animated-gradient bg-gray-800">
        <div class="container mx-auto px-4">
            <!-- Title Section -->
            <h2 class="text-4xl font-bold text-white mb-16 text-center">
                Book Your Stay
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden p-8">
                <form action="#"
                    class="bg-transparent flex flex-col sm:flex-row items-center sm:space-x-6 p-6 rounded-lg shadow-lg space-y-6 sm:space-y-0">

                    <!-- Check-in -->
                    <div class="flex flex-col space-y-2 w-full sm:w-1/4">
                        <label class="text-gray-700 font-medium">Check-in</label>
                        <input type="text" id="checkin" placeholder="Select Check-in"
                            class="border border-gray-300 rounded-lg p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#8B4513]">
                    </div>

                    <!-- Check-out -->
                    <div class="flex flex-col space-y-2 w-full sm:w-1/4">
                        <label class="text-gray-700 font-medium">Check-out</label>
                        <input type="text" id="checkout" placeholder="Select Check-out"
                            class="border border-gray-300 rounded-lg p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#8B4513]">
                    </div>

                    <!-- Adults -->
                    <div class="flex flex-col space-y-2 w-full sm:w-1/4">
                        <label class="text-gray-700 font-medium">Adults</label>
                        <select
                            class="border border-gray-300 rounded-lg p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#8B4513]">
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4 Adults</option>
                        </select>
                    </div>

                    <!-- Children -->
                    <div class="flex flex-col space-y-2 w-full sm:w-1/4">
                        <label class="text-gray-700 font-medium">Children</label>
                        <select
                            class="border border-gray-300 rounded-lg p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#8B4513]">
                            <option value="1">No Children</option>
                            <option value="2">1 Child</option>
                            <option value="3">2 Children</option>
                            <option value="4">3 Children</option>
                        </select>
                    </div>

                    <!-- Rooms -->
                    <div class="flex flex-col space-y-2 w-full sm:w-1/4">
                        <label class="text-gray-700 font-medium">Rooms</label>
                        <select
                            class="border border-gray-300 rounded-lg p-3 bg-transparent focus:outline-none focus:ring-2 focus:ring-[#8B4513]">
                            <option value="1">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3 Rooms</option>
                            <option value="4">4 Rooms</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center items-center w-full sm:w-auto">
                        <a href="#"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white rounded-lg transition-all duration-500 ease-in-out transform hover:from-[#D4A017] hover:to-[#8B4513] hover:scale-105">
                            Check Now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Our Accommodation Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-base md:text-5xl font-bold text-white mb-12">
                Our Accommodation
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <p class="text-lg text-gray-300 mb-12">Whether traveling for business or vacation, Hotel Krinoscco room sizes
                are ideal. Classically styled with carefully chosen contemporary designed rooms with round-the-clock
                services.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Standard Room -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/d2.jpg') }}" alt="Standard Room"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Standard Room</h3>
                    <p class="text-gray-300 mb-6">The standard room has all the essential conveniences and is tastefully
                        designed for your enjoyable stay. We are delivering the highest level of pleasure and a wonderful
                        experience.</p>
                    <a href="{{ route('accommodation.standard') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Deluxe Room -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/d4.jpg') }}" alt="Deluxe Room"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Deluxe Room</h3>
                    <p class="text-gray-300 mb-6">Envision opulence in our Deluxe haven—where lavish comforts meet bespoke
                        elegance, weaving a tapestry of indulgence for an unforgettable retreat.</p>
                    <a href="{{ route('accommodation.deluxe') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Luxury Suite -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/d11.jpg') }}" alt="Luxury Suite"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">
                        Suite</h3>
                    <p class="text-gray-300 mb-6">Discover the epitome of grandeur in our Suite—a symphony of
                        sophistication, where indulgence meets exclusivity for an unparalleled escape.</p>
                    <a href="{{ route('accommodation.luxury') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Packages Section -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold text-white mb-12">
                Our Packages
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <p class="text-lg text-gray-300 mb-12">Array of unique experiences to enjoy throughout your event, Experiences
                by Krinoscco serves as a concierge service for you.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Lawn Package -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/d11.jpg') }}" alt="Lawn Package"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Lawn Package</h3>
                    <p class="text-gray-300 mb-6">Envision opulence in our Deluxe haven—where lavish comforts meet bespoke
                        elegance, weaving a tapestry of indulgence for an unforgettable retreat.</p>
                    <a href="{{ route('banquets.lawn') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>

                <!-- Ballroom Package -->
                <div class="bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 overflow-hidden">
                    <div class="relative mb-6">
                        <img src="{{ asset('asset/images/d11.jpg') }}" alt="Ballroom Package"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-105 rounded-lg">
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Ballroom Package</h3>
                    <p class="text-gray-300 mb-6">Discover the epitome of grandeur in our Suite—a symphony of
                        sophistication, where indulgence meets exclusivity for an unparalleled escape.</p>
                    <a href="{{ route('banquets.ballroom') }}"
                        class="bg-[#8B4513] text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#6B3410] transition-all duration-300 transform hover:scale-105">
                        Know More
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Digital Art Gallery -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-5xl font-bold text-[#1a1a2e] mb-16 text-center">
                Digital Art Gallery
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('asset/images/d8.jpg') }}" alt="Abstract Harmony"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer"
                        onclick="openModal('{{ asset('asset/images/d8.jpg') }}')">
                    <div class="text-center text-lg font-semibold mt-2">Abstract Harmony</div>
                </div>

                <div>
                    <img src="{{ asset('asset/images/d0.jpg') }}" alt="Digital Dreams"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer"
                        onclick="openModal('{{ asset('asset/images/d0.jpg') }}')">
                    <div class="text-center text-lg font-semibold mt-2">Digital Dreams</div>
                </div>

                <div>
                    <img src="{{ asset('asset/images/s11.jpg') }}" alt="Neon Nights"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer"
                        onclick="openModal('{{ asset('asset/images/s11.jpg') }}')">
                    <div class="text-center text-lg font-semibold mt-2">Neon Nights</div>
                </div>

                <div>
                    <img src="{{ asset('asset/images/suite13.jpg') }}" alt="Cyber Sunset"
                        class="w-full h-64 object-cover rounded-lg shadow-lg cursor-pointer"
                        onclick="openModal('{{ asset('asset/images/suite13.jpg') }}')">
                    <div class="text-center text-lg font-semibold mt-2">Cyber Sunset</div>
                </div>
            </div>
        </div>
    </section>


    <!-- What Our Guests Say -->
    <section class="py-20 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-[100px]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Section Header -->
            <h2 class="text-5xl font-bold text-white text-center mb-12">
                What Our Guests Say
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </h2>

            <!-- Swiper Slider -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Rahul Sharma</h4>
                        <span class="text-sm text-gray-400">Frequent Traveler</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "Staying here was an amazing experience. The rooms are luxurious, and the staff is incredibly
                            accommodating. Highly recommend!"
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-gray-500"></i>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Priya Kapoor</h4>
                        <span class="text-sm text-gray-400">Luxury Enthusiast</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "The attention to detail in the room design and amenities is exceptional. I felt pampered from
                            the moment I arrived."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Ananya Verma</h4>
                        <span class="text-sm text-gray-400">Luxury Enthusiast</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "The attention to detail in the room design and amenities is exceptional. I felt pampered from
                            the moment I arrived."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div
                        class="swiper-slide bg-[#16213e] p-8 rounded-xl shadow-2xl border border-white/5 h-full flex flex-col">
                        <h4 class="text-xl font-bold text-white">Vikram Mehta</h4>
                        <span class="text-sm text-gray-400">Business Traveler</span>
                        <p class="text-gray-300 flex-grow mt-4">
                            "Absolutely loved my stay here! The service was top-notch, and the location was perfect. The
                            rooms were incredibly comfortable."
                        </p>
                        <div class="mt-6 flex space-x-1">
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                            <i class="fas fa-star text-[#D4A017]"></i>
                        </div>
                    </div>
                </div>

                <!-- Pagination and Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev custom-button-prev">
                    <span class="material-icons">arrow_back_ios</span>
                </div>
                <div class="swiper-button-next custom-button-next">
                    <span class="material-icons">arrow_forward_ios</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Add required CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Custom Swiper Button Styles */
        .custom-button-prev,
        .custom-button-next {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #8B4513, #D4A017);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            opacity: 0.9;
            position: absolute;
            top: 70%;
            transform: translateY(-50%);
            z-index: 10;
        }

        .custom-button-prev:hover,
        .custom-button-next:hover {
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            opacity: 1;
        }

        .custom-button-prev::after,
        .custom-button-next::after {
            display: none;
            /* Hide default Swiper arrows */
        }

        .custom-button-prev .material-icons,
        .custom-button-next .material-icons {
            color: white;
            font-size: 24px;
            font-weight: 600;
        }

        .custom-button-prev {
            left: -5px;
        }

        .custom-button-next {
            right: -5px;
        }

        /* Ensure button visibility on smaller screens */
        @media (max-width: 768px) {

            .custom-button-prev,
            .custom-button-next {
                width: 50px;
                height: 50px;
            }

            .custom-button-prev .material-icons,
            .custom-button-next .material-icons {
                font-size: 20px;
            }
        }
    </style>

    <!-- Add required JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>


    <!-- Contact Us -->
    <section class="bg-gray-100 py-16 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-[#D4A017]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#8B4513]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto md:px-6 sm:px-8 lg:px-12 relative z-10">
            <!-- Heading Section -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900">Contact Us</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-lg text-gray-600">
                    We’d love to hear from you! Reach out to us anytime.
                </p>
            </div>

            <!-- Grid Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Single Info -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Our Location</h4>
                            <p class="text-gray-600">Hotel Krinoscco, Amaniganj Ram Path, Ayodhya U.P Pin 224001</p>
                        </div>
                    </div>
                    <!-- Single Info -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">email</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Email Us</h4>
                            <p class="text-gray-600">info@krinoscco.com</p>
                        </div>
                    </div>
                    <!-- Single Info -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">phone</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Call Us</h4>
                            <p class="text-gray-600">+91-7275002525</p>
                        </div>
                    </div>
                    <!-- Timing Info -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <span class="material-icons text-[#8B4513] text-4xl">access_time</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 text-lg">Timing</h4>
                            <p class="text-gray-600">Check In: 1:00 PM</p>
                            <p class="text-gray-600">Check Out: 11:00 AM</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <form action="#" method="POST"
                    class="space-y-6 bg-white p-8 rounded-xl shadow-lg transition-transform duration-700 hover:shadow-2xl hover:-translate-y-2">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Your Mobile Number</label>
                        <input type="tel" name="phone" id="phone" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500"
                            placeholder="+91-7275002525">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-500 focus:border-yellow-500"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#8B4513] to-[#D4A017] text-white font-medium py-3 rounded-lg shadow-lg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Map Section -->
            <div class="mt-16">
                <iframe
                    class="w-full h-80 rounded-lg shadow-lg transition-transform duration-700 hover:shadow-2xl hover:scale-105"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3561.786563827908!2d82.162745675435!3d26.78307267672456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399a0796e56fb899%3A0xffa1558e88f0d349!2sHotel%20Krinoscco!5e0!3m2!1sen!2sin!4v1739181698814!5m2!1sen!2sin"
                    frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-gradient-to-b from-[#F8F8F8] to-[#EAEAEA]">
        <div class="container mx-auto px-6">

            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900"> Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#8B4513] to-[#D4A017] mx-auto mt-4 rounded-full"></div>
            </div>
            <!-- FAQ Accordion -->
            <div class="space-y-8">
                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">What is the check-in and check-out time?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Check-in is from 1:00 PM, and check-out is by 11:00 AM.</p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Do you offer room service?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, we offer room service 24/7. You can place an order through our in-room menu.</p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Can I cancel my booking?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, cancellations are allowed with a 24-hour notice. Please check the terms for full details.
                        </p>
                    </div>
                </div>

                <div
                    class="faq-item bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl">
                    <button
                        class="faq-toggle w-full text-left p-6 font-medium text-gray-800 hover:bg-[#F4F4F4] focus:outline-none focus:ring-2 focus:ring-[#8B4513] flex justify-between items-center">
                        <span class="text-lg font-semibold">Do you have a shuttle service?</span>
                        <svg class="w-6 h-6 text-[#8B4513] transform transition-transform duration-300 rotate-0 faq-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content p-6 text-gray-600 hidden">
                        <p>Yes, we provide shuttle service to and from the airport. Please contact reception for bookings.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--About Us JavaScript for Image Change -->
    <script>
        function changeMainImage(element) {
            const mainImage = document.getElementById("main-image");
            mainImage.src = element.src;
        }
    </script>

    <!-- Add the script to toggle the FAQ answers and rotate the icons -->
    <script>
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('.faq-icon');
                const isHidden = content.classList.contains('hidden');

                content.classList.toggle('hidden', !isHidden);
                toggle.classList.toggle('bg-[#F4F4F4]', !isHidden);
                icon.classList.toggle('rotate-180', !isHidden); // Rotates the icon
            });
        });
    </script>

    <!--Scripts -->
    <script>
        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.scroll-reveal');

        const revealOnScroll = () => {
            revealElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight * 0.85) {
                    element.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Initialize Swiper
        const swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
        });
    </script>
@endsection
