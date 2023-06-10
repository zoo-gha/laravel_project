@extends('layouts.frontend')
@section('content')
    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @forelse ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{asset('images/blogs')}}/{{$blog->photo}}" style="object-fit: cover" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i>{{ $blog->created_at }}</li>
                                        </ul>
                                        <h5> {{ $blog->title }} </h5>
                                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam
                                            quaerat </p>
                                        <a href="{{route('blog.showitem',$blog)}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse

                    </div>
                    <div>
                        {{ $blogs->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
