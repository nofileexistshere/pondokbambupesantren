<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Bambu - Pesantren Modern')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .whatsapp-bubble {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            animation: bounce 2s infinite;
        }
        @media (max-width: 768px) {
            .whatsapp-bubble {
                bottom: 15px;
                right: 15px;
            }
            .whatsapp-bubble .bg-emerald-600 {
                padding: 12px;
            }
            .whatsapp-bubble svg {
                width: 24px;
                height: 24px;
            }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        .bg-hero {
            background: linear-gradient(rgba(6, 78, 59, 0.75), rgba(6, 78, 59, 0.75)), url('https://readdy.ai/api/search-image?query=Islamic%20boarding%20school%20students%20studying%20Quran%20in%20beautiful%20traditional%20Indonesian%20pesantren%20building%20with%20green%20nature%20surroundings%2C%20peaceful%20atmosphere%2C%20warm%20natural%20lighting%2C%20educational%20environment%2C%20modern%20Islamic%20architecture&width=1920&height=1080&seq=hero1&orientation=landscape');
            background-size: cover;
            background-position: center;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav id="navbar" class="bg-white shadow-sm fixed w-full top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="flex items-center">
                            <div id="logo-bg" class="p-2 mr-3">
                                <img 
                                    src="{{ asset('logo/logo-panjang.png') }}" 
                                    alt="Logo" 
                                    class="h-[70px] object-contain"
                                >
                            </div>
                        </a>
                        <div>
                            <h1 id="logo-text" class="text-xl font-bold text-emerald-600"></h1>
                            <p id="logo-subtext" class="text-xs text-emerald-400"></p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" id="nav-link-1" class="text-emerald-700 hover:text-emerald-600 font-medium transition">Beranda</a>
                    <a href="{{ route('news.index') }}" id="nav-link-2" class="text-emerald-700 hover:text-emerald-600 font-medium transition">Berita</a>
                    <a href="{{ route('programs.index') }}" id="nav-link-3" class="text-emerald-700 hover:text-emerald-600 font-medium transition">Program</a>
                    <a href="{{ route('donation.index') }}" id="nav-link-4" class="text-emerald-700 hover:text-emerald-600 font-medium transition">Donasi</a>
                    <a href="{{ route('gallery.index') }}" id="nav-link-5" class="text-emerald-700 hover:text-emerald-600 font-medium transition">Galeri</a>
                    <a href="{{ route('registration.create') }}" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition font-medium">Daftar Sekarang</a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" type="button" class="text-emerald-700 hover:text-emerald-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 bg-white">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="mobile-nav-link text-emerald-700 hover:text-emerald-600 font-medium transition px-4 py-2">Beranda</a>
                    <a href="{{ route('news.index') }}" class="mobile-nav-link text-emerald-700 hover:text-emerald-600 font-medium transition px-4 py-2">Berita</a>
                    <a href="{{ route('programs.index') }}" class="mobile-nav-link text-emerald-700 hover:text-emerald-600 font-medium transition px-4 py-2">Program</a>
                    <a href="{{ route('donation.index') }}" class="mobile-nav-link text-emerald-700 hover:text-emerald-600 font-medium transition px-4 py-2">Donasi</a>
                    <a href="{{ route('gallery.index') }}" class="mobile-nav-link text-emerald-700 hover:text-emerald-600 font-medium transition px-4 py-2">Galeri</a>
                    <a href="{{ route('registration.create') }}" class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition font-medium text-center mx-4">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-[#1a1f2e] text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Newsletter -->
                <div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Dapatkan Update Terbaru</h3>
                    <p class="text-gray-400 mb-6 text-sm leading-relaxed">Berlangganan newsletter kami untuk mendapatkan informasi terkini tentang kegiatan pesantren</p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda" class="flex-1 px-4 py-2.5 rounded-l-lg bg-[#252b3d] text-white text-sm border-none focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <button type="submit" class="bg-white text-gray-900 px-6 py-2.5 rounded-r-lg hover:bg-gray-100 transition font-medium text-sm">
                            Subscribe →
                        </button>
                    </form>
                </div>

                <!-- Menu Cepat -->
                <div>
                    <h4 class="font-semibold mb-4 text-sm tracking-wide text-gray-300">MENU CEPAT</h4>
                    <ul class="space-y-2.5 text-gray-400 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="{{ route('programs.index') }}" class="hover:text-white transition">Program</a></li>
                        <li><a href="{{ route('news.index') }}" class="hover:text-white transition">Berita</a></li>
                        <li><a href="{{ route('donation.index') }}" class="hover:text-white transition">Donasi</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-semibold mb-4 text-sm tracking-wide text-gray-300">HUBUNGI KAMI</h4>
                    <div class="space-y-3 text-gray-400 text-sm">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span>info@pondokbambu.ac.id</span>
                        </div>
                    </div>

                    <h4 class="font-semibold mb-4 mt-8 text-sm tracking-wide text-gray-300">ALAMAT</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Jl. Raya Tajur No. 168<br>
                        Bogor, Jawa Barat 16320
                    </p>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="border-t border-gray-800 mt-10 pt-6">
                <div class="flex flex-col md:grid md:grid-cols-3 items-center gap-6 md:gap-4">
                    <!-- Left: Social Media Icons -->
                    <div class="flex items-center justify-center md:justify-start space-x-4 order-2 md:order-1">
                        <a href="#" class="text-gray-400 hover:text-white transition" title="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition" title="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition" title="YouTube">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition" title="Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Center: Copyright -->
                    <div class="text-sm text-gray-400 text-center order-1 md:order-2">
                        © 2025 Pesantren Pondok Bambu By PT.TEKNOLOGI KREASI DIGITAL. All rights reserved.
                    </div>

                    <!-- Right: Links -->
                    <div class="flex justify-center md:justify-end space-x-4 text-sm text-gray-400 order-3">
                        <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                        <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Bubble -->
    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-bubble">
        <div class="bg-emerald-600 rounded-full p-4 shadow-lg hover:bg-emerald-700 transition">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
        </div>
    </a>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Navbar scroll effect - only on homepage
        const isHomepage = window.location.pathname === '/' || window.location.pathname === '';
        const navbar = document.getElementById('navbar');
        const logoText = document.getElementById('logo-text');
        const logoSubtext = document.getElementById('logo-subtext');
        const mobileMenuBtn = document.getElementById('mobile-menu-button').querySelector('svg');
        const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
        const mobileMenuDiv = document.getElementById('mobile-menu');
        const navLinks = [
            document.getElementById('nav-link-1'),
            document.getElementById('nav-link-2'),
            document.getElementById('nav-link-3'),
            document.getElementById('nav-link-4'),
            document.getElementById('nav-link-5')
        ];

        // Set initial state based on page
        if (isHomepage) {
            // Homepage - start transparent with white text
            navbar.classList.remove('bg-white', 'shadow-sm');
            navbar.classList.add('bg-transparent');
            logoText.classList.remove('text-emerald-600');
            logoText.classList.add('text-white');
            logoSubtext.classList.remove('text-emerald-400');
            logoSubtext.classList.add('text-gray-300');
            mobileMenuBtn.classList.remove('text-emerald-700');
            mobileMenuBtn.classList.add('text-white');
            // Keep mobile menu white always
            mobileMenuDiv.classList.add('bg-white');
            navLinks.forEach(link => {
                if (link) {
                    link.classList.remove('text-emerald-700', 'hover:text-emerald-600');
                    link.classList.add('text-white', 'hover:text-emerald-300');
                }
            });
            // Mobile nav links stay dark for readability on white background
            mobileNavLinks.forEach(link => {
                link.classList.remove('text-white', 'hover:text-emerald-300');
                link.classList.add('text-emerald-700', 'hover:text-emerald-600');
            });
        }
        // Other pages keep the default white navbar from HTML

        // Scroll effect only on homepage
        if (isHomepage) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    // Scrolled - white background with dark text
                    navbar.classList.add('bg-white', 'shadow-sm');
                    navbar.classList.remove('bg-transparent');
                    logoText.classList.remove('text-white');
                    logoText.classList.add('text-emerald-600');
                    logoSubtext.classList.remove('text-gray-300');
                    logoSubtext.classList.add('text-emerald-400');
                    mobileMenuBtn.classList.remove('text-white');
                    mobileMenuBtn.classList.add('text-emerald-700');
                    navLinks.forEach(link => {
                        if (link) {
                            link.classList.remove('text-white', 'hover:text-emerald-300');
                            link.classList.add('text-emerald-700', 'hover:text-emerald-600');
                        }
                    });
                    // Mobile nav links stay dark for readability
                } else {
                    // At top - transparent with white text
                    navbar.classList.remove('bg-white', 'shadow-sm');
                    navbar.classList.add('bg-transparent');
                    logoText.classList.add('text-white');
                    logoText.classList.remove('text-emerald-600');
                    logoSubtext.classList.add('text-gray-300');
                    logoSubtext.classList.remove('text-emerald-400');
                    mobileMenuBtn.classList.add('text-white');
                    mobileMenuBtn.classList.remove('text-emerald-700');
                    navLinks.forEach(link => {
                        if (link) {
                            link.classList.add('text-white', 'hover:text-emerald-300');
                            link.classList.remove('text-emerald-700', 'hover:text-emerald-600');
                        }
                    });
                    // Mobile nav links stay dark for readability
                }
            });
        }
    </script>
    
    @stack('scripts')
</body>
</html>
