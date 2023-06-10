@extends('layouts.frontend')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2></h2>
                    <div class="breadcrumb__option">
                    <a href="./index.html"></a>
                    <a href="./index.html"></a>
                    <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

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
            <a href="#" class="primary-btn">ADD TO CARD</a>

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

<!-- Related Product Section Begin
<section class="related-product">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="section-title related__product__title">
            <h2>Related Product</h2>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
            <div
            class="product__item__pic set-bg"
            data-setbg="asset('img/product/product-1.jpg')}}"
            >
            <ul class="product__item__pic__hover">
                <li>
                <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
            </div>
            <div class="product__item__text">
            <h6><a href="#">Crab Pool Security</a></h6>
            <h5>$30.00</h5>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
            <div
            class="product__item__pic set-bg"
            data-setbg="asset('img/product/product-2.jpg')}}"
            >
            <ul class="product__item__pic__hover">
                <li>
                <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
            </div>
            <div class="product__item__text">
            <h6><a href="#">Crab Pool Security</a></h6>
            <h5>$30.00</h5>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
            <div
            class="product__item__pic set-bg"
            data-setbg="asset('img/product/product-3.jpg')}}"
            >
            <ul class="product__item__pic__hover">
                <li>
                <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
            </div>
            <div class="product__item__text">
            <h6><a href="#">Crab Pool Security</a></h6>
            <h5>$30.00</h5>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
            <div
            class="product__item__pic set-bg"
            data-setbg="asset('img/product/product-7.jpg')}}"
            >
            <ul class="product__item__pic__hover">
                <li>
                <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
            </ul>
            </div>
            <div class="product__item__text">
            <h6><a href="#">Crab Pool Security</a></h6>
            <h5>$30.00</h5>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
 Related Product Section End -->

@endsection