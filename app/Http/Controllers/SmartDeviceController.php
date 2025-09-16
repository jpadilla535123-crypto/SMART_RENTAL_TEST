<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartDeviceController extends Controller
{
    public function index()
    {
        $devices = [
            [
                'id' => 1,
                'name' => 'Smart Thermostat',
                'property' => 'Sunset Villa #12',
                'type' => 'thermostat',
                'status' => 'online',
                'value' => '72°F',
                'is_active' => true,
                'battery' => 85
            ],
            [
                'id' => 2,
                'name' => 'Front Door Lock',
                'property' => 'Downtown Loft #3',
                'type' => 'lock',
                'status' => 'online',
                'value' => 'Locked',
                'is_active' => true,
                'battery' => 65
            ],
            [
                'id' => 3,
                'name' => 'Living Room Lights',
                'property' => 'Garden Court #15',
                'type' => 'light',
                'status' => 'online',
                'value' => '80% Brightness',
                'is_active' => true,
                'battery' => null
            ],
            [
                'id' => 4,
                'name' => 'Security Camera',
                'property' => 'Riverside Manor #8',
                'type' => 'camera',
                'status' => 'offline',
                'value' => 'Recording',
                'is_active' => false,
                'battery' => 45
            ],
            [
                'id' => 5,
                'name' => 'Kitchen Lights',
                'property' => 'Tech Hub #22',
                'type' => 'light',
                'status' => 'online',
                'value' => 'Off',
                'is_active' => false,
                'battery' => null
            ],
            [
                'id' => 6,
                'name' => 'Smart Lock Pro',
                'property' => 'Historic Heights #7',
                'type' => 'lock',
                'status' => 'online',
                'value' => 'Unlocked',
                'is_active' => true,
                'battery' => 92
            ]
        ];

        $stats = [
            'total' => count($devices),
            'online' => count(array_filter($devices, fn($d) => $d['status'] === 'online')),
            'active' => count(array_filter($devices, fn($d) => $d['is_active'])),
            'low_battery' => count(array_filter($devices, fn($d) => $d['battery'] !== null && $d['battery'] < 30))
        ];

        return view('devices', compact('devices', 'stats'));
    }

    public function toggle(Request $request, $id)
    {
        // In a real application, you would update the device status in the database
        return response()->json(['success' => true, 'message' => 'Device toggled successfully']);
    }
}