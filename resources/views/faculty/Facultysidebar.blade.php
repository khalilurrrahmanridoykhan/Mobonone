<aside class="main-sidebar usersidebarmain mainsidebarcollor sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ url('/editor') }}" class="nav-link {{ Request::routeIs('faculty.dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>

                        <p class="protralarray"> <i class="fa fa-angle-right" aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('editor.category.index') }}" class="nav-link {{ Request::routeIs('editor.category.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Product Catagory</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('editor.brand.index') }}" class="nav-link {{ Request::routeIs('editor.brand.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Product Brand</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('editor.product.index') }}" class="nav-link {{ Request::routeIs('editor.product.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Product</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('editor.blogcategory.index') }}" class="nav-link {{ Request::routeIs('editor.blogcategory.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Blog Catagory</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

                        <p class="protralarray"><i class="fa fa-angle-right " aria-hidden="true"></i></p>

                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('editor.blog.index') }}" class="nav-link {{ Request::routeIs('editor.blog.index') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Blog</p>
                        {{-- <i class="fas fa-arrow-right  protralarray  "></i> --}}

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
