@extends('layouts.frontend')
@section('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                @forelse ($blogcategories as $blogcategory)
                                    <li><a href="{{ route('blogs.shows', $blogcategory) }}" key="{{ $blogcategory->id }}">{{ $blogcategory->name }}</a></li>

                                @empty
                                    <li>there is no data to show</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{asset('images/blogs')}}/{{ $blog->photo }}" alt="">
                        <p> {{ $blog->content }} </p>
                        <h3> {{ $blog->title }} </h3>
                        <p>The study area is located at the back with a view of the vast nature. Together with the other
                            buildings, a congruent story has been managed in which the whole has a reinforcing effect on
                            the components. The use of materials seeks connection to the main house, the adjacent
                            stables</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('images/blogs/author')}}/{{$blog->image_auth}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6> {{ $blog->author }} </h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> {{ $blog->category->name }}</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->


@endsection
