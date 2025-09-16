@extends('layouts.app')

@section('title', 'Maintenance - SmartRent Management')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Maintenance</h1>
            <p class="text-slate-600">Track and manage maintenance requests across all properties.</p>
        </div>
        <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>New Request</span>
        </button>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Total Requests</p>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Pending</p>
                    <p class="text-3xl font-bold text-amber-600 mt-1">{{ $stats['pending'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">In Progress</p>
                    <p class="text-3xl font-bold text-blue-600 mt-1">{{ $stats['in_progress'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">High Priority</p>
                    <p class="text-3xl font-bold text-red-600 mt-1">{{ $stats['high_priority'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Requests Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach($requests as $request)
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($request['priority'] === 'high') bg-red-100 text-red-800
                                @elseif($request['priority'] === 'medium') bg-amber-100 text-amber-800
                                @else bg-green-100 text-green-800
                                @endif">
                                {{ strtoupper($request['priority']) }}
                            </span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($request['status'] === 'completed') bg-green-100 text-green-800
                                @elseif($request['status'] === 'in-progress') bg-blue-100 text-blue-800
                                @elseif($request['status'] === 'scheduled') bg-purple-100 text-purple-800
                                @else bg-amber-100 text-amber-800
                                @endif">
                                {{ strtoupper(str_replace('-', ' ', $request['status'])) }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">{{ $request['title'] }}</h3>
                        <p class="text-sm text-slate-600 mb-3">{{ $request['description'] }}</p>
                    </div>
                    <button class="text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                        </svg>
                    </button>
                </div>

                <div class="space-y-3 mb-4">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="text-slate-600">{{ $request['property'] }}</span>
                        </div>
                        <span class="font-medium text-slate-800">{{ $request['category'] }}</span>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-slate-600">{{ $request['tenant'] }}</span>
                        </div>
                        <span class="font-medium text-slate-800">{{ $request['estimated_cost'] }}</span>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-slate-600">{{ date('M j, Y', strtotime($request['created_date'])) }}</span>
                        </div>
                        @if($request['assigned_to'])
                            <span class="text-slate-600">Assigned to {{ $request['assigned_to'] }}</span>
                        @endif
                    </div>
                </div>

                <div class="flex space-x-2">
                    <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center space-x-2">
                        @if($request['status'] === 'completed')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif($request['status'] === 'in-progress')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif($request['status'] === 'scheduled')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        @endif
                        <span>Update Status</span>
                    </button>
                    <button class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition-colors duration-200">
                        View Details
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection