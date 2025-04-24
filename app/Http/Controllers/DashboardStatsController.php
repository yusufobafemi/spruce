<?php

namespace App\Http\Controllers;

use App\View\Components\DashboardStats;

class DashboardStatsController extends Controller
{
    public function index()
    {
        // Get the selected period from the query string (default to 'today')
        $period = request()->get('period', 'today');
        
        // Return the filtered data as a JSON response
        $stats = new DashboardStats($period);
        return response()->json($stats->stats);
    }
}
