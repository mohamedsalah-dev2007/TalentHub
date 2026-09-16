<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- أضفنا هنا flex flex-col justify-between عشان نقفل الشاشة وننزل الفوتر تحت -->
        <div class="min-h-screen bg-gray-100 flex flex-col justify-between">
            <div>
                <!-- Page Heading / Header Slot -->
                @isset($header)
                    <div class="sticky top-0 z-50">
                        {{ $header }}
                    </div>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            <!-- استدعاء الفوتر هنا عشان يظهر في جميع الصفحات -->
            @include('layouts.footer')
        </div>
    </body>
</html>