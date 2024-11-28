<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/src/image/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/image/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/image/logo/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Courgette&family=Lavishly+Yours&family=Quicksand:wght@300..700&family=Satisfy&family=Scope+One&family=Yrsa:ital,wght@1,300&display=swap" rel="stylesheet">
    <!-- Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 
    <!-- Styles / Scripts -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
    <script type="module" src="/src/scripts/smoothscroll.js"></script>
    <script type="module" src="/src/scripts/course.js"></script>
    <title>Tu Bao Makeup Course</title>
    <meta name="description" content="Tu Bao Makeup Academy with over 10 years of experience in makeup and training students, providing significant value to the community.">
    <meta property="og:title" content="Tu Bao Makeup Academy">
    <meta property="og:description" content="Tu Bao Makeup Academy with over 10 years of experience in makeup and training students, providing significant value to the community.">
    <meta property="og:image" content="/src/image/logo/tubaologo.png">
    <meta property="og:url" content="http://www.tubaomakeup.com">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LEDDYFYFQB"></script>
</head>
<body class="quicksand-regular">
  <header>
      @include('partials.header')
  </header>

  <main class = "bg-custom">
      @yield('content') <!-- This will render content from your views -->
  </main>

  <footer>
      @include('partials.footer')
  </footer>
</body>
</html>