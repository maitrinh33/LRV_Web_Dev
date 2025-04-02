<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/src/image/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/image/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/image/logo/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Courgette&family=Lavishly+Yours&family=Quicksand:wght@300..700&family=Satisfy&family=Scope+One&family=Yrsa:ital,wght@1,300&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 

    <meta name="description" content="Tu Bao Makeup Academy with over 10 years of experience in makeup and training students, providing significant value to the community.">
    <meta property="og:title" content="Tu Bao Makeup Academy">
    <meta property="og:description" content="Tu Bao Makeup Academy with over 10 years of experience in makeup and training students, providing significant value to the community.">
    <meta property="og:image" content="/src/image/logo/tubaologo.png">
    <meta property="og:url" content="http://www.tubaomakeup.com">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LEDDYFYFQB"></script>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-custom">
    <header>
        @include('partials.header') 
    </header>

    <main class="mt-24">
        @yield('content', $slot ?? '')
        @stack('modals')
        <x-contact-modal />
    </main>

    <footer>
        @include('partials.footer')
    </footer>

    @livewireScripts
    @stack('scripts')
</body>
</html>