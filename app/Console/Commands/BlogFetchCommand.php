<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BlogFetchCommand extends Command
{
    protected $signature = 'blog:fetch';
    protected $description = 'Fetch latest blog posts from WordPress and cache them';

    public function handle()
    {
        $wpApiUrl = 'https://blog.sprucesolutionsng.com/wp-json/wp/v2/posts';

        try {
            $response = Http::get($wpApiUrl, [
                'per_page' => 3,
                '_embed' => 1,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $posts = is_array($data) ? $data : [$data];

                Cache::put('blog_posts', $posts, now()->addMinutes(10)); // Cache for 10 minutes
                Cache::forget('blog_posts_error'); // Clear old error
                $this->info('Blog posts fetched and cached.');
            } else {
                Cache::put('blog_posts', []);
                Cache::put('blog_posts_error', 'Unable to fetch blog posts.');
                $this->error(' Failed to fetch blog posts.');
            }
        } catch (\Exception $e) {
            Cache::put('blog_posts', []);
            Cache::put('blog_posts_error', 'An error occurred while fetching blog posts.');
            $this->error(' Exception: ' . $e->getMessage());
        }
    }
}
