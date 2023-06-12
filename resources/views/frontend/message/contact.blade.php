@extends('layouts.frontend')
@section('content')

    <!-- Contact Section Begin -->
    <section class="contact spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+212 61 878 7841</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>15 Dchaira El Jihadia, Agadir, Marroc</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>07:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>moha_sho@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Dchaira El Jihadia</h4>
                <ul>
                    <li>Phone: +212 61 878 7841</li>
                    <li>Add: 15 Dchaira El Jihadia, Agadir, Marroc</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Laissez vous messages</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('messages.store')}}"  method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name" name="name">
                        @error('name')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" placeholder="Your Email" name="email">
                        @error('email')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message" name="message"></textarea>
                        @error('message')
                            <div class="invalid-feedback text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <button type="submit" class="site-btn">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
