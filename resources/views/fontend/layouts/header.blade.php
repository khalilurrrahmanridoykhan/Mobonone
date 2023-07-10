<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!empty(getSetting()) && getSetting()->website_title != "")
    <title>{{ getSetting()->website_title }}</title>
    @else
    <title>Laravel WEB APP</title>
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('fontend/assets/css/style.css') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />





    {{-- Mobozone Start--}}

	<link rel="stylesheet" href="{{ asset('fontend/mobozone/') }}assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/normalize.css">

	<link rel="stylesheet" href="assets/fonts/fonts.css">
	<link rel="stylesheet" href="assets/fonts/bootstrap-icons.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.css">

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

	<title>Mobozene </title>

    {{-- Mobozone End --}}


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
</head>



</head>

<body>
	<header class="site_header header_border_bottom">
		<div class="mobozone_menu_area">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-md-2 col-lg-3">
						<div class="site_logo">
							<a href="{{ url('/') }}"><img src="assets/img/logo.png" alt="logo"></a>
						</div>
					</div>
					<div class="col-md-8 col-lg-6">
						<div class="mobozone_main_menu d-flex justify-content-center justify-content-md-end">
							<ul>
                                @if(!empty(getManu()))
                                @foreach (getManu() as $manu)
                                @if ($manu->dropdown == 0)
                                <li class="nav-item {{ Request::url() == $manu->page_link ? 'active' : '' }} "><a class="nav-link"
                                    href="{{ $manu->page_link }}">{{ $manu->page_name }} </a></li>
                                @else
                                <li class="nav-item {{ Request::url() == $manu->page_link ? 'active' : '' }} }} dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $manu->page_name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        @if(!empty(getServices()))
                                        @foreach (getServices() as $service)
                                        <li><a class="dropdown-item" href="{{ url("/service/detail/".$service->services_id) }}">{{ $service->name }}</a></li>

                                        @endforeach
                                        @else

                                        @endif
                                        {{-- <li><a class="dropdown-item" href="service-detail.html">Web Design</a></li>
                                        <li><a class="dropdown-item" href="service-detail.html">Logo Design</a></li>
                                        <li><a class="dropdown-item" href="service-detail.html">T-shirt Design</a></li>
                                        <li><a class="dropdown-item" href="service-detail.html">Book Cover Design</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ route('fontend.service') }}">View All</a></li>
                                    </ul>
                                </li>
                                @endif
                                @endforeach
                                @endif
							</ul>
						</div>
					</div>
					<div class="col-md-2 col-lg-3">
						<div class="mobozone_user_search d-flex justify-content-end">
							<ul>
								<li><a href="#"><i class="bi bi-person"></i></a></li>
								<li><a href="#"><i class="bi bi-search"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
