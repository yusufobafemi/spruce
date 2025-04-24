<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\PageVisit;
use App\Models\Subscriber;
use App\Models\DownloadClick;
use Illuminate\Support\Carbon;

class DashboardStats extends Component
{
    public array $stats;

    public function __construct($period = 'today')
    {
        $now = Carbon::now();

        // Determine date ranges based on period
        switch ($period) {
            case 'today':
                $startDate = Carbon::today();
                $prevStartDate = Carbon::yesterday()->startOfDay();
                $prevEndDate = Carbon::yesterday()->endOfDay();
                break;
            case 'week':
                $startDate = $now->copy()->startOfWeek();
                $prevStartDate = $now->copy()->subWeek()->startOfWeek();
                $prevEndDate = $now->copy()->subWeek()->endOfWeek();
                break;
            case 'month':
                $startDate = $now->copy()->startOfMonth();
                $prevStartDate = $now->copy()->subMonth()->startOfMonth();
                $prevEndDate = $now->copy()->subMonth()->endOfMonth();
                break;
            case 'year':
                $startDate = $now->copy()->startOfYear();
                $prevStartDate = $now->copy()->subYear()->startOfYear();
                $prevEndDate = $now->copy()->subYear()->endOfYear();
                break;
            default:
                $startDate = Carbon::today();
                $prevStartDate = Carbon::yesterday()->startOfDay();
                $prevEndDate = Carbon::yesterday()->endOfDay();
        }

        // Current period data
        $visitorCount = PageVisit::where('created_at', '>=', $startDate)->count();
        $subscriberCount = Subscriber::where('created_at', '>=', $startDate)->count();
        $redirectCount = DownloadClick::where('created_at', '>=', $startDate)->count();

        // Previous period data
        $prevVisitorCount = PageVisit::whereBetween('created_at', [$prevStartDate, $prevEndDate])->count();
        $prevSubscriberCount = Subscriber::whereBetween('created_at', [$prevStartDate, $prevEndDate])->count();
        $prevRedirectCount = DownloadClick::whereBetween('created_at', [$prevStartDate, $prevEndDate])->count();

        // Helper for % change
        $calcChange = function ($current, $previous) {
            if ($previous == 0 && $current > 0) {
                return ['change' => 100, 'type' => 'positive'];
            } elseif ($previous == 0) {
                return ['change' => 0, 'type' => 'neutral'];
            }

            $change = round((($current - $previous) / $previous) * 100, 1);
            return [
                'change' => abs($change),
                'type' => $change > 0 ? 'positive' : ($change < 0 ? 'negative' : 'neutral'),
            ];
        };

        // Conversion rate: Download clicks / Visits
        $conversionRate = $visitorCount > 0 ? round(($redirectCount / $visitorCount) * 100, 1) : 0;
        $prevConversionRate = $prevVisitorCount > 0 ? round(($prevRedirectCount / $prevVisitorCount) * 100, 1) : 0;
        $conversionChange = $calcChange($conversionRate, $prevConversionRate);

        $visitorChange = $calcChange($visitorCount, $prevVisitorCount);
        $subscriberChange = $calcChange($subscriberCount, $prevSubscriberCount);
        $redirectChange = $calcChange($redirectCount, $prevRedirectCount);

        // Assign stats
        $this->stats = [
            [
                'type' => 'visitors',
                'icon' => 'fas fa-eye',
                'title' => 'Total Visitors',
                'count' => $visitorCount,
                'change' => $visitorChange['change'],
                'change_type' => $visitorChange['type'],
                'period' => $period,
            ],
            [
                'type' => 'clicks',
                'icon' => 'fas fa-mouse-pointer',
                'title' => 'App store redirects',
                'count' => $redirectCount,
                'change' => $redirectChange['change'],
                'change_type' => $redirectChange['type'],
                'period' => $period,
            ],
            [
                'type' => 'subscribers',
                'icon' => 'fas fa-user-plus',
                'title' => 'Subscribers',
                'count' => $subscriberCount,
                'change' => $subscriberChange['change'],
                'change_type' => $subscriberChange['type'],
                'period' => $period,
            ],
            [
                'type' => 'conversion',
                'icon' => 'fas fa-chart-pie',
                'title' => 'Conversion Rate',
                'count' => $conversionRate,
                'suffix' => '%',
                'change' => $conversionChange['change'],
                'change_type' => $conversionChange['type'],
                'period' => $period,
            ],
        ];
    }

    public function render()
    {
        return view('components.dashboard-stats');
    }
}
