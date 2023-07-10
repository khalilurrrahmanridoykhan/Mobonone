@extends('fontend.mobozone.layouts.main')

@section('content')


    <main>

        @if (!empty($blog))
            @foreach ($blog as $blogs)
                <section class="site_breadcrumb position-relative breadcrumb_bg">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-8">
                                <h2 class="page_title">{{ $blogs->name }}</h2>
                            </div>
                        </div>
                    </div>
                </section>




                <div class="post_single_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md 8">
                                <div class="container py-2">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="image-red-background">
                                                @if (!empty($blogs->img))
                                                    <img src="{{ asset('uploads/blogs/thumb/large/' . $blogs->img) }}"
                                                        class="card-img-top" alt="">
                                                @else
                                                    <img src="{{ asset('ridoy/ridoy.jpg') }}" class="card-img-top"
                                                        alt="">
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-12 align-items-center d-flex">
                                            <div class="about-block">
                                                <h1 class="title-color mb-2">{{ $blogs->name }}</h1>
                                                <div class="mb-2">
                                                    <small>{{ date('d/m/y', strtotime($blogs->created_at)) }}</small>
                                                </div>
                                                <h5 class="title-color mb-3">{{ $blogs->short_desc }}</h5>
                                                <p>{!! $blogs->description !!}</p>
                                            </div>
                                        </div>
                                        <div class="comment_count">
                                            <h3>
                                                {{-- @dd($blogcommentcoount) --}}
                                                @if (!empty($blogcommentcoount))
                                                    {{ $blogcommentcoount }}
                                                @else
                                                    0
                                                @endif Comments.
                                            </h3>
                                        </div>
                                        <div class="comment-box mb-4">
                                            <h5>Comment Here</h5>
                                            <br>
                                            <form action="" id="commentFrom" name="commentFrom">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="blogs_id"
                                                        id="blogs_id" aria-describedby="helpId" placeholder=""
                                                        value="{{ $blogs->blogs_id }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Your Name</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="" aria-describedby="helpId">
                                                    <p class="text-danger error name-error invalid-feedback"></p>

                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea placeholder="Enter your comment here..." name="comment" id="comment" cols="30" rows="5"
                                                                class="form-control"></textarea>
                                                            <p class="text-danger error comment-error invalid-feedback"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <hr>
                                        <h5>Comments</h5>


                                        {{-- @dd($blogcomment) --}}

                                        @if (!empty($blogcomment))
                                            @foreach ($blogcomment as $blogcomments)
                                                <div class="card mb-2">
                                                    <div class="card-body commentor-area">
                                                        <div class="h5 commentname">{{ $blogcomments->name }}</div>
                                                        {{-- <a class="commentname" href="">{{ $blogcomments->name }}</a> --}}
                                                        <span class="comment_time d-block">
                                                            {{ date('d/m/Y', strtotime($blogcomments->created_at)) }}</span>

                                                        <div class="comment-text">{{ $blogcomments->comment }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar right_sidebar">
                                    <!-- search widget -->
                                    <div id="search_widget" class="widget widget_search">
                                        <h4 class="widget-title">Search anything</h4>
                                        <form role="search" method="get" class="searchform" action="#">
                                            <input type="text" class="text" placeholder="Search anything..."
                                                name="s">
                                        </form>
                                    </div>
                                    <!-- search widget -->
                                    <!-- recent post -->
                                    <div id="recent_post" class="widget widget_recent_post">
                                        <h4 class="widget-title">Recent Post</h4>
                                        <ul>

                                            @if (!empty($resentblog))
                                                @foreach ($resentblog as $resentblogs)
                                                    <li>
                                                        <a href="{{ url('/blog/detail/' . $resentblogs->blogs_id) }}"
                                                            alt="post-img">
                                                            @if (!empty($resentblogs->img))
                                                                <img width="100px" height="100px"
                                                                    src="{{ asset('uploads/blogs/thumb/small/' . $resentblogs->img) }}"
                                                                    class="card-img-top" alt="">
                                                            @else
                                                                <img width="100px" height="100px"
                                                                    src="{{ asset('no_image/no_image_blog.png') }}"
                                                                    class="card-img-top" alt="">
                                                            @endif
                                                        </a>
                                                        <span class="post-date">
                                                            {{ date('d m Y', strtotime($resentblogs->created_at)) }}</span>
                                                        <a href="{{ url('/blog/detail/' . $resentblogs->blogs_id) }}"
                                                            class="clearfix">{{ $resentblogs->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                    <!-- recent post -->
                                    <!-- category -->
                                    <div id="category" class="widget widget_category">
                                        <h4 class="widget-title">Category</h4>
                                        <ul>


                                            @if (!empty($blogcatagory))
                                                @foreach ($blogcatagory as $blogcatagorys)
                                                    <li><a href="{{ url('/blog/catagorys/detail/' . $blogcatagorys->blog_catagories_id) }}">{{ $blogcatagorys->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- category -->
                                    <!-- category -->
                                    <div id="tags" class="widget widget_tags">
                                        <h4 class="widget-title">Tags</h4>
                                        <div class="tagcloud">
                                            <a href="#" class="tag-cloud-link">Business</a>
                                            <a href="#" class="tag-cloud-link">Consulting</a>
                                            <a href="#" class="tag-cloud-link">Financial Support</a>
                                            <a href="#" class="tag-cloud-link">SEO</a>
                                            <a href="#" class="tag-cloud-link">Marketing</a>
                                            <a href="#" class="tag-cloud-link">Design</a>
                                            <a href="#" class="tag-cloud-link">Strategies</a>
                                            <a href="#" class="tag-cloud-link">Developing</a>
                                        </div>
                                    </div>
                                    <!-- category -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post_single_area">
                    <div class="container">
                        <div class="row">

                            {{-- @dd($relatedblog) --}}
                            @if (!empty($relatedblog))
                                @foreach ($relatedblog as $relatedblogs)
                                    <div class="col-md-4 col-sm-6 mb-5">
                                        <div class="single_blog_box">
                                            <a href="">

                                                @if (!empty($relatedblogs->img))
                                                    <img src="{{ asset('uploads/blogs/thumb/small/' . $relatedblogs->img) }}"
                                                        class="card-img-top" alt="">
                                                @else
                                                    <img src="{{ asset('no_image/no_image_blog.png') }}"
                                                        class="card-img-top" alt="">
                                                @endif
                                            </a>
                                            <div class="single_blog_meta">
                                                <span
                                                    class="blog_date">{{ date('d m Y', strtotime($relatedblogs->created_at)) }}</span>
                                                <a href="#">
                                                    <h4>{{ $relatedblogs->name }}</h4>
                                                </a>
                                                <p class="blog_excerpt">{{ $relatedblogs->short_desc }}</p>

                                                <a class="blog_readmore_btn"
                                                    href="{{ url('/blog/detail/' . $relatedblogs->blogs_id) }}"
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
            @endforeach
        @endif
    </main>





    {{-- New --}}








@endsection

@section('extrajsforcomment')
    <script>
        $("#commentFrom").submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('fontend.blog.commentsave') }}",
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response['status'] == 0) {
                        if (response['status'] == 0) {
                            if (response['errors']['name']) {
                                $(".name-error").html(response['errors']['name']);
                                $("#name").addClass('is-invalid');
                            } else {
                                $(".name-error").html('');
                                $("#name").removeClass('is-invalid');
                            }
                        }

                        if (response['status'] == 0) {
                            if (response['errors']['comment']) {
                                $(".comment-error").html(response['errors']['comment']);
                                $("#comment").addClass('is-invalid');
                            } else {
                                $(".comment-error").html('');
                                $("#comment").removeClass('is-invalid');
                            }
                        }
                    } else {
                        location.reload(true)
                    }
                },
                error: function() {

                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection
