<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon.ico')}}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="{{ mix('js/vue.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/scheduler.css') }}">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={!! json_encode(config('app.google_analytics_token')) !!}"></script>
        <script data-popper-placement="{{config('app.analytics_token')}}">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{!! json_encode(config('app.google_analytics_token')) !!}');
        </script>
        @livewireStyles

    </head>
    <body class="font-sans antialiased ">
        <!-- Banners -->
        <x-jet-banner></x-jet-banner>
        <div class="min-h-screen bg-gray-100 dark:bg-black">
            <x-banners.version></x-banners.version>
        @livewire('navigation.navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-700 dark:text-gray-200">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
                <main>
                    <div id="app">
                        {{ $slot }}
                    </div>
                    <div id="loader"></div>
                </main>
        </div>
        <x-footer.footer/>
        @stack('modals')
        @livewireScripts
        @livewire('livewire-ui-spotlight')
    </body>
</html>
