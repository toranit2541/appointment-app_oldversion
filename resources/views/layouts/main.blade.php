<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Add other CSS files as needed -->
</head>
<body>

    <header>
        <!-- Navbar from your template, or custom navigation -->
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Footer from your template -->
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Add other JS files as needed -->
</body>
</html>
