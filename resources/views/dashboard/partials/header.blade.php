<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
                <a class="font-w700 mr-5" href="#"> <img src="{{ asset('media/favicons/favicon-32x31.png') }}" alt="">
                    <span class="font-size-xl text-dual-primary-dark">{{ config('app.name') }}</span> </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Middle Section -->
        <div class="content-header-section">
            <!-- Header Navigation -->
            <!--Desktop Navigation, mobile navigation can be found in #sidebar-->
            <ul class="nav-main-header">
                <li>
                    <a href="{{ wordpress_url('/') }}" class="text-uppercase"><i class=""></i>Home</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/about') }}" class="text-uppercase"><i class=""></i>About</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/services') }}" class="text-uppercase"><i class=""></i>Services</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/domain-creation') }}" class="text-uppercase"><i class=""></i>Hosting</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/contact') }}" class="text-uppercase"><i class=""></i>Contact</a>
                </li>
            </ul>
            <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i> <span class="d-none d-sm-inline-block">
                        {{ Auth::user()->get_name() }}
                    </span> <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                    <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                    <a class="dropdown-item" href="{{ url('/') }}"> <i class="si si-compass mr-5"></i> Dashboard </a>
                    <a class="dropdown-item" href="{{ url('/domaincart') }}"> <i class="si si-basket mr-5"></i> Shop </a>
                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="si si-user mr-5"></i> Profile
                    </a>
                    <!-- END Side Overlay -->
                    <div class="dropdown-divider"></div>
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="si si-logout mr-5"></i> Sign Out</button>
                    </form>
                </div>
            </div>
            <!-- END User Dropdown -->

            @include('dashboard.partials.notifications')
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header><!-- END Header -->
