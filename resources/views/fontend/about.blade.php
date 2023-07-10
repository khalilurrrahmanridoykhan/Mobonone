@extends('fontend.layouts.main')

@section('content')
<main>

    @if (!empty($about))
        @foreach ($about as $abouts)
        <section class="hero-small">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('{{ asset('fontend/assets/images/banner1.jpg') }}') ;">
                        <div class="hero-small-background-overlay"></div>
                        <div class="container  h-100">
                            <div class="row align-items-center d-flex h-100">
                                <div class="col-md-12">
                                    <div class="block">
                                        <span class="text-uppercase text-sm letter-spacing"></span>
                                        <h1 class="mb-3 mt-3 text-center">{{ $abouts->title }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-2  py-5">
            <div class="container py-2">
                <div class="row">
                    <div class="col-md-6 align-items-center d-flex">
                        <div class="about-block">
                            <h1 class="title-color mb-3">{{ $abouts->title }}</h1>
                            <p>{!! $abouts->description !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-red-background">
                            <img src="{{ asset('fontend/assets/images/about-us.jpg') }}" alt="" class="w-100">
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @endforeach
    @endif


    <section class="section-4 py-5 text-center">
        <div class="hero-background-overlay"></div>
        <div class="container">
           <div class="help-container">
                <h1 class="title">Do you need help?</h1>
                <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
                <a href="#" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
           </div>
        </div>
    </section>

    <section class="section-3 py-5">
        <div class="container">
            <div class="divider mb-3"></div>
            <h2 class="title-color mb-4 h1">Blog & News</h2>
            <div class="cards">
                <div class="services-slider">

                    @if (!empty($blog))
                        @forelse ($blog as $blogs)
                            <div class="card border-0 ">
                                @if (!empty($blogs->img))
                                    <img src="{{ asset('uploads/blogs/thumb/small/' . $blogs->img) }}"
                                        class="card-img-top" alt="">
                                @else
                                    <img src="{{ asset('ridoy/ridoy.jpg') }}" class="card-img-top" alt="">
                                @endif
                                <div class="card-body p-3">
                                    <h1 class="card-title mt-2"><a href="#">{{ $blogs->name }}</a></h1>
                                    <div class="content pt-2">
                                        <p class="card-text">{{ $blogs->short_desc }}</p>
                                    </div>
                                    <a href="{{ url('/blog/detail/' . $blogs->blogs_id) }}"
                                        class="btn btn-primary mt-4">Details <i
                                            class="fa-solid fa-angle-right"></i></a>

                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif


                </div>
            </div>
        </div>
    </section>
</main>
@endsection
