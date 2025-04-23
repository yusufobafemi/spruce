<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function subscribers()
    {
        return view('admin.partials.subscribers'); // blade partial like _subscribers.blade.php
    }

    public function dashboard()
{
    return view('admin.partials.dashboard'); // blade partial like _subscribers.blade.php
}

    
}

