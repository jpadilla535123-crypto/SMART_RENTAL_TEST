<div class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl border-r border-slate-200">
    <div class="p-6 border-b border-slate-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-800">SmartRent</h1>
                <p class="text-sm text-slate-500">Management System</p>
            </div>
        </div>
    </div>

    <nav class="mt-8">
        @php
            $menuItems = [
                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
                ['route' => 'properties', 'label' => 'Properties', 'icon' => 'building'],
                ['route' => 'devices', 'label' => 'Smart Devices', 'icon' => 'smartphone'],
                ['route' => 'tenants', 'label' => 'Tenants', 'icon' => 'users'],
                ['route' => 'maintenance', 'label' => 'Maintenance', 'icon' => 'wrench'],
                ['route' => 'analytics', 'label' => 'Analytics', 'icon' => 'chart']
            ];
        @endphp

        @foreach($menuItems as $item)
            <a href="{{ route($item['route']) }}" 
               class="w-full flex items-center space-x-3 px-6 py-3 text-left transition-all duration-200 hover:bg-slate-50 {{ request()->routeIs($item['route']) ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : 'text-slate-600 hover:text-slate-800' }}">
                @include('components.icons.' . $item['icon'])
                <span class="font-medium">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="absolute bottom-6 left-6 right-6">
        <div class="flex items-center space-x-3 p-3 bg-slate-50 rounded-lg">
            <div class="w-8 h-8 bg-slate-300 rounded-full"></div>
            <div class="flex-1">
                <p class="text-sm font-medium text-slate-800">John Manager</p>
                <p class="text-xs text-slate-500">Property Manager</p>
            </div>
            @include('components.icons.settings', ['class' => 'w-4 h-4 text-slate-400'])
        </div>
    </div>
</div>