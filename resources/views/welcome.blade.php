<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('/storage/images/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm  sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-top" src="{{ asset('/storage/images/logo.png') }}" height="40"
                        width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item px-4 mx-auto">
                            <a class="nav-link text-white" href="#home">{{ __(' Home') }}</a>
                        </li>
                        <li class="nav-item px-4 mx-auto">
                            <a class="nav-link text-white" href="#about">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item px-4 mx-auto">
                            <a class="nav-link text-white" href="#team">{{ __('Team') }}</a>
                        </li>
                        <li class="nav-item px-4 mx-auto">
                            <a class="nav-link text-white" href="#contact">{{ __('Contact') }}</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            @guest
                                @if (Route::has('login'))
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">{{ __('Sign In') }}</a>
                                    <ul class="dropdown-menu dropdown-menu-dark"
                                        aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item text-white"
                                                href="{{ route('login') }}">{{ __('Student') }}</a></li>
                                        <li><a class="dropdown-item text-white"
                                                href="{{ route('admin.home') }}">{{ __(' Admin') }}</a></li>
                                        <li><a class="dropdown-item text-white"
                                                href="{{ route('teacher.home') }}">{{ __('Teacher') }}</a></li>
                                    </ul>
                            </li>
                            @endif
                        @else
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ url('home') }}">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</a>
                                </li>
                            @endauth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home') }}"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    @if (Auth::user()->image)
                                        <img class="rounded-circle"
                                            src="{{ asset('/storage/images/' . Auth::user()->image) }}" alt="image"
                                            style="width: 30px;height: 30px; ">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt" style="font-size: 1rem; "></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <!-- Banner Section -->
            <section id="home" class="d-flex align-items-center position-relative vh-100 cover hero"
                style="background-image:url('{{ asset('/storage/images/zppsu.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                <div class="container-fluid container-fluid-max">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="image rounded-circle text-center"
                                src="{{ asset('/storage/images/logo.png') }}" alt="image"
                                style="width: 150px;height: 150px; ">
                            {{-- <h1 class="text-white text-grey-100 text-uppercase display-4">{{ __('Welcome to Class Scheduling System') }}</h1> --}}
                            <h1 class="text-white text-grey-100 text-uppercase display-4">{{ __('Welcome') }}</h1>
                            <h1 class="text-white text-grey-100 text-uppercase display-4">{{ __('to') }}</h1>
                            <h1 class="text-white text-grey-100 text-uppercase display-4">
                                {{ __('Class Scheduling System') }}</h1>
                            <div class="mt-3">
                                <a class="btn btn-danger text-white mr-2" href="#about" role="button"
                                    style="border-radius:20px">{{ __('Get Started') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- ======= About Section ======= -->
            <section id="about" class="about py-5 bg-light">
                <div class="container">
                    <h1 class="text-center text-uppercase display-5">About Us</h1>
                    <p class="text-center fs-1">We are the Invincibles Group of DT-IT</p>
                    <p class="text-center">Resize the browser window to see that this page is responsive by the way.
                    </p>
                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Team Section ======= -->
            <section id="team" class="team section-bg py-5 bg-light">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="display-5 text-center">Team</h1>
                        <p class="h2 text-center fw-bolder">{{ __('We are the Invincibles Team of CTechEd') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3 py-3 h-100 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow" style="border-radius:20px;">
                                <div class="card-body text-center">
                                    <img src="{{ asset('/storage/images/pic1.jpg') }}"
                                        class="img-fluid card-img-top hover-zoom" alt="">
                                    <div class="social">
                                        <a href="https://www.facebook.com/profile.php?id=100007949627143"><i
                                                class="fa-2x bi bi-facebook"></i></a>
                                    </div>
                                    <div class="member-info">
                                        <h4 class="card-title ">{{ __('Al-jhaihar Hadjula') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-3 h-100 align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                            <div class="card shadow" style="border-radius:20px">
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/images/pic2.jpg') }}" class="img-fluid"
                                        alt="">
                                    <div class="social">
                                        <a href="https://www.facebook.com/maeyang.sugano"><i
                                                class="fa-2x bi bi-facebook"></i></a>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ __('Will May Sugano') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-3 h-100 align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                            <div class="card shadow" style="border-radius:20px">
                                <div class="card-body text-center">
                                    <img src="{{ asset('/storage/images/pic3.jpg') }}" class="img-fluid"
                                        alt="">
                                    <div class="social">
                                        <a href="https://www.facebook.com/profile.php?id=100070121239682"><i
                                                class="fa-2x bi bi-facebook"></i></a>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ __('Radzmil Jawharan') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-3 h-100 align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                            <div class="card shadow" style="border-radius:20px">
                                <div class="card-body text-center">
                                    <img src="{{ asset('/storage/images/pic4.jpg') }}" class="img-fluid"
                                        alt="">
                                    <div class="social">
                                        <a href="https://www.facebook.com/profile.php?id=100021443349570"><i
                                                class="fa-2x bi bi-facebook"></i></a>
                                    </div>
                                    <div class="member-info">
                                        <h4>{{ __('Bilita Abdulkalim') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Team Section -->


            <section class="features-icons bg-light text-center py-5">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3 ">
                                <div class="features-icons-icon d-flex"><i
                                        class="fa-4x bi-window m-auto text-primary"></i></div>
                                <h3>Fully Responsive</h3>
                                <p class="lead mb-0">Our design will look great on any device, no matter the size!</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                <div class="features-icons-icon d-flex"><i
                                        class="fa-4x bi-layers m-auto text-primary"></i></div>
                                <h3>Bootstrap 5 Ready</h3>
                                <p class="lead mb-0">Featuring the latest build of the new Bootstrap 5.1 CSS framework!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                                <div class="features-icons-icon d-flex"><i
                                        class="fa-4x bi-terminal m-auto text-primary"></i></div>
                                <h3>Easy to Use</h3>
                                <p class="lead mb-0">Ready to use with your own content, or customize the design!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Request a Quote Section -->
            <section class="contact-section bg-black" id="contact">
                <div class="container px-4 py-3 px-lg-5">
                    <div class="row gx-4 gx-lg-5">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center ">
                                    <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">{{ __('Address') }}</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-100">
                                        {{ __('R.T. Lim Boulevard, Baliwasan, Zamboanga City') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-envelope text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">{{ __('Email') }}</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-50"><a
                                            href="#!">{{ __('bimbimxerep@gmail.com') }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">{{ __('Phone') }}</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-50">{{ __('0955-567-8107') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer bg-black text-center text-white-50">
            <div class="footer-copyright text-center text-white-50 py-2 container-fluid">© 2021 Made with a
                <lord-icon src="https://cdn.lordicon.com/rjzlnunf.json" trigger="loop"
                    colors="primary:#ffffff,secondary:#ffffff" stroke="90" style="width:25px;height:25px">
                </lord-icon>by
                <a href="{{ url('/') }}">{{ __('Invincible\'s') }} </a>. All rights reserved.
            </div>
        </footer>
    </div>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>

</html>
