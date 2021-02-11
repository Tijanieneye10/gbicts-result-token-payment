<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-left">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded"
                    src="{{ asset('assets/images/dashboard/logo.png') }}" alt="" height="66px" width="20px"></a></div>
    </div>
    <div class="main-header-right row">
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch">
                    <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <form class="form-inline search-form">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search.."><span
                                class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                        </div>
                    </form>
                </li>

                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>

                {{-- <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span
                            class="dot"></span></a></li> --}}
                <li class="onhover-dropdown">
                    @auth
                    <div class="media align-items-center"><img
                            class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded"
                            src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->name }}+{{ auth()->user()->lastname }}"
                            alt="user image">
                    </div>
                    @endauth
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">

                        <li><a href="{{ route('changePassword') }}">Change Password<span class="pull-right"><i class="fa fa-lock"></i></span></a>
                        </li>
                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Logout<span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        <form action="{{ route('logout') }}" method="POST" id="logout">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
<!-- Page Header Ends -->
