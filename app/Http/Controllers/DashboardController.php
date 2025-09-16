<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => 24,
            'active_tenants' => 89,
            'smart_devices' => 156,
            'monthly_revenue' => 48320
        ];

        $recentActivities = [
            [
                'id' => 1,
                'type' => 'maintenance',
                'title' => 'AC Repair Request',
                'property' => 'Sunset Villa #12',
                'status' => 'pending',
                'time' => '2 hours ago'
            ],
            [
                'id' => 2,
                'type' => 'tenant',
                'title' => 'New Tenant Check-in',
                'property' => 'Ocean View #8',
                'status' => 'completed',
                'time' => '4 hours ago'
            ],
            [
                'id' => 3,
                'type' => 'device',
                'title' => 'Smart Lock Battery Low',
                'property' => 'Garden Court #15',
                'status' => 'alert',
                'time' => '6 hours ago'
            ],
            [
                'id' => 4,
                'type' => 'payment',
                'title' => 'Rent Payment Received',
                'property' => 'Downtown Loft #3',
                'status' => 'completed',
                'time' => '1 day ago'
            ]
        ];

        return view('dashboard', compact('stats', 'recentActivities'));
    }
}