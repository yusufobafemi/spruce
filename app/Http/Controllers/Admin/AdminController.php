<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel; // if you're using Laravel Excel

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function subscribers(Request $request)
{
    $totalSubscribers = Cache::remember('totalSubscribers', 60, function () {
        return Subscriber::count() ?: 0;
    });

    $newSubscribers = Cache::remember('newSubscribers', 60, function () {
        return Subscriber::where('created_at', '>=', now()->subDay())->count() ?: 0;  // Last 24 hours
    });

    $perPage = $request->input('per_page', 20);

    $subscribers = Subscriber::latest()->paginate($perPage);

    if ($request->ajax()) {
        return view('admin.partials.subscribers', compact('subscribers', 'totalSubscribers', 'newSubscribers'))->render();
    }    

    return view('admin.partials.subscribers', compact('totalSubscribers', 'newSubscribers', 'subscribers'));
}

    public function export()
    {
        $subscribers = Subscriber::all();
        $csv = "Email,Date Subscribed\n";

        foreach ($subscribers as $subscriber) {
            $csv .= "{$subscriber->email},{$subscriber->created_at->format('Y-m-d')}\n";
        }

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="subscribers.csv"',
        ]);
    }

    public function dashboard()
    {
        return view('admin.partials.dashboard'); // blade partial like _subscribers.blade.php
    }
}
