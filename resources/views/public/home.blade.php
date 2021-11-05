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

                        <div class="col-md-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                            data-aos="fade-up" data-aos-delay="200">
                            <h1>Let us Protect you on your trip anytime, anywhere!</h1>
                            <h2>Protect with My Ar-Rehlah Now</h2>
                            <div class="d-lg-flex mt-3">
                                <a href="#" class="genric-btn info circle arrow">About Us!<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>

                        <div class="col-md-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                            <div class="card mt-5">
                                <div class="card-body">
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li><small> {{ $error }}</small></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}
                                    <h5 class="text-center text-dark">Let's get started, fill this simple form!</h5>
                                    <form action="{{ route('public.packages') }}" method="POST">
                                        @csrf
                                        <div class="form-group mt-3">
                                           
                                            <select class="form-control selectpicker {{ $errors->has('country_id') ? 'is-invalid' : '' }}" data-live-search="true"
                                                title="Destination Country" data-container="body" name="country_id">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                <small class="text-danger">*Please select destination country</small>
                                            @enderror
                                            
                                        </div>

                                        <label class="text-dark"><small>Travel Period</small> </label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input type="date" value="{{ old('departure') }}" name="departure" class="form-control  {{ $errors->has('departure') ? 'is-invalid' : '' }}">
                                                    @error('departure')
                                                        <small class="text-danger">*Please select travel period </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input type="date" value="{{ old('arrival') }}" name="arrival" class="form-control {{ $errors->has('arrival') ? 'is-invalid' : '' }}">
                                                    @error('arrival')
                                                        <small class="text-danger">*Please select travel period </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><small>Journey Plan</small> </label>
                                                    <select name="journey" class="form-control selectpicker">
                                                        <option value="1">One Way</option>
                                                        <option value="2" selected>Return</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><small>Travel Purpose</small> </label>
                                                    <select name="purpose" class="form-control selectpicker">
                                                        <option value="1">Business</option>
                                                        <option value="2" selected>Social/Leisure</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><small>Travel Plan</small> </label>
                                                    <select id="plan" name="plan" class="form-control selectpicker">
                                                        <option value="1" selected>Individual</option>
                                                        <option value="2">Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><small>Adult</small> </label>
                                                    <select name="adult" class="selectpicker form-control"
                                                        title="No Of Adult">
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="child-div" class="col-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><small>Child</small> </label>
                                                    <select name="child" class="selectpicker form-control"
                                                        title="No of child (Between 0-18)">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="custom-control custom-checkbox">

                                            <label class="custom-control-label text-dark" for="customCheck1"><small>I am a
                                                    Malaysian,
                                                    Malaysian Permanent Resident, or holder of a valid working permit,
                                                    dependent pass, in Malaysia and departing from Malaysia as a
                                                    passenger.</small></label>
                                        </div>
                                        <button class="btn btn-block btn-danger pt-3 pb-3 mt-2" type="submit">GET
                                            QUOTE</button>
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


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#child-div").hide();
            $('#plan').on('change', function() {
                if (this.value == 2) {
                    $("#child-div").show();
                } else {
                    $("#child-div").hide();
                }
            });

            $("#region option").each(function(i) {
                if (i > -1) {
                    var title = $(this).attr("data-value");
                    $(this).attr("title", title);
                }
            });
        });
    </script>
@endsection
