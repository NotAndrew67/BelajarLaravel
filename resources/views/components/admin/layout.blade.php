<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased">

    <div class="antialiased min-h-screen">

        <!-- Navbar Atas -->
        <x-admin.navbar />

        <!-- Sidebar Samping -->
        <x-admin.sidebar />

        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="mx-auto max-w-7xl">
                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
