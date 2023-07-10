
<aside class="main-sidebar usersidebarmain mainsidebarcollor sidebar-dark-primary elevation-4">


    <!-- Brand Logo -->
    {{-- <a href="{{ route('admin.dashbord.index') }}" class="brand-link bg-white" style="height: 57px;">
        <img src="{{ asset('admin/assets/img/avatar3.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
        <p>STUDENT PROTAL</p>
    </a> --}}
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('admin.dashbord.index') }}" class="nav-link {{ Request::routeIs('admin.dashbord.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>




                {{-- <li onclick="submanuclick();" class="submanuclass nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <i class='fas fa-sign-out-alt nav-icon'></i>

                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">

                            <p>Logout</p>
                    </a>
                    </form>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    function submanuclick() {



    }
</script>
