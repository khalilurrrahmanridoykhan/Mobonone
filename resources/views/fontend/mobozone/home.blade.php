@extends('fontend.mobozone.layouts.main')

<!-- main content -->
@section('content')
    <main>
        <!-- hero slider -->
        <div class="mobozone_hero_slider">
            <div class="container">
                <div class="slider owl-carousel">
                    @if (!empty($heroslider))
                        @foreach ($heroslider as $herosliders)
                            <div class="mobozone_single_slider slider_background"
                                style="background-image: url('{{ asset('uploads/herosliders/background/large/' . $herosliders->bg_img) }}');">
                                <div class="mobozone_single_slider_content">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mobozone_slider_text">
                                                <p>{{ $herosliders->titile_top }}</p>
                                                <h2>{{ $herosliders->titile_main }}</h2>
                                                <span class="offer">{{ $herosliders->titile_buttom }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mobozone_slider_image">
                                                <img src="{{ asset('uploads/herosliders/fontground/large/' . $herosliders->font_img) }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <!-- hero slider end -->

        <!-- featured category -->
        <div class="mobozone_featured_category section_gap ">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="section_area text-center">
                            <h2 class="section_title">Featured Category</h2>
                            <p class="sub_title">Choose your product from Category</p>
                        </div>
                    </div>
                </div>
                <!-- section title end -->
                <div class="row">

                    @if (!empty($catagory))
                        @foreach ($catagory as $catagorys)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="single_cat_section">
                                    <a href="{{ url('/catagorys/detail/' . $catagorys->id) }}" class="cat_link">
                                        {{-- <img src="{{ asset('fontend/mobozone') }}/assets/img/phone.png" alt=""> --}}
                                        @if (!empty($catagorys->picture))
                                            <img src="{{ asset('uploads/category/thumb/small/' . $catagorys->picture) }}"
                                                class="card-img-top" alt="">
                                        @else
                                            <img src="{{ asset('no_image/no_image_blog.png') }}" class="card-img-top"
                                                alt="">
                                        @endif
                                        <span class="cat_name">{{ $catagorys->category_name }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
        <!-- featured category end -->
        <!-- featured product -->
        <div class="mobozone_featured_product section_gap section_gap_bottom_decrease_20">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="section_area text-center">
                            <h2 class="section_title">Featured Product</h2>
                            <p class="sub_title">Choose your product from Product</p>
                        </div>
                    </div>
                </div>
                <!-- end section area -->
                <div class="row grid_container">


                    @if (!empty($product))
                        @foreach ($product as $products)
                            <!-- single item -->
                            <div class="single_product_item_box">
                                <div class="single_product_img">
                                    <a href="">
                                        {{-- <img src="{{ asset('uploads/product/thumb/small/' . $product->img) }}" alt="product img"> --}}

                                        @if (!empty($products->img))
                                            <img class="productsmallimg"
                                                src="{{ asset('uploads/product/thumb/small/' . $products->img) }}"
                                                class="card-img-top" alt="">
                                        @else
                                            <img class="productsmallimg" src="{{ asset('no_image/no_image_blog.png') }}"
                                                class="card-img-top" alt="">
                                        @endif
                                    </a>
                                    {{-- <div class="discount_product">
                                        <span>50% off</span>
                                    </div> --}}
                                </div>
                                <div class="single_product_meta">
                                    <a class="product_name"
                                        href="{{ url('/product/detail/' . $products->products_id) }}">{{ $products->name }}</a>
                                    <ul>
                                        <li>{{ $products->price }}</li>
                                        <li class="del"><del>{{ $products->sale_price }}</del></li>
                                    </ul>
                                    <span class="product_total_discount">Save {{ $products->sale_price }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
        <!-- featured product end -->

        <!-- blog post -->
        <div class="mobozone_blog_post section_gap section section_gap_decrease">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="section_area text-center">
                            <h2 class="section_title">Our Blog</h2>
                            <p class="sub_title">Choose your content from blog</p>
                        </div>
                    </div>
                </div>


                <!-- section title end -->
                <div class="row">


                    @if (!empty($blog))
                        @foreach ($blog as $blogs)
                            <div class="col-md-4 col-sm-6 mb-5">
                                <div class="single_blog_box">
                                    <a href="">

                                        @if (!empty($blogs->img))
                                            <img src="{{ asset('uploads/blogs/thumb/small/' . $blogs->img) }}"
                                                class="card-img-top" alt="">
                                        @else
                                            <img src="{{ asset('no_image/no_image_blog.png') }}" class="card-img-top"
                                                alt="">
                                        @endif
                                    </a>
                                    <div class="single_blog_meta">
                                        <span class="blog_date">{{ date('d m Y', strtotime($blogs->created_at)) }}</span>
                                        <a href="#">
                                            <h4>{{ $blogs->name }}</h4>
                                        </a>
                                        <p class="blog_excerpt">{{ $blogs->short_desc }}</p>

                                        <a class="blog_readmore_btn" href="{{ url('/blog/detail/' . $blogs->blogs_id) }}"
                                            class="btn btn-primary mt-4">Read More <i
                                                class="bi bi-arrow-right-short"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        <!-- blog post end -->
    </main>
@endsection
