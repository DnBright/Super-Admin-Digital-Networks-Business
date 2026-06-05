<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Client Portal') | Digital Networks Business</title>

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
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="h-full antialiased flex flex-col justify-between bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
    <!-- Header -->
    <header class="w-full px-6 py-4 border-b border-slate-900/60 bg-slate-950/40 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <h1 class="text-lg font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent tracking-wide">
                DIGITAL NETWORKS BUSINESS
            </h1>
            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                Client Access Portal
            </span>
        </div>
    </header>

    <!-- Main View -->
    <main class="flex-1 max-w-7xl w-full mx-auto p-6 flex items-center justify-center">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full py-4 text-center border-t border-slate-900/40 text-xs text-slate-500">
        &copy; {{ date('Y') }} Digital Networks Business. All rights reserved.
    </footer>
</body>
</html>
