@extends('layouts.app')

@section('title', 'Analytics - SmartRent Management')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 mb-2">Analytics</h1>
        <p class="text-slate-600">Track performance metrics and insights across your portfolio.</p>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="flex items-center space-x-1 text-green-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span class="text-sm font-medium">+8.2%</span>
                </div>
            </div>
            <h3 class="text-sm font-medium text-slate-500 mb-1">Monthly Revenue</h3>
            <p class="text-2xl font-bold text-slate-800">$52,000</p>
            <p class="text-sm text-slate-600 mt-1">vs $48,000 last month</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <div class="flex items-center space-x-1 text-green-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span class="text-sm font-medium">+2.1%</span>
                </div>
            </div>
            <h3 class="text-sm font-medium text-slate-500 mb-1">Avg Occupancy</h3>
            <p class="text-2xl font-bold text-slate-800">93.2%</p>
            <p class="text-sm text-slate-600 mt-1">across all properties</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <div class="flex items-center space-x-1 text-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                    </svg>
                    <span class="text-sm font-medium">-1.2%</span>
                </div>
            </div>
            <h3 class="text-sm font-medium text-slate-500 mb-1">Tenant Turnover</h3>
            <p class="text-2xl font-bold text-slate-800">8.5%</p>
            <p class="text-sm text-slate-600 mt-1">annual rate</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div class="flex items-center space-x-1 text-green-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span class="text-sm font-medium">+12.3%</span>
                </div>
            </div>
            <h3 class="text-sm font-medium text-slate-500 mb-1">Net Profit</h3>
            <p class="text-2xl font-bold text-slate-800">$35,500</p>
            <p class="text-sm text-slate-600 mt-1">this month</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Revenue Chart -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-slate-800">Revenue vs Expenses</h2>
                <div class="flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span class="text-slate-600">Revenue</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                        <span class="text-slate-600">Expenses</span>
                    </div>
                </div>
            </div>
            
            <div class="h-64 flex items-end justify-between space-x-2">
                @php
                    $maxValue = max(array_column($monthlyRevenue, 'revenue'));
                @endphp
                @foreach($monthlyRevenue as $data)
                    @php
                        $revenueHeight = ($data['revenue'] / $maxValue) * 200;
                        $expenseHeight = ($data['expenses'] / $maxValue) * 200;
                    @endphp
                    <div class="flex-1 flex flex-col items-center space-y-2">
                        <div class="flex items-end space-x-1 w-full">
                            <div 
                                class="bg-blue-500 rounded-t-sm flex-1"
                                style="height: {{ $revenueHeight }}px"
                            ></div>
                            <div 
                                class="bg-red-400 rounded-t-sm flex-1"
                                style="height: {{ $expenseHeight }}px"
                            ></div>
                        </div>
                        <span class="text-xs text-slate-600 font-medium">{{ $data['month'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Occupancy Rates -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <h2 class="text-xl font-semibold text-slate-800 mb-6">Property Occupancy</h2>
            <div class="space-y-4">
                @foreach($occupancyData as $property)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <span class="font-medium text-slate-800 w-32">{{ $property['property'] }}</span>
                            <div class="w-32 bg-slate-200 rounded-full h-2">
                                <div 
                                    class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full"
                                    style="width: {{ $property['occupancy'] }}%"
                                ></div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="font-semibold text-slate-800">{{ $property['occupancy'] }}%</span>
                            @if($property['trend'] === 'up')
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            @elseif($property['trend'] === 'down')
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                </svg>
                            @else
                                <div class="w-4 h-4 bg-slate-300 rounded-full"></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Maintenance Analytics -->
    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <h2 class="text-xl font-semibold text-slate-800 mb-6">Maintenance Analytics</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-slate-800 mb-2">{{ $maintenanceStats['this_month'] }}</div>
                <div class="text-sm text-slate-600">Requests This Month</div>
                <div class="{{ $maintenanceStats['this_month'] > $maintenanceStats['last_month'] ? 'text-red-600' : 'text-green-600' }} text-xs mt-1">
                    {{ $maintenanceStats['this_month'] > $maintenanceStats['last_month'] ? '+' : '' }}{{ $maintenanceStats['this_month'] - $maintenanceStats['last_month'] }} vs last month
                </div>
            </div>
            
            <div class="text-center">
                <div class="text-3xl font-bold text-slate-800 mb-2">${{ $maintenanceStats['avg_cost'] }}</div>
                <div class="text-sm text-slate-600">Average Cost</div>
                <div class="text-xs text-green-600 mt-1">-$15 vs last month</div>
            </div>
            
            <div class="text-center">
                <div class="text-3xl font-bold text-slate-800 mb-2">${{ number_format($maintenanceStats['total_cost']) }}</div>
                <div class="text-sm text-slate-600">Total This Month</div>
                <div class="text-xs text-amber-600 mt-1">+$420 vs last month</div>
            </div>
            
            <div class="text-center">
                <div class="text-3xl font-bold text-slate-800 mb-2">2.1</div>
                <div class="text-sm text-slate-600">Days Avg Resolution</div>
                <div class="text-xs text-green-600 mt-1">-0.3 days improvement</div>
            </div>
        </div>
    </div>
</div>
@endsection