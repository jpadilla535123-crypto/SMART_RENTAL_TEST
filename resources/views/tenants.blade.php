@extends('layouts.app')

@section('title', 'Tenants - SmartRent Management')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-slate-800 mb-2">Tenants</h1>
            <p class="text-slate-600">Manage tenant information, leases, and communications.</p>
        </div>
        <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Add Tenant</span>
        </button>
    </div>

    <!-- Tenant Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Total Tenants</p>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Active</p>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $stats['active'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Late Payments</p>
                    <p class="text-3xl font-bold text-red-600 mt-1">{{ $stats['late'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Expiring Soon</p>
                    <p class="text-3xl font-bold text-amber-600 mt-1">{{ $stats['expiring'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tenants List -->
    <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Tenant</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Property</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Lease</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Rent</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Status</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Payment</th>
                        <th class="text-left py-4 px-6 font-semibold text-slate-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach($tenants as $tenant)
                        <tr class="hover:bg-slate-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <img 
                                        src="{{ $tenant['avatar'] }}" 
                                        alt="{{ $tenant['name'] }}"
                                        class="w-10 h-10 rounded-full object-cover"
                                    />
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $tenant['name'] }}</p>
                                        <div class="flex items-center space-x-4 text-sm text-slate-500 mt-1">
                                            <div class="flex items-center space-x-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>{{ $tenant['email'] }}</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                </svg>
                                                <span>{{ $tenant['phone'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <div>
                                        <p class="font-medium text-slate-800">{{ $tenant['property'] }}</p>
                                        <p class="text-sm text-slate-500">{{ $tenant['unit'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="text-sm">
                                        <p class="text-slate-800">{{ date('M j, Y', strtotime($tenant['lease_start'])) }}</p>
                                        <p class="text-slate-500">to {{ date('M j, Y', strtotime($tenant['lease_end'])) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-semibold text-slate-800">{{ $tenant['rent'] }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-sm font-medium capitalize
                                    @if($tenant['status'] === 'active') bg-green-100 text-green-800
                                    @elseif($tenant['status'] === 'notice') bg-amber-100 text-amber-800
                                    @elseif($tenant['status'] === 'expired') bg-red-100 text-red-800
                                    @else bg-slate-100 text-slate-800
                                    @endif">
                                    {{ $tenant['status'] }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-1 
                                    @if($tenant['payment_status'] === 'current') text-green-600
                                    @elseif($tenant['payment_status'] === 'late') text-red-600
                                    @else text-amber-600
                                    @endif">
                                    @if($tenant['payment_status'] === 'current')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                    <span class="text-sm font-medium capitalize">{{ $tenant['payment_status'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <button class="text-slate-400 hover:text-slate-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection