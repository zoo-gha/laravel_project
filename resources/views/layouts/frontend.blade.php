<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Ogani Template" />
        <meta name="keywords" content="Ogani, unica, creative, html" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>moha_shop</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
            rel="stylesheet" />

        <!---font awesome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" />
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li>
                        <a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i>
                            <span> {{ count((array) session('cart')) }} </span></a>
                    </li>
                </ul>
            </div>
            <div class="humberger__menu__widget">


                    <div class="header__top__right__language header__top__right__auth mt-4">
                        <a class="d-inline" href="#"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="{{route('profile.edit')}}">{{  __('Profile')}}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </div>

            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li class="active"><a href="{{route('home')}}">Accueil</a></li>
                    <li class="active"><a href="{{route('about.index')}}">About</a></li>
                    <li>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <ul class="header__menu__dropdown">
                            @php
                                use App\Models\Category;
                                $categories = Category::get();
                            @endphp
                            @forelse ($categories as $category)
                                <li key="{{ $category->id }}"><a href="{{ route('shop.show', $category) }}"> {{ $category->name }} </a></li>
                            @empty
                                <li><a href="">No data To show!!</a></li>
                            @endforelse
                        </ul>
                    </li>
                    <li><a href="{{route('contact.voir')}}">Contact</a></li>
                    <li><a href="{{ route('blogs.show') }}">Blog</a></li>

                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-envelope"></i> mohashop@gamil.com</li>
                    <li><i class="fa fa-phone"></i> +212 61 878 7841</li>
                </ul>
            </div>
        </div>
        <!--  End -->

        <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__left">
                                <ul>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        mohashop@gmail.com
                                    </li>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        +212 61 878 7841
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__right">
                                <div
                                    class="header__top__right__language header__top__right__auth"
                                >
                                    <a class="d-inline" href="#"
                                        ><i class="fa fa-user"></i> {{ Auth::user()->name }}</a
                                    >
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{route('profile.edit')}}">{{  __('Profile')}}</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="{{ route('home') }}"><img style="width: 70px; height: 45px;"
                                    src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="active">
                                    <a href="{{ route('home') }}">Accueil</a>
                                </li>
                                <li class="">
                                    <a href="{{route('about.index')}}">About</a>
                                </li>
                                <li>
                                    <a href="{{route('shop.index')}}">shop</a>
                                    <ul class="header__menu__dropdown">

                                        @forelse ($categories as $category)
                                            <li key="{{ $category->id }}"><a href="{{ route('shop.show', $category) }}"> {{ $category->name }} </a></li>
                                        @empty
                                            <li><a href="">No data To show!!</a></li>
                                        @endforelse
                                    </ul>
                                </li>
                                <li><a href="{{route('contact.voir')}}">Contact</a></li>
                                <li><a href="{{ route('blogs.show') }}">Blog</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                            <ul>
                                <li>
                                    <a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i>
                                        <span> {{ count((array) session('cart')) }} </span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header Section End -->

        <!-- Hero Section Begin -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="{{route('search')}}" method="GET">
                                    @csrf
                                    <input type="text" name="query" placeholder="What do yo u need?" />
                                    <button type="submit" class="site-btn">
                                        SEARCH
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                {{ $message }}
            </div>
        @endif

        @yield('content')

        <!-- Footer Section Begin -->
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}"
                                        alt="" /></a>
                            </div>
                            <ul>
                                <li>15 Dchaira El Jihadia, Agadir, Marroc</li>
                                <li>Phone: (+212)0512345678</li>
                                <li>Email: mohashop@Mail.Com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Useful Links</h6>
                            <ul>
                                @foreach ($categories as $category)
                                    <li key="{{ $category->id }}"><a href="{{ route('shop.show', $category) }}"> {{ $category->name }} </a></li>
                                @endforeach
                            </ul>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Shopping</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Delivery infomation</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Nous suivre :</h6>

                            <div class="footer__widget__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(
                                            new Date().getFullYear()
                                        );
                                    </script>

                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                    by
                                    <span>zougha</span>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js links  -->

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
        <script src="{{ asset('js/mixitup.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>
