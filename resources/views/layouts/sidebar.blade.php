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
                <a href="{{ action('SinhVienController@index') }}"> <i class="fa fa-user"></i> <span>Sinh Viên</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'lops' ? 'active' : null }} treeview">
                <a href="{{ action('LopController@index') }}"> <i class="fa fa-users"></i> <span>Lớp</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'khoas' ? 'active' : null }} treeview">
                <a href="{{ action('KhoaController@index') }}"> <i class="fa fa-building"></i> <span>Khoa</span> </a>
            </li>
            <li class="{{ Request::segment(2) === 'ngoaitrus' ? 'active' : null }} treeview">
                <a href="{{ action('NgoaiTruController@index') }}"> <i class="fa fa-map-marker"></i> <span>Ngoại trú</span> </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>