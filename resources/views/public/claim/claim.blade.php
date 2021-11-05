@extends('public.layouts.app')
@section('content')
    @include('public.layouts.header')
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-left pl-3">
                    <div class="row">

                        <div class="col-md-8 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                            data-aos="fade-up" data-aos-delay="200">
                            <h1>Let us Protect you on your trip anytime, anywhere!</h1>
                            <h2>Protect with My Ar-Rehlah Now</h2>
                            <div class="d-lg-flex mt-3">
                                <a href="#" class="genric-btn info circle arrow">About Us!<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>

                        <div class="col-md-4 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                            <div class="card mt-5">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li><small> {{ $error }}</small></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <h5 class="text-center text-dark">Let's get started, fill this simple form!</h5>
                                    <form action="{{ route('public.claim.detail') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-dark">Insert NRIC or ID number for smoother
                                                transaction</label>
                                            <input type="text" class="form-control" placeholder="NRIC/ID Number"
                                                name="nric" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-block btn-round">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Banner Area =================-->


    <div class="section section-download" id="whyus-section" data-background-color="black">
        <div class="container">
            <!-- Heading -->
            <h2 class="mb-5 mt-5 text-center" data-aos="zoom-in-right">What Does my AR-REHLAH Covers?</h2>
            <!--Grid row-->
            <div class="row" data-aos="zoom-in-left">

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-plane fa-3x grey-text"></i>
                    <h4 class="my-4">Trip Cancellation</h4>
                    <p>We’ve got you covered for cancellation costs due to unforeseeable events outside of your
                        control. Up to RM20,000</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-plane-departure fa-3x grey-text"></i>
                    <h4 class="my-4">Travel Delay</h4>
                    <p>We’ve got you covered if your pre-booked transport is delayed for 6 hours or more. Up to
                        RM3,200</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-luggage-cart fa-3x grey-text"></i>
                    <h4 class="my-4">Baggage Damage/Delay</h4>
                    <p>We’ve got you covered on the loss or damage to your baggage, including delay by the carrier.
                        Up to RM800</p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            <br>
            <!--Grid row-->
            <div class="row" data-aos="zoom-in-left">

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-user-md fa-3x grey-text"></i>
                    <h4 class="my-4">Emergency Medical Expenses</h4>
                    <p>We’ve got you covered on overseas emergency medical, hospital and dental expenses.
                        UP TO RM300,000</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-ambulance  fa-3x grey-text"></i>
                    <h4 class="my-4">Emergency Medical Transportation</h4>
                    <p>We’ve got you covered on the emergency transportation to move you to the nearest hospital.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-1">
                    <i class="fas fa-car-side fa-3x grey-text"></i>
                    <h4 class="my-4">Rental Car Excess Cover</h4>
                    <p>We’ve got you covered on the excess charges if a car you rent gets damaged or stolen.
                        Up to RM1,000</p>
                </div>
            </div>
        </div>
    </div>
@endsection
