<head>
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<aside class="sidebar">
    <!-- SIDEBAR TITLE -->
    <div class="sidebar-title">
        DASHBOARD
    </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('drivers.index') }}"
                    class="{{ request()->routeIs('drivers.index') ? 'active' : '' }}">
                        <i class="fa fa-table"></i>
                            Drivers
                </a>
            </li>
            <li>
                    <a href="{{ route('masters') }}"
                        class="{{ request()->routeIs('masters') ? 'active' : '' }}">

                            <i class="fa fa-id-card"></i>
                            Masters Record
                    </a>
            </li>
            <li>
                <a href="{{ route('toda') }}"
                    class="{{ request()->routeIs('toda') ? 'active' : '' }}">

                        <i class="fa fa-bus"></i>
                            TODA
                </a>
            </li>
            <li>
                <a href="{{ route('citations') }}"
                        class="{{ request()->routeIs('citations') ? 'active' : '' }}">

                        <i class="fa fa-warning"></i>
                            Citations
                </a>
            </li>

            <li>
            <a href="{{ route('reports') }}"
                        class="{{ request()->routeIs('reports') ? 'active' : '' }}">

                        <i class="fa-solid fa-chart-column"></i>
                            Reports
                </a>
            </li>
            <li>
                <a href="{{ route('system') }}"
                        class="{{ request()->routeIs('system') ? 'active' : '' }}">

                        <i class="fa-solid fa-gear"></i>
                            System
                </a>
            </li>

        </ul>
</aside>