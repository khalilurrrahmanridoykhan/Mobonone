@extends('fontend.mobozone.layouts.main')



@section('content')
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
                                                <img class="productsmallimg" src="{{ asset('uploads/product/thumb/small/' . $products->img) }}"
                                                    class="card-img-top" alt="">
                                            @else
                                                <img class="productsmallimg" src="{{ asset('no_image/prodoct_no_image.png') }}" class="card-img-top"
                                                    alt="">
                                            @endif
                                        </a>
                                        {{-- <div class="discount_product">
                                            <span>50% off</span>
                                        </div> --}}
                                    </div>
                                    <div class="single_product_meta">
                                        <a class="product_name" href="{{ url('/product/detail/' . $products->products_id) }}">{{ $products->name }}</a>
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
@endsection
