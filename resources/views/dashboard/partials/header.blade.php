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
                    <a href="{{ url('/') }}"><i class="si si-compass"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/') }}"><i class=""></i>Home</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/about') }}"><i class=""></i>About</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/services') }}"><i class=""></i>Services</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/domain-creation') }}"><i class=""></i>Hosting</a>
                </li>
                <li>
                    <a href="{{ wordpress_url('/contact') }}"><i class=""></i>Contact</a>
                </li>
                <li>
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-out"></i>Log Out</button>
                    </form>
                </li>
            </ul>
            <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->

        <!-- Right Section -->
        <div class="content-header-section">

        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->

    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header><!-- END Header -->
