<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $monthlyRevenue = [
            ['month' => 'Jan', 'revenue' => 42000, 'expenses' => 15000],
            ['month' => 'Feb', 'revenue' => 45000, 'expenses' => 16000],
            ['month' => 'Mar', 'revenue' => 48000, 'expenses' => 14000],
            ['month' => 'Apr', 'revenue' => 46000, 'expenses' => 17000],
            ['month' => 'May', 'revenue' => 50000, 'expenses' => 15500],
            ['month' => 'Jun', 'revenue' => 52000, 'expenses' => 16500]
        ];

        $occupancyData = [
            ['property' => 'Sunset Villa', 'occupancy' => 95, 'trend' => 'up'],
            ['property' => 'Downtown Lofts', 'occupancy' => 88, 'trend' => 'down'],
            ['property' => 'Garden Court', 'occupancy' => 92, 'trend' => 'up'],
            ['property' => 'Tech Hub', 'occupancy' => 98, 'trend' => 'stable'],
            ['property' => 'Historic Heights', 'occupancy' => 85, 'trend' => 'down']
        ];

        $maintenanceStats = [
            'this_month' => 15,
            'last_month' => 12,
            'avg_cost' => 185,
            'total_cost' => 2775
        ];

        return view('analytics', compact('monthlyRevenue', 'occupancyData', 'maintenanceStats'));
    }
}