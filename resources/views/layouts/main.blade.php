@include('includes.header')
    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->
        @include('includes.topnav')
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            @include('includes.sidenav')
            <!-- Page Sidebar Ends-->

            <!-- Right sidebar Start-->
            {{-- @include('includes.rightnav') --}}
            <!-- Right sidebar Ends-->

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>@yield('pagename')
                                        <small>@yield('pagedesc')</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('pagename')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>




    <!-- footer start-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 footer-copyright">
                    <p class="mb-0">Copyright 2019 © Bigdeal All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end-->
    </div>

    </div>

    @include('includes.footer')
