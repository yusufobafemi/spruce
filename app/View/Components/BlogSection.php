<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class BlogSection extends Component
{
    public $posts;
    public $error;

    public function __construct()
    {
        // Try to get posts from cache first
        $this->posts = Cache::get('blog_posts', []);
        $this->error = Cache::get('blog_posts_error');
    }

    public function render()
    {
        return view('components.blog-section');
    }
}
