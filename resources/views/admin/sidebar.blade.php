<aside class="main-sidebar usersidebarmain mainsidebarcollor sidebar-dark-primary elevation-4">
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

                        <p class="protralarray"> <i class="fa fa-angle-right" aria-hidden="true"></i></p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.heroslider.index') }}" class="nav-link {{ Request::routeIs('admin.heroslider.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-chalkboard-user"></i>
                        <p>Hero Slider</p>

                        <p class="protralarray"><i class="fa fa-angle-right" aria-hidden="true"></i></p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogcategory.index') }}" class="nav-link {{ Request::routeIs('admin.blogcategory.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-newspaper"></i>
                        <p>Blog Catagory</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link {{ Request::routeIs('admin.blog.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-id-card"></i>
                        <p>Blog</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::routeIs('admin.category.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-users"></i>

                        <p>Product Category</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::routeIs('admin.product.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-cart-shopping"></i>
                        <p>Product Uplode</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('admin.brand.index') }}" class="nav-link {{ Request::routeIs('admin.brand.index') ? 'active' : '' }}">
                        {{-- <i class="nav-icon fa-solid fa-microchip"></i> --}}
                        <i class="nav-icon fa-solid fa-crown"></i>
                        <p>Brand</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.blog.comment') }}" class="nav-link {{ Request::routeIs('admin.blog.comment') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-comment"></i>
                        <p>Blog Comments</p>

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>
                <li onclick="submanuclick();" class="submanuclass nav-item">
                    <a href="{{ route('admin.setting.indexwithedit') }}" class="nav-link {{ Request::routeIs('admin.setting.indexwithedit') ? 'active' : '' }}" >
                        <i class="far fa-solid fa-sliders nav-icon"></i>
                        <p>Settings</p>
                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>
                <li onclick="submanuclick();" class="submanuclass nav-item">
                    <a href="{{ route('admin.manu.list') }}" class="nav-link {{ Request::routeIs('admin.manu.list') ? 'active' : '' }}" >
                        <i class="far fa-solid fa-bars nav-icon"></i>

                        <p>Manu</p>
                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li onclick="submanuclick();" class="submanuclass nav-item">
                    <a href="{{ route('admin.editor.index') }}" class="nav-link {{ Request::routeIs('admin.editor.index') ? 'active' : '' }}" >
                        <i class="far fa-solid fa-user nav-icon"></i>

                        <p>Users</p>
                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>




                {{-- <li onclick="submanuclick();" class="submanuclass nav-item">


                    <form method="POST" action="{{ route('admin.logout') }}" class="nav-link">
                        @csrf
                        <i class='fas fa-sign-out-alt nav-icon'></i>

                        <a href="route('admin.logout')"
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
