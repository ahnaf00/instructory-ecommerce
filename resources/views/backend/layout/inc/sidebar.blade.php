<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{route('admin.dashboard')}}" target="_blank">
            {{-- <img src="{{ asset('assets/backend') }}/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
            <span class="ms-1 font-weight-bold">Argon Dashboard 2 PRO</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">

                <div class="collapse show" id="dashboardsExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item active">
                            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                                <span class="sidenav-normal"><h5>Dashboard</h5></span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="{{ route('category.index') }}">
                                <span class="sidenav-normal">All Categories </span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('product.index') }}">
                                <span class="sidenav-normal"> Products </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/automotive.html">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Automotive </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/smart-home.html">
                                <span class="sidenav-mini-icon"> S </span>
                                <span class="sidenav-normal"> Smart Home </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
                                <span class="sidenav-mini-icon"> V </span>
                                <span class="sidenav-normal"> Virtual Reality <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="vrExamples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../pages/dashboards/vr/vr-default.html">
                                            <span class="sidenav-mini-icon text-xs"> V </span>
                                            <span class="sidenav-normal"> VR Default </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../../pages/dashboards/vr/vr-info.html">
                                            <span class="sidenav-mini-icon text-xs"> V </span>
                                            <span class="sidenav-normal"> VR Info </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="../../pages/dashboards/crm.html">
                                <span class="sidenav-mini-icon"> C </span>
                                <span class="sidenav-normal"> CRM </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>
