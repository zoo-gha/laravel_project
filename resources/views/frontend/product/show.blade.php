@extends('layouts.frontend')

@section('content')

<!-- Product Details Section Begin -->
<section class="product-details spad m-0 p-0">
    <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6">
        <div class="product__details__pic">
            <div class="product__details__pic__item">
            <img
                class="product__details__pic__item--large"
                src="{{asset('images')}}/{{ $product->image }}"
                alt=""
            />
            </div>

        </div>
        </div>
        <div class="col-lg-6 col-md-6">
        <div class="product__details__text">
            <h3> {{ $product->nom }} </h3>
            <div class="product__details__price"> {{ $product->price  }} dh</div>
            <p> {{ $product->details }}  </p>
            <div class="product__details__quantity">
            <div class="quantity">
                <div class="pro-qty">
                <input type="text" value="1" />
                </div>
            </div>
            </div>
            <a href="{{ route('add_to_cart', $product->id) }}" class="primary-btn">ADD TO CARD</a>

            <ul>
                <li><b>Details</b> {{ $product->details }} </li>
                <li><b>Weight</b> <span>  {{ $product->weight }} g</span></li>
                <li>
                    <b>Share on</b>
                    <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a
                class="nav-link active"
                data-toggle="tab"
                href="#tabs-1"
                role="tab"
                aria-selected="true"
                >Description</a
                >
            </li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="product__details__tab__desc">
                <h6>Products Infomation</h6>
                <p> {{ $product->description }} </p>
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Details Section End -->

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div  class="featured__item__pic set-bg" data-setbg="{{asset('images')}}/{{ $product->image }}">
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <a href="{{route('shop.item', $product)}}"><i class="fa fa-heart"></i></a>
                                </li>

                                <li>
                                    <a href="{{route('add_to_cart', $product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6> {{ $product->name }} </h6>
                            <h5> {{ $product->price }}  dh</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div>There isn't a related product</div>
            @endforelse
        </div>
    </div>
</section>

@endsection
