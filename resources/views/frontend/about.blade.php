@extends('components.main')

@section('content')

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-[#2c3e50] to-[#8B4513] text-white py-20 px-4">
        <!-- Overlay Background (Optional) -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Glass Effect Content -->
        <div class="absolute inset-0 bg-white bg-opacity-20 backdrop-blur-md z-0"></div>

        <!-- Content Inside the Hero Section -->
        <div class="relative container mx-auto text-center z-10">
            <!-- Title with Enhanced Focus -->
            <h1 class="text-5xl font-extrabold uppercase leading-tight mb-4 text-[#ecf0f1] drop-shadow-lg">
                About Us
            </h1>

            <!-- Description Text with Focus -->
            <p class="text-lg font-medium mb-6 text-[#bdc3c7] opacity-90 tracking-wide max-w-xl mx-auto">
                Discover our story, values, and the unique experiences that make us exceptional. Join us on this exciting
                journey!
            </p>

            <!-- Stylish Divider -->
            <div class="w-32 h-1 bg-gradient-to-r from-[#e67e22] to-[#f39c12] mx-auto rounded-full"></div>
        </div>
    </div>

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
                        <img id="main-image" src="{{ asset('asset/images/d11.jpg') }}"
                            alt="Hotel Krinoscco Main"
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
                            <img src="{{ asset('asset/images/d11.jpg') }}" alt="Hotel Detail 1"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/s10.jpg') }}" alt="Hotel Detail 2"
                                class="w-full h-24 object-cover hover:scale-110 transition-transform duration-500 cursor-pointer"
                                onclick="changeMainImage(this)" />
                        </div>
                        <div class="overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ asset('asset/images/s8.jpg') }}" alt="Hotel Detail 3"
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

    <!--About Us JavaScript for Image Change -->
    <script>
        function changeMainImage(element) {
            const mainImage = document.getElementById("main-image");
            mainImage.src = element.src;
        }
    </script>

@endsection
