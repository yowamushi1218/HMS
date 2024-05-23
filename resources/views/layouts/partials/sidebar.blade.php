@if(Session::has('user_fname'))
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
                @if(Session::has('user_fname') && Session::get('user')->user_role == 1)
                <ul class="nav navbar-nav">
                    <h4 class="menu-title mt-3">Dashboard</h4>
                        <li class="active">
                            <a href="{{ route('admin.home') }}"> <i class="menu-icon fa fa-home"></i>Home </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-bar-chart"></i>Dashboard </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('admin.messages') }}"> <i class="menu-icon fa fa-envelope"></i>Message </a>
                        </li>
                        <li class="menu-item-has-children dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Appointments</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-circle-o"></i><a href="{{ route('schedules') }}">Schedules</a></li>
                                <li><i class="fa fa-circle-o"></i><a href="{{ route('manage_schedules') }}">Manage Schedules</a></li>
                                <li><i class="fa fa-circle-o"></i><a href="#">Appointment History</a></li>
                            </ul>
                        </li>
                    <h4 class="menu-title">Records</h4>
                    <li class="active">
                        <a href="{{ route('clients') }}"> <i class="menu-icon fa fa-user-md"></i>Manage Clients</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('users') }}"> <i class="menu-icon fa fa-users"></i>Manage User</a>
                    </li>
                </ul>
                @else
                    <ul class="nav navbar-nav">
                        <h4 class="menu-title mt-3">Medical Track</h4>
                        <li class="active">
                            <a href="{{ route('admin.home') }}"> <i class="menu-icon fa fa-home"></i> Home</a>
                        </li>
                        <li class="active">
                            <a href="#"> <i class="menu-icon fa fa-calendar"></i> Book Schedules</a>
                        </li>
                        <br>
                        <h4 class="menu-title mt-3">Fill - out forms</h4>
                        <li class="active">
                            <a href="{{ route('users.dashboard') }}"><i class="menu-icon fa fa-file"></i> Client Form</a>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    </aside>
@endif
