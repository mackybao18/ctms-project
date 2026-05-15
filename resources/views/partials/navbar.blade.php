<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg custom-navbar fixed-top shadow-sm">
        <div class="container-fluid px-5">
            <!-- LOGO -->
            <a class="navbar-brand d-flex align-items-center gap-3" href="#">
                <img src="{{ asset('build/assets/images/ctms-logo.jpg') }}" class="logo">
                    <div class="brand-text d-none d-sm-block">
                        <h5 class="mb-0 fw-bold text-white">CTMS</h5>
                        <small class="text-light opacity-75">City Traffic Management System</small>
                    </div>
            </a>
                <!-- TOGGLER -->
                <button class="navbar-toggler"
                        type="button"
                        data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <!-- NAV LINKS -->
                    <div class="navbar" id="mainNavbar">

                        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                            <li class="nav-item"><a class="nav-link active-link" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Announcements</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>

                            <li class="nav-item ms-lg-3">
                                <a href="#" class="btn login-btn px-4">Login</a>
                            </li>

                        </ul>
                    </div>
        </div>
    </nav>
</body>