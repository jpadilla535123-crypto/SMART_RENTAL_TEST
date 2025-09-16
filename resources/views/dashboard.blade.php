@extends('layouts.app')

@section('title', 'Dashboard - SmartRent Management')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 mb-2">Dashboard</h1>
        <p class="text-slate-600">Welcome back! Here's what's happening with your properties.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Total Properties</p>
                        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total_properties'] }}</p>
                        <p class="text-sm text-green-600 mt-1">+2 from last month</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Active Tenants</p>
                        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['active_tenants'] }}</p>
                        <p class="text-sm text-green-600 mt-1">+5 from last month</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Smart Devices</p>
                        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['smart_devices'] }}</p>
                        <p class="text-sm text-green-600 mt-1">+12 from last month</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a1 1 0 001-1V4a1 1 0 00-1-1H8a1 1 0 00-1 1v16a1 1 0 001 1z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Monthly Revenue</p>
                        <p class="text-3xl font-bold text-slate-800 mt-1">${{ number_format($stats['monthly_revenue']) }}</p>
                        <p class="text-sm text-green-600 mt-1">+8.2% from last month</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-800">Recent Activities</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($recentActivities as $activity)
                        <div class="flex items-start space-x-4 p-3 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                            @if($activity['status'] === 'completed')
                                <svg class="w-4 h-4 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @elseif($activity['status'] === 'pending')
                                <svg class="w-4 h-4 text-amber-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="w-4 h-4 text-red-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-medium text-slate-800">{{ $activity['title'] }}</h3>
                                <p class="text-sm text-slate-500">{{ $activity['property'] }}</p>
                                <p class="text-xs text-slate-400 mt-1">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Property Overview -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200">
            <div class="p-6 border-b border-slate-200">
                <h2 class="text-xl font-semibold text-slate-800">Property Overview</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Occupied Units</span>
                        <span class="font-semibold text-slate-800">89/96 (93%)</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full" style="width: 93%"></div>
                    </div>
                    
                    <div class="flex justify-between items-center mt-6">
                        <span class="text-slate-600">Maintenance Requests</span>
                        <span class="font-semibold text-slate-800">8 Active</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-amber-400 to-amber-500 h-2 rounded-full" style="width: 35%"></div>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <span class="text-slate-600">Smart Device Status</span>
                        <span class="font-semibold text-slate-800">148/156 Online</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection