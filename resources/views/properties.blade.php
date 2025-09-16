@extends('layouts.app')

@section('title', 'Properties - SmartRent Management')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Properties</h1>
            <p class="text-slate-600">Manage your rental properties and track their performance.</p>
        </div>
        <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Add Property</span>
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <form method="GET" action="{{ route('properties') }}" class="flex flex-col sm:flex-row gap-4">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input
                    type="text"
                    name="search"
                    placeholder="Search properties..."
                    value="{{ request('search') }}"
                    class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <select
                    name="status"
                    onchange="this.form.submit()"
                    class="pl-10 pr-8 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white"
                >
                    <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="maintenance" {{ request('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    <option value="renovation" {{ request('status') === 'renovation' ? 'selected' : '' }}>Renovation</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Properties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($properties as $property)
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative">
                    <img 
                        src="{{ $property['image'] }}" 
                        alt="{{ $property['name'] }}"
                        class="w-full h-48 object-cover"
                    />
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full text-sm font-medium capitalize
                            @if($property['status'] === 'active') bg-green-100 text-green-800
                            @elseif($property['status'] === 'maintenance') bg-amber-100 text-amber-800
                            @elseif($property['status'] === 'renovation') bg-purple-100 text-purple-800
                            @else bg-slate-100 text-slate-800
                            @endif">
                            {{ $property['status'] }}
                        </span>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-slate-800">{{ $property['name'] }}</h3>
                        <button class="text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="flex items-center text-slate-600 mb-3">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-sm">{{ $property['address'] }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-sm text-slate-600">{{ $property['units'] }} units</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                            <span class="text-sm text-slate-600">{{ $property['occupied'] }} occupied</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            <span class="font-semibold text-slate-800">{{ $property['rent'] }}</span>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-slate-600">Occupancy</div>
                            <div class="font-semibold text-slate-800">
                                {{ round(($property['occupied'] / $property['units']) * 100) }}%
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>View</span>
                        </button>
                        <button class="flex-1 bg-slate-100 text-slate-700 py-2 px-4 rounded-lg hover:bg-slate-200 transition-colors duration-200 flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span>Edit</span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection