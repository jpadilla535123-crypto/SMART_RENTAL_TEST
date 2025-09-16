<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SmartDeviceController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AnalyticsController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
Route::get('/devices', [SmartDeviceController::class, 'index'])->name('devices');
Route::get('/tenants', [TenantController::class, 'index'])->name('tenants');
Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

// API routes for device control
Route::post('/api/devices/{id}/toggle', [SmartDeviceController::class, 'toggle'])->name('devices.toggle');