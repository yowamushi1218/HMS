@if(Session::has('user_fname'))
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-info">
                            @if(session('user_images'))
                                <img src="{{ asset('assets/images/' . session('user_images')) }}" class="user-avatar rounded-circle w-20 h-20 ml-auto" alt="User Image">
                            @else
                                <img src="{{ asset('assets/images/default.png') }}" class="user-avatar rounded-circle w-20 h-20 ml-auto" alt="User Image">
                            @endif
                            <span class="user-name mr-2">{{ session('user_fname') }}</span>
                            <i class="fa fa-angle-down" style="color: white"></i>
                        </div>
                    </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ route('profile') }}"><i class="fa fa-user">&nbsp;</i> My Profile</a>
                        {{-- <a class="nav-link" href="#"><i class="fa fa-cog">&nbsp;</i> Settings</a> --}}
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off">&nbsp;</i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif

<div id="logoutModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please Confirm!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout this user?<p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger"><span class="fa fa-power-off"></span> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

