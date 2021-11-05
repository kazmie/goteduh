    <div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <a class="nav-link" href="{{route('admin-dashboard')}}">
                        Dashboard
                    </a>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1">Insurance Product</a>
                        <div id="submenu-1" class="submenu collapse" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance.sales')}}">Sales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-product')}}">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-company')}}">Company</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2">Claims</a>
                        <div id="submenu-2" class="submenu collapse" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.claim')}}">All</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#">Positions</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    {{-- <a class="nav-link" href="{{route('admin.report')}}">
                        Reports
                    </a> --}}
                    <li class="nav-divider">
                        Settings
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-5" aria-controls="submenu-5">System Parameters</a>
                        <div id="submenu-5" class="submenu collapse" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-benefit')}}">Benefits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-claimType')}}">Claim Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-category')}}">Category Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-plan')}}">Travel Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin-insurance-region')}}">Regions</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <a class="nav-link" href="">System User</a>
                </ul>
            </div>
        </nav>
    </div>
</div>
