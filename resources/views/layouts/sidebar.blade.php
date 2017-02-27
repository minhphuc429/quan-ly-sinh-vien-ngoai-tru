<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::guest())
                    <img src="{{ asset('images/kyra.png') }}" class="img-rounded" alt="User Image">
                @else
                    <img src="http://cbgv.donga.edu.vn/QLSV/ANHSV/{{ Auth::user()->username }}.jpg" class="img-rounded" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <p>Bạn chưa đăng nhập</p>
                @else
                    <p>{{ Auth::user()->name }}</p>
                @endif
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
            <li class="header">Thông báo</li>
            <li class="{{ Request::segment(2) === 'thongbaos' ? 'active' : null }} treeview ripple">
                <a href="#"> <i class="fa fa-flag-o"></i> <span>Thông tin thông báo</span> </a>
            </li>
            <li class="header">Sinh Viên</li>
            <li class="{{ Request::segment(2) === 'thongtins' ? 'active' : null }} treeview ripple">
                <a href="#"> <i class="fa fa-user-md"></i> <span>Thông tin cá nhân</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'ngoaitrus' ? 'active' : null }} treeview ripple">
                <a href="#"> <i class="fa fa-map-marker"></i> <span>Thông tin ngoại trú</span> </a>
            </li>
        </ul>

        {{--@if(Entrust::hasRole('admin'))--}}

            <ul class="sidebar-menu">
                <li class="header">Quản Lý Sinh Viên</li>
                <li class="{{ Request::segment(1) === 'home' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('HomeController@index') }}"> <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span> </a>
                </li>
                <li class="{{ Request::segment(2) === 'sinhviens' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('SinhVienController@index') }}"> <i class="fa fa-user"></i>
                        <span>Sinh Viên</span> </a>
                </li>
                <li class="{{ Request::segment(2) === 'lops' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('LopController@index') }}"> <i class="fa fa-users"></i> <span>Lớp</span> </a>
                </li>
                <li class="{{ Request::segment(2) === 'khoas' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('KhoaController@index') }}"> <i class="fa fa-building"></i> <span>Khoa</span>
                    </a>
                </li>
                <li class="{{ Request::segment(2) === 'ngoaitrus' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('NgoaiTruController@index') }}"> <i class="fa fa-map-marker"></i>
                        <span>Ngoại trú</span> </a>
                </li>
            </ul>

            <ul class="sidebar-menu">
                <li class="header">User Manager</li>
                <li class="{{ Request::segment(2) === 'roles' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('RoleController@index') }}"> <i class="fa fa-street-view"></i> <span>Role</span>
                    </a>
                </li>
                <li class="{{ Request::segment(2) === 'permissions' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('PermissionController@index') }}"> <i class="fa fa-sitemap"></i>
                        <span>Permission</span> </a>
                </li>
                <li class="{{ Request::segment(2) === 'users' ? 'active' : null }} treeview ripple">
                    <a href="{{ action('UserController@index') }}"> <i class="fa fa-cubes"></i> <span>User</span> </a>
                </li>
            </ul>

        {{--@endif--}}


    </section>
    <!-- /.sidebar -->
</aside>