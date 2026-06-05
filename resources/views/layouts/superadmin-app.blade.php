<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-900 text-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Super Admin') | Digital Networks Business</title>

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
        <!-- Master Sidebar -->
        @include('components.master-sidebar', ['role' => 'superadmin'])

        <!-- Content Area -->
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden bg-slate-950">
            <!-- Header -->
            <header class="flex items-center justify-between px-6 py-4 border-b border-slate-800 bg-slate-900/50 backdrop-blur-md z-10">
                <div class="flex items-center">
                    <h2 class="text-xl font-semibold text-slate-100 tracking-wide">@yield('page-title', 'Dashboard')</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="p-2 text-slate-400 hover:text-indigo-400 transition-colors duration-200 focus:outline-none relative">
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-indigo-500 rounded-full animate-pulse"></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <!-- User Menu -->
                    <div class="flex items-center space-x-3 border-l border-slate-800 pl-4">
                        <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center font-bold text-sm text-white shadow-lg ring-2 ring-indigo-500/30">
                            SA
                        </div>
                        <span class="text-sm font-medium text-slate-300 hidden md:block">Super Admin</span>
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
