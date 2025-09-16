<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $tenants = [
            [
                'id' => 1,
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@email.com',
                'phone' => '(555) 123-4567',
                'property' => 'Sunset Villa #12',
                'unit' => 'Unit 12A',
                'lease_start' => '2024-01-15',
                'lease_end' => '2025-01-14',
                'rent' => '$2,800',
                'status' => 'active',
                'payment_status' => 'current',
                'avatar' => 'https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
            ],
            [
                'id' => 2,
                'name' => 'Michael Chen',
                'email' => 'michael.chen@email.com',
                'phone' => '(555) 234-5678',
                'property' => 'Downtown Loft #3',
                'unit' => 'Unit 3B',
                'lease_start' => '2023-09-01',
                'lease_end' => '2024-08-31',
                'rent' => '$3,200',
                'status' => 'active',
                'payment_status' => 'current',
                'avatar' => 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
            ],
            [
                'id' => 3,
                'name' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@email.com',
                'phone' => '(555) 345-6789',
                'property' => 'Garden Court #15',
                'unit' => 'Unit 15C',
                'lease_start' => '2024-03-01',
                'lease_end' => '2025-02-28',
                'rent' => '$1,900',
                'status' => 'active',
                'payment_status' => 'late',
                'avatar' => 'https://images.pexels.com/photos/1130626/pexels-photo-1130626.jpeg?auto=compress&cs=tinysrgb&w=100&h=100&fit=crop'
            ]
        ];

        $stats = [
            'total' => count($tenants),
            'active' => count(array_filter($tenants, fn($t) => $t['status'] === 'active')),
            'late' => count(array_filter($tenants, fn($t) => $t['payment_status'] === 'late')),
            'expiring' => 1
        ];

        return view('tenants', compact('tenants', 'stats'));
    }
}