@extends('layouts.frontend')
@section('content')

    <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="sidebar">
                            <div class="sidebar__item">
                                <h4>Categories</h4>
                                <ul>
                                    @forelse ($categories as $category)
                                        <li key="{{ $category->id }}"><a href="{{ route('shop.show', $category) }}"> {{ $category->name }} </a></li>
                                    @empty
                                        <li><a href="">No data To show!!</a></li>
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7">
                        <div class="filter__item">
                            <div class="row">

                                <div class="col-lg-4 col-md-3">
                                    <div class="filter__found">
                                    <h6><span> {{ $count }} </span> Products found</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @forelse ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6 shadow-lg rounded mb-2">
                                    <div class="product__item">
                                        <div
                                        class="product__item__pic set-bg"
                                        data-setbg="{{asset('images')}}/{{ $product->image }}"
                                        >
                                        <ul class="product__item__pic__hover">
                                            <li>
                                            <a href="{{ route('shop.item', $product) }}"><i class="fa fa-eye"></i></a>
                                            </li>
                                            <li>
                                            <a href="{{ route('add_to_cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="product__item__text">
                                        <h6><a href="#">{{$product->nom}}</a></h6>
                                        <h5> {{ $product->price }} Dh</h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div>No data to show</div>
                            @endforelse

                        </div>

                        <div>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Product Section End -->

@endsection
