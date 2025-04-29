<section id="blog" aria-labelledby="blog-heading">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 id="blog-heading">Latest from our <span>Blog</span></h2>
            <p>
                Insights and updates from the world of 
                <a href="{{ url('/blog') }}">estate management</a>
            </p>
        </div>

        @if (!empty($error))
            <div class="text-red-500 text-center">{{ $error }}</div>
        @elseif (!empty($posts))
            <div class="blog-grid">
                @foreach ($posts as $index => $post)
                    @php
                        $image = asset('images/placeholder.png'); // Default image
                        if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
                            $image = $post['_embedded']['wp:featuredmedia'][0]['source_url'];
                        }

                        $category = 'General';
                        if (isset($post['_embedded']['wp:term'][0][0]['name'])) {
                            $category = $post['_embedded']['wp:term'][0][0]['name'];
                        }

                        $title = $post['title']['rendered'] ?? 'Untitled';
                        $excerpt = strip_tags($post['excerpt']['rendered'] ?? '');
                        $link = $post['link'] ?? '#';
                        $date = \Carbon\Carbon::parse($post['date'])->toIso8601String();
                    @endphp

                    <article class="blog-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                        <div class="blog-image">
                            <img loading="lazy" src="{{ $image }}" alt="{{ strip_tags($title) }}">
                        </div>

                        <div class="blog-content">
                            <div class="blog-tag">{{ $category }}</div>
                            <h3>{!! $title !!}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($excerpt, 100) }}</p>
                            <a href="{{ $link }}" class="blog-link" target="_blank">
                                Read More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>

                        {{-- SEO Structured Data --}}
                        <script type="application/ld+json">
                        {
                            "@context": "https://schema.org",
                            "@type": "BlogPosting",
                            "headline": "{{ addslashes(strip_tags($title)) }}",
                            "description": "{{ addslashes($excerpt) }}",
                            "image": "{{ $image }}",
                            "url": "{{ $link }}",
                            "datePublished": "{{ $date }}",
                            "author": {
                                "@type": "Organization",
                                "name": "Spruce"
                            },
                            "publisher": {
                                "@type": "Organization",
                                "name": "Spruce",
                                "logo": {
                                    "@type": "ImageObject",
                                    "url": "{{ asset('images/hero.png') }}"
                                }
                            }
                        }
                        </script>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500" data-aos="fade-up">
                No blog posts found.
            </div>
        @endif

        <div class="blog-cta" data-aos="fade-up">
            <a href="https://blog.sprucesolutionsng.com" class="btn btn-secondary" target="_blank">View All Articles</a>
        </div>
    </div>
</section>
