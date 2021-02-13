<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        @auth
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up"
                    src="https://ui-avatars.com/api/?background=random&name={{ auth()->user()->name }}+{{ auth()->user()->lastname }}"
                    alt="#">
            </div>
            <h6 class="mt-3 f-14">{{ auth()->user()->full_name }}</h6>
            <p>{{ auth()->user()->role }}</p>
        </div>
        @endauth
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>

            @can('isAdmin')
            <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Administrator</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('getUsers') }}"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="{{ route('register') }}"><i class="fa fa-circle"></i>Create User</a></li>
                    <li><a href="{{ route('viewToken') }}"><i class="fa fa-circle"></i>Manage Token</a></li>
                </ul>
            </li>
            @endcan


            <li><a class="sidebar-header" href="{{ route('tokens.index') }}"><i data-feather="bar-chart"></i><span>Buy
                        Tokens</span></a></li>
            <li><a class="sidebar-header" href="{{ route('getUserTokens') }}"><i data-feather="bar-chart"></i><span>My
                        Tokens</span></a></li>


            <li><a class="sidebar-header" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout').submit()"><i
                        data-feather="log-in"></i><span>Logout</span></a>
                <form action="{{ route('logout') }}" method="POST" id="logout">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
