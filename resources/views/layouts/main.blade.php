<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CTMS')</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <!-- Page Specific CSS -->
    @stack('styles')
    <!-- Vite -->
   @vite([
    'resources/css/app-client.css',
    'resources/css/navbar.css',
    'resources/js/app-client.js'
])
</head>
    <body>
        <!-- NAVBAR -->
        @include('partials.navbar')
        <!-- SIDEBAR -->
        @include('partials.sidebar')
        <!-- PAGE CONTENT -->
        <main>
            <div class="page-wrapper">
                @yield('content')
    </div>
               
        </main>

        {{-- <!-- FOOTER -->
        @include('partials.footer') --}}

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>