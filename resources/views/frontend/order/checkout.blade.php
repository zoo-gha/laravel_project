@extends('layouts.frontend')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Checkout Details</h4>
                <form action="{{ route('order.checkout') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <input type="text" name="user_name" value="{{ old('user_name') }}" placeholder="Name"/>
                                        @error('user_name')
                                            <div class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <input type="text" placeholder="Address" name="user_adresse" value="{{ old('user_adresse') }}" class="checkout__input__add" />
                                @error('user_adresse')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <input type="text" name="user_city" value="{{ old('user_city') }}" placeholder="City"/>
                                @error('user_city')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <input type="text" name="user_phone" value="{{ old('user_phone') }}" placeholder="Phone Number"/>
                                        @error('user_phone')
                                            <div class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <input type="email" disabled name="user_email" value="{{ auth()->user()->email }}" placeholder="Email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="payment_status" value="{{ old('payment_status') }}" />
                                @error('payment_status')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>
                            <div class="checkout__input">
                                <input type="text" disabled name="payment_method" value="On Delivery" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">
                                    Products <span>Total</span>
                                </div>
                                <ul>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                            @endphp
                                            <li>{{ $details['product_name'] }} <span>{{ $details['price'] * $details['quantity'] }} dh</span></li>

                                        @endforeach
                                    @endif
                                </ul>
                                <div class="checkout__order__total">
                                    Total <span>{{$total}} dh</span>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
