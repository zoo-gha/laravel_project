@extends('layouts.frontend')

@section('content')

    @if (session()->has('cart'))
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <tr data-id="{{ $id }}">
                                                <td class="shoping__cart__item" data-th="Product">
                                                    <img src="{{ asset('images') }}/{{ $details['photo'] }}"
                                                        style="widows: 50px; height: 50px" alt="">
                                                    <h5>{{ $details['product_name'] }}</h5>
                                                </td>
                                                <td class="shoping__cart__price" data-th="Price">
                                                    {{ $details['price'] }} dh
                                                </td>
                                                <td class="shoping__cart__quantity" data-th="Quantity">
                                                    <span>Quantity : <h5 class="d-inline"> {{$details['quantity']}} </h5></span>

                                                </td>
                                                <td class="shoping__cart__total">
                                                    {{ $details['price'] * $details['quantity'] }} dh
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a onclick="return confirm('Confirmer la suppression!')" href="{{route('cart.remove', $id)}}" class="btn btn-danger cart_remove"><i class="icon_close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ route('shop.index') }}" class="primary-btn cart-btn cart-btn-right">CONTINUE
                                SHOPPING</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">

                        </div>
                    </div>

                    @php
                        $total = 0;
                    @endphp
                    @foreach ((array) session('cart') as $id => $details)
                        @php
                            $total += $details['price'] * $details['quantity'];
                        @endphp
                    @endforeach
                    <div class="col-lg-6">

                        <div class="shoping__checkout">
                            <ul>
                                <li><h5 class="d-inline">Total</h5> <span>{{ $total }} dh</span></li>
                            </ul>
                            <form action="{{ route('checkout') }}" method="POST">
                                @method('GET')
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                <button type="submit" class="primary-btn">CHECKOUT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @else
        <section class="container text-center">
            <div class="alert alert-primary fw-bold fs-1" role="alert">
                Cart is Empty !!
                <a class="fs-1 text-success" href="{{ route('shop.index')}}">Explore our product</a>
            </div>
        </section>
    @endif

@endsection
