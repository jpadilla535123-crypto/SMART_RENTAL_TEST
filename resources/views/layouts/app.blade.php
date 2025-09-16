<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SmartRent Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100">
    <div class="flex">
        @include('components.sidebar')
        
        <main class="flex-1 ml-64">
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // CSRF token setup for AJAX requests
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    @stack('scripts')
</body>
</html>