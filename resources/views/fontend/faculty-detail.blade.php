@extends('fontend.layouts.main')


@section('content')


    <main>

        @if (!empty($service))
            @foreach ($service as $services)
                <section class="hero-small">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"
                                style="background-image: url({{ asset('fontend/assets/images/varsity.jpg') }}) ;">
                                <div class="hero-small-background-overlay"></div>
                                <div class="container  h-100">
                                    <div class="row align-items-center d-flex h-100">
                                        <div class="col-md-12">
                                            <div class="block">
                                                <span class="text-uppercase text-sm letter-spacing"></span>
                                                <h1 class="mb-3 mt-3 text-center">{{ $services->name }}</h1>
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
                                    <h1 class="title-color mb-3">{{ $services->name }}</h1>
                                    <h5 class="title-color mb-3">Intal:  {{ $services->intal }}</h5>
                                    <h5 class="title-color mb-3">Postion:  {{ $services->postion }}</h5>
                                    <h5 class="title-color mb-3">Email:  {{ $services->email }}</h5>
                                    <h5 class="title-color mb-3">Phone Ext:  {{ $services->phone_ext }}</h5>
                                    <h5 class="title-color mb-3">Room No:  {{ $services->room_no }}</h5>
                                    <h5 class="title-color mb-3">Mobile No:  {{ $services->Mobile_number }}</h5>
                                    <h5 class="title-color mb-3">Tacken Credit:  {{ $services->tacken_credit }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image-red-background">
                                    @if (!empty($services->img))
                                        <img src="{{ asset('uploads/facultys/thumb/large/' . $services->img) }}"
                                            class="card-img-top" alt="">
                                    @else
                                        <img src="{{ asset('ridoy/ridoy.jpg') }}" class="card-img-top" alt="">
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

              {{-- </div> --}}
                        {{-- </div>
                    </div>
                </section> --}}
            @endforeach
        @endif
    </main>

@endsection
