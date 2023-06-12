@extends('layouts.frontend')

@section('content')

    <!-- home Section Begin -->
    <section class="mb-5">
        <div class="container">
            <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/shop.png') }}">
                <div class="hero__text">
                    <span>ALIMENTAIRE SHOP</span>
                    <h2>DES PROMOS <br />100% INRATABLES!</h2>
                    <p>Découvrez Nos Meilleurs Offres!</p>
                    <a href="#" class="primary-btn">Profiter Aujourd'hui!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- home Section End -->

    <!-- Categories Section Begin -->
    <section class="categories mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Nos Catégories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">

                    @forelse ($categories as $category)
                        <div class="col-lg-3" key="{{ $category->id }}">
                            <div class="categories__item set-bg"
                                data-setbg="images/{{ $category->image }}">
                                <h5 ><a href="{{ route('shop.show', $category) }}"> {{ $category->name }} </a></h5>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-3">
                            <div class="categories__item set-bg">
                                <h5>there is no data to show!!!</h5>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- product offre Section Begin -->
    <section class="categories mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Nos Offres</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="categories__slider owl-carousel">

                    @forelse ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                    data-setbg="images/{{ $product->image }}">
                                    <ul class="featured__item__pic__hover">
                                        <li>
                                            <a href="{{ route('shop.item', $product) }}"><i class="fa fa-eye"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('add_to_cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">

                                    <h6> {{ $product->nom }} </h6>
                                    <h5> {{ $product->price }}  dh</h5>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- product offre Section End -->

    <!--blog section begin-->
    <section class="Blog categories mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($blogs as $blog)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5" id="blogs">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('images/blogs')}}/{{ $blog->photo }}" style="object-fit: cover" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ $blog->created_at }}</li>
                                </ul>
                                <h5><a href="{{route('blog.showitem',$blog)}}"> {{ $blog->title }}  </a></h5>
                                <p>Découvrez un monde d'inspiration et d'aventure à travers les pages captivantes de notre blog.</p>
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>

        </div>
    </section>
    <!--blog section begin-->

    <!-- banner3 section begin -->
    <section class="banner3">
        <h2>Vous avez des questions</h2>
        <p>Nous avons déjà la réponse que vous cherchez</p>
        <button class="btn-primary1">Contactez Nous</button>
    </section>
    <!-- banner3 section end -->

    <!-- Banner Begin
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    Banner End -->
@endsection


