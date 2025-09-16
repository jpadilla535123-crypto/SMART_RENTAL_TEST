@extends('layouts.app')

@section('title', 'Smart Devices - SmartRent Management')

@section('content')
<div class="space-y-8" x-data="deviceManager()">
    <div>
        <h1 class="text-3xl font-bold text-slate-800 mb-2">Smart Devices</h1>
        <p class="text-slate-600">Monitor and control smart devices across all your properties.</p>
    </div>

    <!-- Device Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Total Devices</p>
                    <p class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a1 1 0 001-1V4a1 1 0 00-1-1H8a1 1 0 00-1 1v16a1 1 0 001 1z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Online</p>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $stats['online'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Active</p>
                    <p class="text-3xl font-bold text-purple-600 mt-1">{{ $stats['active'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-500 text-sm font-medium">Low Battery</p>
                    <p class="text-3xl font-bold text-red-600 mt-1">{{ $stats['low_battery'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Devices Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($devices as $device)
            <div class="bg-white rounded-xl shadow-lg border border-slate-200 p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center {{ $device['is_active'] ? 'bg-gradient-to-r from-blue-500 to-purple-600' : 'bg-slate-200' }}">
                            @if($device['type'] === 'thermostat')
                                <svg class="w-6 h-6 {{ $device['is_active'] ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            @elseif($device['type'] === 'lock')
                                <svg class="w-6 h-6 {{ $device['is_active'] ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            @elseif($device['type'] === 'light')
                                <svg class="w-6 h-6 {{ $device['is_active'] ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            @else
                                <svg class="w-6 h-6 {{ $device['is_active'] ? 'text-white' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-800">{{ $device['name'] }}</h3>
                            <p class="text-sm text-slate-500">{{ $device['property'] }}</p>
                        </div>
                    </div>
                    <button class="text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        @if($device['status'] === 'online')
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728m0-12.728l12.728 12.728"></path>
                            </svg>
                        @endif
                        <span class="text-sm font-medium capitalize {{ $device['status'] === 'online' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $device['status'] }}
                        </span>
                    </div>
                    @if($device['battery'] !== null)
                        <div class="flex items-center space-x-1">
                            <div class="w-6 h-3 border border-slate-300 rounded-sm relative">
                                <div 
                                    class="h-full rounded-sm {{ $device['battery'] > 50 ? 'bg-green-500' : ($device['battery'] > 20 ? 'bg-amber-500' : 'bg-red-500') }}"
                                    style="width: {{ $device['battery'] }}%"
                                ></div>
                            </div>
                            <span class="text-xs {{ $device['battery'] > 50 ? 'text-green-500' : ($device['battery'] > 20 ? 'text-amber-500' : 'text-red-500') }}">
                                {{ $device['battery'] }}%
                            </span>
                        </div>
                    @endif
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-slate-600">Status:</span>
                        <span class="text-sm font-semibold text-slate-800">{{ $device['value'] }}</span>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <button
                        @click="toggleDevice({{ $device['id'] }})"
                        class="flex-1 py-2 px-4 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2 {{ $device['is_active'] ? 'bg-red-100 text-red-700 hover:bg-red-200' : 'bg-green-100 text-green-700 hover:bg-green-200' }}"
                    >
                        @if($device['is_active'])
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728m0-12.728l12.728 12.728"></path>
                            </svg>
                            <span>Turn Off</span>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            <span>Turn On</span>
                        @endif
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
function deviceManager() {
    return {
        toggleDevice(deviceId) {
            fetch(`/api/devices/${deviceId}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.Laravel.csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page to reflect changes
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
}
</script>
@endpush
@endsection