<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = [
            [
                'id' => 1,
                'name' => 'Sunset Villa Complex',
                'address' => '123 Ocean Drive, Miami, FL',
                'units' => 24,
                'occupied' => 22,
                'rent' => '$2,800/month',
                'status' => 'active',
                'image' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ],
            [
                'id' => 2,
                'name' => 'Downtown Lofts',
                'address' => '456 Main Street, New York, NY',
                'units' => 18,
                'occupied' => 16,
                'rent' => '$3,200/month',
                'status' => 'active',
                'image' => 'https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ],
            [
                'id' => 3,
                'name' => 'Garden Court Apartments',
                'address' => '789 Elm Avenue, Austin, TX',
                'units' => 32,
                'occupied' => 28,
                'rent' => '$1,900/month',
                'status' => 'active',
                'image' => 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ],
            [
                'id' => 4,
                'name' => 'Riverside Manor',
                'address' => '321 River Road, Portland, OR',
                'units' => 12,
                'occupied' => 10,
                'rent' => '$2,400/month',
                'status' => 'maintenance',
                'image' => 'https://images.pexels.com/photos/1438832/pexels-photo-1438832.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ],
            [
                'id' => 5,
                'name' => 'Tech Hub Residences',
                'address' => '654 Innovation Blvd, San Jose, CA',
                'units' => 40,
                'occupied' => 38,
                'rent' => '$4,100/month',
                'status' => 'active',
                'image' => 'https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ],
            [
                'id' => 6,
                'name' => 'Historic Heights',
                'address' => '987 Heritage Lane, Boston, MA',
                'units' => 16,
                'occupied' => 14,
                'rent' => '$2,600/month',
                'status' => 'renovation',
                'image' => 'https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
            ]
        ];

        // Filter properties based on search and status
        $search = $request->get('search');
        $status = $request->get('status');

        if ($search) {
            $properties = array_filter($properties, function($property) use ($search) {
                return stripos($property['name'], $search) !== false || 
                       stripos($property['address'], $search) !== false;
            });
        }

        if ($status && $status !== 'all') {
            $properties = array_filter($properties, function($property) use ($status) {
                return $property['status'] === $status;
            });
        }

        return view('properties', compact('properties'));
    }
}