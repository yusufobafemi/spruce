<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seo['title'] ?? 'Spruce - A Smarter Facility Solution' }}</title>
    <!-- Favicon & App Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    
    {{-- this is for seo --}}
    <meta name="description" content="{{ $seo['description'] ?? 'Revolutionizing bill payments and facility access management for residents, facility managers, and property owners.' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'facility management, smart estates, utility bills, visitor access, Nigeria' }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Spruce">

    <!-- Open Graph / Twitter Card -->
    <meta property="og:title" content="{{ $seo['title'] ?? 'Spruce - A Smarter Facility Solution' }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Revolutionizing bill payments and facility access management.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/mock-up.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? 'Spruce - A Smarter Facility Solution' }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? 'Revolutionizing bill payments and facility access management.' }}">
    <meta name="twitter:image" content="{{ asset('images/mock-up.png') }}">

    <!-- Preload critical assets -->
    <link rel="preload" href="{{ asset('css/styles.css') }}" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" as="style">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Schema Markup: Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Spruce",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo-dark.png') }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+2348155500700",
            "contactType": "customer service",
            "email": "info@thesprucesolution.com"
        },
        "sameAs": [
            "https://facebook.com/spruce",
            "https://twitter.com/spruce",
            "https://instagram.com/spruce",
            "https://linkedin.com/company/spruce"
        ]
    }
    </script>

    <!-- Google Analytics (replace UA-XXXXX-Y with your tracking ID) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXX-Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXX-Y');
    </script>

    <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@yield('styles')
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img loading="lazy" src="{{ asset('images/logo-dark.png') }}" alt="Spruce smart facility management logo">
                </a>
            </div>
            <nav role="navigation" aria-label="Primary Navigation" aria-label="Main navigation">
                <ul class="nav-links">
                    <!-- Close button for mobile only -->
                    <div class="mobile-close-btn">
                        <span class="close-icon">×</span>
                    </div>
                    @if(request()->is('dashboard*'))
                    <!-- If the user is on the dashboard, show only the Blog link -->
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url('/another-url') }}">Blog</a></li>
                    @else
                        <!-- Regular links for other pages -->
                        <li><a href="#features">Features</a></li>
                        <li><a href="#benefits">Benefits</a></li>
                        <li><a href="#process">Process</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#contact">Contact</a></li>
                    @endif
                </ul>
                <div class="mobile-menu-btn" aria-label="Toggle mobile menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    {{-- this is toast to show item well --}}    
    <div class="custom-toast-container" id="customToastContainer"></div>
    {{-- closing it --}}
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo">
                    <a href="{{ url('/') }}">
                        <img loading="lazy" src="{{ asset('images/logo-light.png') }}" alt="Spruce smart facility management logo">
                    </a>
                    <p>...a smarter facility solution</p>
                </div>
                <div class="footer-links">
                    {{-- <div class="footer-column">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/careers') }}">Careers</a></li>
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div> --}}
                    <div class="footer-column">
                        <h4>Products</h4>
                        <ul>
                            <li><span>Bill Payments</span></li>
                            <li><span>Visitor Management</span></li>
                            <li><span>Facility Access</span></li>
                        </ul>
                    </div>
                    {{-- <div class="footer-column">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li><a href="{{ url('/help-center') }}">Help Center</a></li>
                            <li><a href="{{ url('/documentation') }}">Documentation</a></li>
                        </ul>
                    </div> --}}
                    <div class="footer-column">
                        <h4>Connect</h4>
                        <div class="social-links">
                            <a href="https://facebook.com/spruce" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/spruce" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="https://instagram.com/spruce" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://linkedin.com/company/spruce" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="contact-info">
                            <p><i class="fas fa-phone"></i> <a href="tel:+2348155500700">08155500700</a></p>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:info@thesprucesolution.com">info@thesprucesolution.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Spruce. All rights reserved.</p>
                <div class="footer-bottom-links">
                    {{-- <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> --}}
                    {{-- <a href="{{ url('/terms-of-service') }}">Terms of Service</a> --}}
                </div>
            </div>
        </div>
    </footer>
    <!-- Inside <head> or before </body> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="{{ asset('js/script.js') }}"></script>
    <script defer src="https://unpkg.com/aos@next/dist/aos.js"></script>
    @yield('scripts')
</body>
</html>