<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardStats extends Component
{
    public array $stats;

    public function __construct()
    {
        // You can fetch this dynamically from DB later
        $this->stats = [
            [
                'type' => 'visitors',
                'icon' => 'fas fa-eye',
                'title' => 'Total Visitors',
                'count' => 24859,
                'change' => 12.5,
                'change_type' => 'positive',
            ],
            [
                'type' => 'clicks',
                'icon' => 'fas fa-mouse-pointer',
                'title' => 'App store redirects',
                'count' => 1112,
                'change' => 8.3,
                'change_type' => 'positive',
            ],
            [
                'type' => 'subscribers',
                'icon' => 'fas fa-user-plus',
                'title' => 'Subscribers',
                'count' => 5621,
                'change' => 5.7,
                'change_type' => 'positive',
            ],
            [
                'type' => 'conversion',
                'icon' => 'fas fa-chart-pie',
                'title' => 'Conversion Rate',
                'count' => 35,
                'suffix' => '%',
                'change' => 2.1,
                'change_type' => 'negative',
            ],
        ];
    }

    public function render()
    {
        return view('components.dashboard-stats');
    }
}
