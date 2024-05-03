<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand hidden mr-1" href="{{ route('schedules') }}"><img src="{{ asset('assets/dashboard/images/meditrack-trans.svg') }}" alt="Logo"></a>
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/dashboard/images/meditrack-white.svg') }}" alt="Logo" width="150"></a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h4 class="menu-title mt-3">Dashboard</h4>
                    {{-- <li class="active">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-bar-chart"></i>Dashboard </a>
                    </li> --}}
                    <li class="active">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-home"></i>Home </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('schedules') }}"> <i class="menu-icon fa fa-calendar"></i>Appointments </a>
                    </li>
                    {{-- <li class="#">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>Home </a>
                    </li> --}}
                <h4 class="menu-title">Records</h4>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Clients</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-md"></i><a href="{{ route('clients') }}">Clients Records</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="{{ route('users') }}">Users Records</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </nav>
</aside>
