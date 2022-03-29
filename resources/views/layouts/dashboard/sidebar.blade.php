<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        <img src="{{asset($sitelogo)}}" alt="AdminLTE Logo" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $siteTitle }}</span>
    </a>
@php
    $user = Auth::user();
@endphp
<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty($user->image))
                    <img src="{{asset($user->image)}}" class="elevation-2" alt="User Image">
                @else
                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="elevation-2"
                         alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$user->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('index')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if($user->role == 0)
                <li class="nav-item">
                    <a href="{{route ('department.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            Departments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sales.report')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            Daily Sales Forecast
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sales.weeklyreport')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            Weakly Sales Forecast
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('sales.monthlyreport')}}" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            Monthly Sales Forecast
                        </p>
                    </a>
                </li>
                <li class="nav-header">Setting</li>
                <li class="nav-item">
                    <a href="{{route('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Update Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('change.password')}}" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('apperance')}}" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Apperance
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                       class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
