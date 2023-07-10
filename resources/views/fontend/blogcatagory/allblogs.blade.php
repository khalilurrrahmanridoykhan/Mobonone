@extends('fontend.mobozone.layouts.main')



@section('content')
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
@endsection
