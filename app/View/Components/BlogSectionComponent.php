<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class BlogSectionComponent extends Component
{
    public $posts = [];
    public $error = null;

    public function __construct()
    {
        $wpApiUrl = 'https://blog.sprucesolutionsng.com/wp-json/wp/v2/posts';

        try {
            $response = Http::get($wpApiUrl, [
                'per_page' => 3,
                '_embed' => true,
            ]);

            if ($response->successful()) {
                $this->posts = $response->json();
            } else {
                $this->error = 'Unable to fetch blog posts. Please try again later.';
            }
        } catch (\Exception $e) {
            $this->error = 'An error occurred while fetching blog posts.';
        }
    }

    public function render()
    {
        return view('components.blog-section');
    }
}
