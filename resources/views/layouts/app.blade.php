<!DOCTYPE html>
<html>
<head>
    <title>My Project</title>
</head>
<body>

    @include('partials.navbar')
    @include('partials.sidebar')
    
    <div style="padding: 20px;">
        @yield('content')
    </div>

</body>
</html> 