<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('img/default.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{ auth()->user()->username }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                @if (auth()->user()->role == "admin")
                <li class="nav-item @if(Request::segment(2) == "dashboard") active @endif">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item @if(Request::segment(2) == "users") active @endif">
                    <a href="{{ route('admin.users') }}">
                        <i class="fas fa-users"></i>
                        <p>Kelola User</p>
                    </a>
                </li>

                <li class="nav-item @if(Request::segment(2) == "penomoran") active @endif">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <p>Penomoran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.restart') }}">
                                    <span class="sub-item">Restart Penomoran</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.history') }}">
                                    <span class="sub-item">History Penomoran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item @if(Request::segment(2) == "bglogin") active @endif">
                    <a href="{{ route('admin.ubah.Bg.Login') }}">
                        <i class="fas fa-file-image"></i>
                        <p>Ubah Background Login</p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->role == "staff")
                <li class="nav-item @if(Request::segment(2) == "dashboard") active @endif">
                    <a href="{{ route('staff.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item @if(Request::segment(2) == "penomoran") active @endif">
                    <a href="{{ route('staff.penomoran') }}">
                        <i class="fas fa-envelope"></i>
                        <p>Penomoran</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
