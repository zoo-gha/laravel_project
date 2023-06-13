@extends('layouts.frontend')
@section('content')
<section class="featured spad">
    <div class="container">
        <div class="row featured__filter">
            @forelse ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div  class="featured__item__pic set-bg" data-setbg="{{asset('images')}}/{{ $product->image }}">
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
                <div>There isn't a result product</div>
            @endforelse
        </div>
    </div>
</section>

@endsection
