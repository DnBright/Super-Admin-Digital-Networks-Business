<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-900 text-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Division Admin') | Digital Networks Business</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .glass {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="h-full font-sans antialiased overflow-hidden">
    <div class="flex h-screen overflow-hidden">
        <!-- Master Sidebar configured for the active division -->
        @include('components.master-sidebar', ['role' => 'division', 'division' => $division ?? 'webdev'])

        <!-- Content Area -->
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden bg-slate-950">
            <!-- Header -->
            <header class="flex items-center justify-between px-6 py-4 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md z-10">
                <div class="flex items-center space-x-3">
                    <span class="px-2.5 py-1 text-xs font-semibold tracking-wider rounded-md uppercase @yield('division-color-classes', 'bg-blue-500/10 text-blue-400 border border-blue-500/20')">
                        @yield('division-name', 'Division')
                    </span>
                    <h2 class="text-xl font-semibold text-slate-100 tracking-wide">@yield('page-title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Home / SuperAdmin portal link -->
                    <a href="{{ url('/') }}" class="text-sm font-medium text-slate-400 hover:text-indigo-400 transition-colors duration-200">
                        Portal Super Admin &rarr;
                    </a>
                    <!-- User Menu -->
                    <div class="flex items-center space-x-3 border-l border-slate-800 pl-4">
                        <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center font-bold text-sm text-slate-200 shadow-md border border-slate-700">
                            DA
                        </div>
                        <span class="text-sm font-medium text-slate-300 hidden md:block">Division Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
