@extends('admin.layouts2.adminapp')


@section('content')
    <div class="content-wrapper">
        <div class=" ml-1 row">

            <div class="parent col-md-4">
                <div class="child">
                    <h1 class="textfordeshbor">{{ $pordut }}</h1>
                    {{-- <i class="fa-solid fa-chalkboard-user fa-3x iconclassfordashbord"></i> --}}
                    <h4 class="h3 textfordeshbor">PRODUCTS</h4>
                    <a href="{{ route('admin.product.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>

            <div class="parent col-md-4">
                <div class="child">
                    {{-- <i class="fa-solid fa-book-open fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $blog }}</h1>
                    <h4 class="h3 textfordeshbor">BLOGS</h4>
                    <a href="{{ route('admin.blog.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>


            <div class="parent col-md-4">
                <div class="child">
                    {{-- <i class="fa-solid fa-inbox fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $blogcatagoty }}</h1>
                    <h4 class="h3 textfordeshbor">BLOG CATAGORY</h4>
                    <a href="{{ route('admin.blogcategory.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>

            <div class="parent col-md-4">
                <div class="child">
                    {{-- <i class="fa-solid fa-users-rectangle fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $brand }}</h1>
                    <h4 class="h3 textfordeshbor">BRAND</h4>
                    <a href="{{ route('admin.brand.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>
            <div class="parent col-md-4">
                <div class="child">
                    {{-- <i class="fa-solid fa-address-card fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $productcatagory }}</h1>
                    <h4 class="h3 textfordeshbor">PRODUCT CATAGORY</h4>
                    <a href="{{ route('admin.category.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>

            <div class="parent col-md-4">
                <div class="child">
                    {{-- <i class="fa-solid fa-address-card fa-3x iconclassfordashbord"></i> --}}
                    <h1 class="textfordeshbor">{{ $heroslider }}</h1>
                    <h4 class="h3 textfordeshbor">Hero Slider</h4>
                    <a href="{{ route('admin.heroslider.index') }}">
                        <span class="link"></span>
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection
