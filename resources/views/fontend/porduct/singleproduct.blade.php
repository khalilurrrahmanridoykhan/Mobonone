@extends('fontend.mobozone.layouts.main')


@section('content')
    <main>

        <!-- product description area -->
        <article class="blog_description section_gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 mb-5">
                        <div class="blog_title text-center">
                            <h3>{{ $product->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog_description">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="single_pd_description box_bg signal ">
                                        <div class="netwark_bar item-box">
                                            <img src="{{ asset('fontend/mobozone/assets/pics') }}/signal.png"
                                                alt="">
                                        </div>
                                        <div class="item_desc">
                                            <h4 class="item_title">Network</h4>
                                            <p class="text-uppercase">{{ $product->technology }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="single_pd_description box_bg launch_date">
                                        <div class="netwark_bar item-box">
                                            <img src="{{ asset('fontend/mobozone/assets/pics') }}/calendar.png"
                                                alt="">
                                        </div>
                                        <div class="item_desc">
                                            <h4 class="item_title">Launch</h4>
                                            <p class="text-capitalize">{{ $product->announced }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="blog_box_2">
                                        <div class="single_box_content box_bg">
                                            <div class="launcher item-box-2">
                                                <img src="{{ asset('fontend/mobozone/assets/pics') }}/android.png"
                                                    alt="">
                                            </div>
                                            <div class="item_desc">
                                                <h4 class="item_title">Android</h4>
                                                <p class="text-capitalize">{{ $product->os }}</p>
                                            </div>
                                        </div>
                                        <div class="single_box_content box_bg mt-4">
                                            <div class="launcher item-box-2">
                                                <img src="{{ asset('fontend/mobozone/assets/pics') }}/sd-card.png"
                                                    alt="">
                                            </div>
                                            <div class="item_desc">
                                                <h4 class="item_title">Memory</h4>
                                                <p class="text-capitalize">{{ $product->internal }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="blog_box_3 box_bg">
                                        <div class="blog_main_image">
                                            @if (!empty($product->img))
                                                <img src="{{ asset('uploads/product/thumb/large/' . $product->img) }}"
                                                    class="card-img-top" alt="">
                                            @else
                                                <img src="{{ asset('no_image/prodoct_no_image.png') }}"
                                                    class="card-img-top" alt="">
                                            @endif
                                            <h4 class="text-center mt-4">{{ $product->name }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="blog_box_2">
                                        <div class="single_box_content box_bg">
                                            <div class="launcher item-box-2">
                                                <img src="{{ asset('fontend/mobozone/assets/pics') }}/camera.png"
                                                    alt="">
                                            </div>
                                            <div class="item_desc">
                                                <h4 class="item_title">Main Camera</h4>
                                                <p class="text-capitalize">{{ $product->tripple }}</p>
                                            </div>
                                        </div>
                                        <div class="single_box_content box_bg mt-4 mb-4">
                                            <div class="launcher item-box-2">
                                                <img src="{{ asset('fontend/mobozone/assets/pics') }}/selfie_camera.png"
                                                    alt="">
                                            </div>
                                            <div class="item_desc">
                                                <h4 class="item_title">Selfie Camera</h4>
                                                <p class="text-capitalize">{{ $product->single }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single_pd_description box_bg signal mb-4">
                                        <div class="netwark_bar item-box">
                                            <img src="{{ asset('fontend/mobozone/assets/pics') }}/display.png"
                                                alt="">
                                        </div>
                                        <div class="item_desc">
                                            <h4 class="item_title">Display</h4>
                                            <p class="text-uppercase">
                                                {{ $product->size }}
                                                <br>
                                                {{ $product->reslution }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_pd_description box_bg launch_date">
                                        <div class="netwark_bar item-box">
                                            <img src="{{ asset('fontend/mobozone/assets/pics') }}/battery.png"
                                                alt="">
                                        </div>
                                        <div class="item_desc">
                                            <h4 class="item_title">Battery</h4>
                                            <p class="text-capitalize">{{ $product->ballerytype }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pd description -->
                            <div class="row mt-5">
                                <div class="col-4">
                                    <div class="pd_details mb-4 text-uppercase fw-bold">
                                        <h4>All Information</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="6" scope="row">Network</th>
                                                <td class="ttl">Technology</td>
                                                <td class="nfo">{{ $product->technology }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">2G bands</td>
                                                <td class="nfo">{{ $product->twogbands }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">3G bands</td>
                                                <td class="nfo">{{ $product->threegbands }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">4G bands</td>
                                                <td class="nfo">{{ $product->fourgbands }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">5G bands</td>
                                                <td class="nfo">{{ $product->fivergbands }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Speed</td>
                                                <td class="nfo">{{ $product->speed }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="2" scope="row">Launch</th>
                                                <td class="ttl">Announced</td>
                                                <td class="nfo">{{ $product->announced }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Status</td>
                                                <td class="nfo">{{ $product->availablety }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="4" scope="row">Body</th>
                                                <td class="ttl">Dimensions</td>
                                                <td class="nfo">{{ $product->dimensions }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Weight</td>
                                                <td class="nfo">{{ $product->weight }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Build</td>
                                                <td class="nfo">{{ $product->build }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Sim</td>
                                                <td class="nfo">{{ $product->sim }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="3" scope="row">Display</th>
                                                <td class="ttl">Type</td>
                                                <td class="nfo">{{ $product->type }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Size</td>
                                                <td class="nfo">{{ $product->size }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Resulation</td>
                                                <td class="nfo">{{ $product->reslution }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="4" scope="row">Platform</th>
                                                <td class="ttl">Os</td>
                                                <td class="nfo">{{ $product->os }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Chipset</td>
                                                <td class="nfo">{{ $product->chipset }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">CPU</td>
                                                <td class="nfo">{{ $product->cpu }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">GPU</td>
                                                <td class="nfo">{{ $product->gpu }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="2" scope="row">Memory</th>
                                                <td class="ttl">Card Slot</td>
                                                <td class="nfo">{{ $product->cardslot }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Internal</td>
                                                <td class="nfo">{{ $product->internal }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="3" scope="row">Main Camera</th>
                                                <td class="ttl">Tripple</td>
                                                <td class="nfo">{{ $product->tripple }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Feature</td>
                                                <td class="nfo">{{ $product->feature }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Video</td>
                                                <td class="nfo">{{ $product->videomain }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="2" scope="row">Selfie camera</th>
                                                <td class="ttl">Single</td>
                                                <td class="nfo">{{ $product->single }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Video</td>
                                                <td class="nfo">{{ $product->videoselfie }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="2" scope="row">Sound</th>
                                                <td class="ttl">Loudspeaker</td>
                                                <td class="nfo">{{ $product->loudspeaker }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">3.5mm jack</td>
                                                <td class="nfo">{{ $product->mmjack }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="6" scope="row">Comms</th>
                                                <td class="ttl">WLAN</td>
                                                <td class="nfo">{{ $product->wlantab }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Bluetooth</td>
                                                <td class="nfo">{{ $product->bluetootht }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Positioning</td>
                                                <td class="nfo">{{ $product->positioning }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">NFC</td>
                                                <td class="nfo">{{ $product->nfc }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Radio</td>
                                                <td class="nfo">{{ $product->radio }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">USB</td>
                                                <td class="nfo">{{ $product->usb }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="1" scope="row">Features</th>
                                                <td class="ttl">Sensor</td>
                                                <td class="nfo">{{ $product->sensor }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="2" scope="row">Battery</th>
                                                <td class="ttl">Type</td>
                                                <td class="nfo">{{ $product->ballerytype }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Charging</td>
                                                <td class="nfo">{{ $product->charging }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered custom-table table-hover mb-2">
                                        <tbody>
                                            <tr class="spec_table">
                                                <th rowspan="4" scope="row">Misc</th>
                                                <td class="ttl">Color</td>
                                                <td class="nfo">{{ $product->color }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Model</td>
                                                <td class="nfo">{{ $product->model }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">SAR</td>
                                                <td class="nfo">{{ $product->sar }}</td>
                                            </tr>
                                            <tr class="spec_table">
                                                <td class="ttl">Price</td>
                                                <td class="nfo">{{ $product->price }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- pd description end -->
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- product description area end -->

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
                    <!-- single item -->
                    @if (!empty($getsameproduct))
                        @foreach ($getsameproduct as $getsameproducts)
                        <div class="single_product_item_box">
                            <div class="single_product_img">
                                <a href="">
                                    {{-- <img src="{{ asset('uploads/product/thumb/small/' . $product->img) }}" alt="product img"> --}}

                                    @if (!empty($getsameproducts->img))
                                        <img class="productsmallimg" src="{{ asset('uploads/product/thumb/small/' . $getsameproducts->img) }}"
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
                                <a class="product_name" href="{{ url('/product/detail/' . $getsameproducts->products_id) }}">{{ $getsameproducts->name }}</a>
                                <ul>
                                    <li>{{ $getsameproducts->price }}</li>
                                    <li class="del"><del>{{ $getsameproducts->sale_price }}</del></li>
                                </ul>
                                <span class="product_total_discount">Save {{ $getsameproducts->sale_price }}</span>
                            </div>
                        </div>
                        @endforeach
                    @endif



                    <!-- single item -->
                </div>
            </div>
        </div>
        <!-- featured product end -->

    </main>
@endsection
