<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function subscribers()
    {
        $totalSubscribers = Cache::remember('totalSubscribers', 60, function () {
            return Subscriber::count() ?: 0;
        });

        $newSubscribers = Cache::remember('newSubscribers', 60, function () {
            return Subscriber::where('created_at', '>=', now()->subDay())->count() ?: 0;  // Last 24 hours
        });

        return view('admin.partials.subscribers', [
            'totalSubscribers' => $totalSubscribers,
            'newSubscribers' => $newSubscribers,
        ]);
    }

    public function dashboard()
{
    return view('admin.partials.dashboard'); // blade partial like _subscribers.blade.php
}

    
}

