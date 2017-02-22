<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/user-01.png') }}" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Nguyễn Minh Phúc</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Quản Lý Sinh Viên</li>
            <li class="{{ Request::segment(1) === 'home' ? 'active' : null }} treeview">
                <a href="{{ action('HomeController@index') }}"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'sinhviens' ? 'active' : null }} treeview">
                <a href="{{ url('admin/sinhviens') }}"> <i class="fa fa-user"></i> <span>Sinh Viên</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'lops' ? 'active' : null }} treeview">
                <a href="{{ url('admin/lops') }}"> <i class="fa fa-users"></i> <span>Lớp</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'khoas' ? 'active' : null }} treeview">
                <a href="{{ url('admin/khoas') }}"> <i class="fa fa-building"></i> <span>Khoa</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'ngoaitrus' ? 'active' : null }} treeview">
                <a href="{{ url('admin/ngoaitrus') }}"> <i class="fa fa-map-marker"></i> <span>Ngoại trú</span> </a>
            </li>
        </ul>

        <ul class="sidebar-menu">
            <li class="header">User Manager</li>
            <li class="{{ Request::segment(2) === 'roles' ? 'active' : null }} treeview">
                <a href="#"> <i class="fa fa-dashboard"></i> <span>Role</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'permissions' ? 'active' : null }} treeview">
                <a href="#"> <i class="fa fa-dashboard"></i> <span>Permission</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'users' ? 'active' : null }} treeview">
                <a href="#"> <i class="fa fa-dashboard"></i> <span>User</span> </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>