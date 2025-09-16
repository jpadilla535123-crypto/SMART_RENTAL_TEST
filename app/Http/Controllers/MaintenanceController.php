<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $requests = [
            [
                'id' => 1,
                'title' => 'AC Unit Not Cooling',
                'description' => 'Air conditioning in master bedroom is running but not cooling effectively.',
                'property' => 'Sunset Villa #12',
                'tenant' => 'Sarah Johnson',
                'priority' => 'high',
                'status' => 'pending',
                'category' => 'HVAC',
                'created_date' => '2024-01-08',
                'assigned_to' => 'Mike Rodriguez',
                'estimated_cost' => '$250'
            ],
            [
                'id' => 2,
                'title' => 'Kitchen Sink Leak',
                'description' => 'Water leak under kitchen sink, causing damage to cabinet floor.',
                'property' => 'Downtown Loft #3',
                'tenant' => 'Michael Chen',
                'priority' => 'medium',
                'status' => 'in-progress',
                'category' => 'Plumbing',
                'created_date' => '2024-01-07',
                'assigned_to' => 'Tom Wilson',
                'estimated_cost' => '$180'
            ],
            [
                'id' => 3,
                'title' => 'Front Door Lock Malfunction',
                'description' => 'Smart lock not responding to key fob or mobile app.',
                'property' => 'Garden Court #15',
                'tenant' => 'Emily Rodriguez',
                'priority' => 'high',
                'status' => 'pending',
                'category' => 'Security',
                'created_date' => '2024-01-06',
                'assigned_to' => null,
                'estimated_cost' => '$120'
            ]
        ];

        $stats = [
            'total' => count($requests),
            'pending' => count(array_filter($requests, fn($r) => $r['status'] === 'pending')),
            'in_progress' => count(array_filter($requests, fn($r) => $r['status'] === 'in-progress')),
            'high_priority' => count(array_filter($requests, fn($r) => $r['priority'] === 'high'))
        ];

        return view('maintenance', compact('requests', 'stats'));
    }
}