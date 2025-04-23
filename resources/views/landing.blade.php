@extends('layouts.app')

@section('content')
    <!-- Schema Markup: WebPage -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Spruce - A Smarter Facility Solution",
        "description": "Revolutionizing bill payments and facility access management for residents, facility managers, and property owners.",
        "url": "{{ url('/') }}",
        "publisher": {
            "@type": "Organization",
            "name": "Spruce",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('lovable-uploads/c580f324-d717-4f95-9134-4fd26a3f4dcc.png') }}"
            }
        }
    }
    </script>

    <!-- Hero Section -->
    <section id="hero" aria-labelledby="hero-heading">
        <div class="container">
            <div class="hero-content" data-aos="fade-right" data-aos-duration="1000">
                <h1 id="hero-heading"><span>Revolutionizing</span> Bill Payments and Facility Access Management</h1>
                <p>Spruce is a next-generation app designed for individuals and facilities. It simplifies <a href="{{ url('/products/bill-payments') }}">bill payments</a> and streamlines <a href="{{ url('/products/visitor-management') }}">guest access management</a> for residents, facility managers, and property owners.</p>
                <div class="hero-buttons">
                    <a href="#download" class="btn btn-primary">Download App</a>
                </div>
            </div>
            <div class="hero-image" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <img src="{{ asset('images/hero.png') }}" alt="Spruce mobile app interface">
                <div class="circle-decoration circle-1"></div>
                <div class="circle-decoration circle-2"></div>
                <div class="circle-decoration circle-3"></div>
            </div>
        </div>
        <div class="hero-shape"></div>
    </section>

    <!-- Features Section -->
    <section id="features" aria-labelledby="features-heading">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 id="features-heading">SPRUCE <span>Core Functionality</span></h2>
                <p>A complete solution for all <a href="{{ url('/products/facility-access') }}">estate management</a> needs</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-receipt" aria-hidden="true"></i>
                    </div>
                    <h3>Bill Payments Hub</h3>
                    <p>Pay service charges, electricity bills, and utilities in one tap.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-user-check" aria-hidden="true"></i>
                    </div>
                    <h3>Smart Visitor Management</h3>
                    <p>Digital pre-authorization with real-time arrival notifications.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-tasks" aria-hidden="true"></i>
                    </div>
                    <h3>Intelligent Complaint System</h3>
                    <p>Track complaints from submission to resolution.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon">
                        <i class="fas fa-plug" aria-hidden="true"></i>
                    </div>
                    <h3>Public Access Services</h3>
                    <p>Buy electricity, airtime, data, and insurance easily.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                    </div>
                    <h3>Real-Time Utility Monitoring</h3>
                    <p>Alerts for low electricity units.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon">
                        <i class="fas fa-robot" aria-hidden="true"></i>
                    </div>
                    <h3>Smart AI Chat Assistance</h3>
                    <p>Hiki helps users with instant, accurate answers and personalized support 24/7.</p>
                </div>                
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" aria-labelledby="benefits-heading">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 id="benefits-heading">Why <span>Choose Spruce</span></h2>
                <p>Experience the advantages of next-generation estate management</p>
            </div>
            <div class="benefits-wrapper">
                <div class="benefits-image" data-aos="fade-right">
                    <img loading="lazy" src="{{ asset('images/payment_confirmation.png') }}" alt="Spruce payment confirmation screen">
                    <div class="circle-decoration"></div>
                </div>
                <div class="benefits-list">
                    <div class="benefit-item" data-aos="fade-left" data-aos-delay="100">
                        <div class="benefit-icon"><i class="fas fa-chart-pie" aria-hidden="true"></i></div>
                        <div class="benefit-content">
                            <h3>Streamlined Operations</h3>
                            <p>Reduce administrative workload by up to 70%.</p>
                        </div>
                    </div>
                    <div class="benefit-item" data-aos="fade-left" data-aos-delay="200">
                        <div class="benefit-icon"><i class="fas fa-shield-alt" aria-hidden="true"></i></div>
                        <div class="benefit-content">
                            <h3>Enhanced Security</h3>
                            <p>Digital records of all visitors and activities.</p>
                        </div>
                    </div>
                    <div class="benefit-item" data-aos="fade-left" data-aos-delay="300">
                        <div class="benefit-icon"><i class="fas fa-money-bill-wave" aria-hidden="true"></i></div>
                        <div class="benefit-content">
                            <h3>Improved Revenue Collection</h3>
                            <p>Increase payment compliance to over 95%.</p>
                        </div>
                    </div>
                    <div class="benefit-item" data-aos="fade-left" data-aos-delay="400">
                        <div class="benefit-icon"><i class="fas fa-database" aria-hidden="true"></i></div>
                        <div class="benefit-content">
                            <h3>Data-Driven Decisions</h3>
                            <p>Analytics for estate operations and resident satisfaction.</p>
                        </div>
                    </div>
                    <div class="benefit-item" data-aos="fade-left" data-aos-delay="500">
                        <div class="benefit-icon"><i class="fas fa-coins" aria-hidden="true"></i></div>
                        <div class="benefit-content">
                            <h3>Reduced Operational Costs</h3>
                            <p>Minimize paperwork and staffing needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Implementation Process Section -->
    <section id="process" aria-labelledby="process-heading">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 id="process-heading">Implementation <span>Process</span></h2>
                <p>A seamless transition to better <a href="{{ url('/products/facility-access') }}">estate management</a></p>
            </div>
            <div class="process-timeline">
                <div class="process-step" data-aos="fade-right">
                    <div class="process-icon">
                        <i class="fas fa-handshake" aria-hidden="true"></i>
                    </div>
                    <div class="process-content">
                        <h3>Onboarding</h3>
                        <p>Understanding your estate's unique needs.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-left">
                    <div class="process-icon">
                        <i class="fas fa-tools" aria-hidden="true"></i>
                    </div>
                    <div class="process-content">
                        <h3>Customization</h3>
                        <p>Tailoring SPRUCE to your branding and requirements.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-right">
                    <div class="process-icon">
                        <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                    </div>
                    <div class="process-content">
                        <h3>Staff Training</h3>
                        <p>Ensuring your team is comfortable with the system.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-left">
                    <div class="process-icon">
                        <i class="fas fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="process-content">
                        <h3>Resident Onboarding</h3>
                        <p>Supporting a smooth transition for all residents.</p>
                    </div>
                </div>
                <div class="process-step" data-aos="fade-right">
                    <div class="process-icon">
                        <i class="fas fa-headset" aria-hidden="true"></i>
                    </div>
                    <div class="process-content">
                        <h3>Ongoing Support</h3>
                        <p>Continuous improvement and assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Download Section -->
    <section id="download" aria-labelledby="download-heading">
        <div class="container">
            <div class="download-content" data-aos="fade-right">
                <h2 id="download-heading">Download the <span>Spruce App</span></h2>
                <p>Experience effortless bill payments and visitor management on your smartphone. Available for iOS and Android devices.</p>
                <div class="download-buttons">
                    <a href="#" class="download-btn">
                        <i class="fab fa-apple" aria-hidden="true"></i>
                        <span>Download on<br><strong>App Store</strong></span>
                    </a>
                    <a href="#" class="download-btn">
                        <i class="fab fa-google-play" aria-hidden="true"></i>
                        <span>Get it on<br><strong>Google Play</strong></span>
                    </a>
                </div>
                <div class="download-features">
                    <div class="download-feature">
                        <i class="fas fa-lock" aria-hidden="true"></i>
                        <span>Secure Authentication</span>
                    </div>
                    <div class="download-feature">
                        <i class="fas fa-bell" aria-hidden="true"></i>
                        <span>Real-time Notifications</span>
                    </div>
                    <div class="download-feature">
                        <i class="fas fa-qrcode" aria-hidden="true"></i>
                        <span>QR Code Access</span>
                    </div>
                </div>
            </div>
            <div class="download-image" data-aos="fade-left">
                {{-- <img loading="lazy" src="{{ asset('images/mock-up.png') }}" alt="Spruce app QR code" class="qr-image"> --}}
                <img loading="lazy" src="{{ asset('images/mock-up.png') }}" alt="Spruce app screenshots" class="app-screenshot">
                <div class="circle-decoration"></div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" aria-labelledby="blog-heading">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 id="blog-heading">Latest from our <span>Blog</span></h2>
                <p>Insights and updates from the world of <a href="{{ url('/blog') }}">estate management</a></p>
            </div>
            <div class="blog-grid">
                <article class="blog-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="blog-image">
                        <img loading="lazy" src="{{ asset('images/preview1.png') }}" alt="Future of estate management">
                    </div>
                    <div class="blog-content">
                        <div class="blog-tag">Trends</div>
                        <h3>The Future of Estate Management Today</h3>
                        <p>Discover how technology transforms property management into seamless digital experiences.</p>
                        <a href="{{ url('/blog/future-estate-management') }}" class="blog-link">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "BlogPosting",
                        "headline": "The Future of Estate Management Today",
                        "description": "Discover how technology transforms property management into seamless digital experiences.",
                        "image": "{{ asset('lovable-uploads/56fa4ba1-c9ff-4599-a8af-728baf679d9c.png') }}",
                        "url": "{{ url('/blog/future-estate-management') }}",
                        "datePublished": "2025-04-01",
                        "author": {
                            "@type": "Organization",
                            "name": "Spruce"
                        },
                        "publisher": {
                            "@type": "Organization",
                            "name": "Spruce",
                            "logo": {
                                "@type": "ImageObject",
                                "url": "{{ asset('lovable-uploads/c580f324-d717-4f95-9134-4fd26a3f4dcc.png') }}"
                            }
                        }
                    }
                    </script>
                </article>
                <article class="blog-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-image">
                        <img loading="lazy" src="{{ asset('images/preview2.png') }}" alt="Effortless bill payments with Spruce">
                    </div>
                    <div class="blog-content">
                        <div class="blog-tag">Features</div>
                        <h3>Effortless Bill Payments: The Spruce Way</h3>
                        <p>Learn how Spruce reduces late payments by 30% and boosts on-time utility payments.</p>
                        <a href="{{ url('/blog/effortless-bill-payments') }}" class="blog-link">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "BlogPosting",
                        "headline": "Effortless Bill Payments: The Spruce Way",
                        "description": "Learn how Spruce reduces late payments by 30% and boosts on-time utility payments.",
                        "image": "{{ asset('lovable-uploads/f89a604d-ea60-4c9d-8d4d-780d644192b6.png') }}",
                        "url": "{{ url('/blog/effortless-bill-payments') }}",
                        "datePublished": "2025-03-15",
                        "author": {
                            "@type": "Organization",
                            "name": "Spruce"
                        },
                        "publisher": {
                            "@type": "Organization",
                            "name": "Spruce",
                            "logo": {
                                "@type": "ImageObject",
                                "url": "{{ asset('lovable-uploads/c580f324-d717-4f95-9134-4fd26a3f4dcc.png') }}"
                            }
                        }
                    }
                    </script>
                </article>
                <article class="blog-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="blog-image">
                        <img loading="lazy" src="{{ asset('images/preview3.png') }}" alt="Smart visitor management security">
                    </div>
                    <div class="blog-content">
                        <div class="blog-tag">Security</div>
                        <h3>Smart Visitor Management: Enhanced Security</h3>
                        <p>Discover how digital visitor systems improve estate safety and convenience.</p>
                        <a href="{{ url('/blog/smart-visitor-management') }}" class="blog-link">Read More <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "BlogPosting",
                        "headline": "Smart Visitor Management: Enhanced Security",
                        "description": "Discover how digital visitor systems improve estate safety and convenience.",
                        "image": "{{ asset('lovable-uploads/b25658ad-7cb5-402a-a695-0e2bb10c1641.png') }}",
                        "url": "{{ url('/blog/smart-visitor-management') }}",
                        "datePublished": "2025-02-20",
                        "author": {
                            "@type": "Organization",
                            "name": "Spruce"
                        },
                        "publisher": {
                            "@type": "Organization",
                            "name": "Spruce",
                            "logo": {
                                "@type": "ImageObject",
                                "url": "{{ asset('lovable-uploads/c580f324-d717-4f95-9134-4fd26a3f4dcc.png') }}"
                            }
                        }
                    }
                    </script>
                </article>
            </div>
            <div class="blog-cta" data-aos="fade-up">
                <a href="{{ url('/blog') }}" class="btn btn-secondary">View All Articles</a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section id="newsletter" aria-labelledby="newsletter-heading">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="newsletter-content" data-aos="fade-right">
                    <h2 id="newsletter-heading">Stay Updated with <span>Spruce</span></h2>
                    <p>Subscribe to our newsletter for the latest news, updates, and special offers.</p>
                    <form id="newsletter-form" class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email address" required aria-label="Email address">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </div>
                        <div class="form-message"></div>
                    </form>
                </div>
                <div class="newsletter-image" data-aos="fade-left">
                    <img loading="lazy" src="{{ asset('images/subscribe.png') }}" alt="Spruce logo in gold">
                    <div class="circle-decoration"></div>
                </div>
            </div>
        </div>
    </section>
@endsection