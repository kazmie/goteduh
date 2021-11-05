<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>MyTeduh</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400"
    rel="stylesheet">

<link href="{{asset('vendor/mdb/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/mdb/css/mdb.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/mdb/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
    html,
    body,
    header {
        
    }

    .image-container {
        display: flex;
        justify-content: center;
    }

    .line {
        width: 100%;
        border-bottom: 2px solid grey;
        position: absolute;
    }

    table.table-bordered {
        border: 1px solid black;
        margin-top: 20px;
    }

    table.table-bordered>thead>tr>th {
        border: 1px solid black;
    }

    table.table-bordered>tbody>tr>td {
        border: 1px solid black;
    }

    @media screen {
        p.bodyText {
            font-family: verdana, arial, sans-serif;
            font-size: 10px;
        }
    }

    @media print {
        p.bodyText {
            font-family: georgia, times, serif;
            font-size: 10px;
        }

        .noprint {
            display: none
        }
    }

    @media screen,
    print {
        p.bodyText {
            font-size: 10pt
        }
    }
</style>
</head>

<body>
    @extends('public.layouts.app')

    @section('nav')
    @include('public.layouts.nav')
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row noprint mt-5">

        </div>
        {{-- <form action="{{route('public.home.download.policy')}}" method="POST"> --}}
        <div class="container">
            <div class="row text-center noprint">
                <button onClick="window.print()" class="btn btn-primary bd-0 ">PRINT POLICY</button>
                <a href="{{route('public.home')}}" class="btn btn-success bd-0 ">HOME</a>
            </div>

            <br>
            <div class="row p-1 m-0 border">
                <div class="col-md-12">
                    {{-- header --}}
                    <div class="row">
                        <div class="col-md-8">
                            <img height="50" src="{{url('storage/logo/'. $company->image_url)}}" alt="">
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <img height="50" src="{{asset('img/my-teduh-logo-blue.png')}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <small>
                                        <b>{{$company->name }}</b><br>
                                        {{$company->address1 }}, {{$company->address2 }}<br>
                                        {{$company->address3 }}, {{$company->postcode }} {{$company->state }}<br>
                                         <br>
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <small>
                                        <b>W</b> {{$company->web }} <br>
                                        <b>T</b> {{$company->email }} <br>
                                        <b>F</b> {{$company->fax }} <br>
                                        <b>E</b> {{$company->phone }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="float: right;">
                            <div class="row justify-content-md-center">
                                <div class="col-md-4">
                                    <small><i>Managed by</i></small> <br>
                                    <img height="60" src="{{asset('img/gabungan-baiduri.png')}}" alt="">
                                </div>
                                <div class="col-md-8">
                                    <small>
                                        <b>GABUNGAN BAIDURI SDN BHD</b><br>
                                        2-1-04 D'Vida, Jalan Bazar U8/101<br>
                                        P.O Box 11483, 50746 Kuala Lumpur <br>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- header end --}}


                    <div class="row mb-2 mt-2">
                        <div class="line"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <b>
                                <h5><b>TAKAFUL CERTIFICATE</b></h5>
                            </b> <br>
                            <b></p>
                                <h6><b>Person Covered</b></h6>
                            </b>

                            {{ strtoupper($user->name) }} ( {{$user->nric }} ) <br>
                            {{ strtoupper($user->address) }} <br>
                            {{ strtoupper($user->address2) }} <br>
                            {{ strtoupper($user->postcode) }} {{ strtoupper($user->city) }},
                            {{ strtoupper($user->state) }} <br>


                        </div>

                        <div class="col-md-6">
                            <b>
                                <h5><b>MASTER CERTIFICATE NO. : P0006789</b></h5>
                            </b>

                            <p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>
                                            Reference No. <br>
                                            Effective Date <br>
                                            Travel Region <br>
                                            Plan <br>
                                            Journey <br>
                                            Purpose <br>
                                            Contribution <br>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>
                                            : {{$user->nric}} <br>
                                            : {{$product->depart_date}} Till : {{$product->return_date}}<br>
                                            : - <br>
                                            {{-- : {{$region->description}} <br> --}}
                                            : @if ($product->plan_coverage == 1)
                                            INDIVIDUAL <br>
                                            @else
                                            FAMILY <br>
                                            @endif

                                            : @if ($product->journey_type == 0)
                                            ONE WAY <br>
                                            @else
                                            RETURN <br>
                                            @endif
                                            : @if ($product->purpose == 0)
                                            BUSINESS <br>
                                            @else
                                            SOCIAL/LEISURE <br>
                                            @endif
                                            : RM {{number_format($product->amount,2)}}<br>
                                        </p>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <b>
                                    <h6><b>Additional Person Covered(s)</b></h6>
                                </b>
                                <b>
                                    <h6>for Family Plan only</h6>
                                </b>
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color:#d3d3d3">
                                            <th scope="col">MyKad/MyKid/Passport No.</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach ($headcounts as $item)
                                        <tr>
                                            <td>{{strtoupper($item->nric)}}</td>
                                            <td>{{strtoupper($item->name)}}</td>
                                            <td id=ages>{{strtoupper($item->birth_date)}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <br><br>

                                <br><br><br><br><br><br>




                            <p><b>Nomination</b></p>

                            <div style="color:gray">
                                <br>
                                <p>IMPORTANT NOTICE</p>
                                <p><small>
                                    The nomination information is very crucial for the Takaful Operator Company to
                                    effectivly disburse the benefits when the situation arise.
                                </small></p>
                                <p><small>
                                    Please contact Gabungan Baiduri Sdn Bhd @ phone : 013-261 5000 / 03-5879
                                    8163/64/65 email : services@myarrehlah.my to provide these information.
                                </small></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-center elegant-color-dark text-white p-1"">
                                <b>
                                    <h5>EMERGENCY 24-HOUR HOTLINE</h5>
                                </b>
                                <h1>+603-7965 3837</h1>
                                <h5>Customer Service</h5>
                                <h6>Fax : +603 58798167 email : services@myarrehlah.my</h6>
                            </div>
                            <br>
                            <div>
                                <h5><b>IMPORTANT NOTICE</b></h5>
                                <p><small>1. This Certificate together with proof of purchase/bills/documentary evidence
                                    must be produce in the event of claim. </small></p>
                                <p><small>2. Please notify <b>Gabungan Baiduri Sdn Bhd</b> 2-1-04 D'Vida Jalan Bazar
                                    U8/101, Bukit Jelutong, 40150 Shah Alam , Selangor, MALAYSIA (Attn:Travel
                                    claims) Tel: (+603)7 7848 1111 Fax: (+603) 5879 8167 immediately in writing in
                                    the event of claim. In no event should a claim be notified later than 30 days
                                    after any event which may entitle the Person Covered to claim under this
                                    certificate.</small></p>
                                <p><small>3. In case of emergency, the Person Covered, a person travelling with him or
                                    treating medical authority or institution must immediately contact 24-hour
                                    hotline (+603 7965 3837) to verify coverage and arrange the appropriate medical
                                    care.</small></p>
                                <p><small>4. And extension of cover in NOT allowed during the trip or after you have
                                    departed for your destination.</small></p>


                                <p><b>DECLARATION</b> <br>
                                <small>In consideration of payment of the contribution, {{$company->name }}
                                    agrees to provide takaful coverage for the Person Covered according to the
                                    terms, conditions and exclusions of the Master Certificate No. B0002137</small></p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <small>
                                    {{$company->name }} hereby will pay all the eligible benefits to
                                    the nominee(s) named above upon death with the terms and condition stated in the
                                    certificate.
                                    <br><br>
                                    <b>For Muslim Person Covered</b> <br>
                                    To the 1st nominee which is entrusted with the responsibility to distribute the
                                    benefit to the person covered's beneficiary who is entitled in accordance with
                                    Shariah (Faraid Law) abd and Shariah Court order. Should the first nominee
                                    predecease the person covered then the 2nd will entrusted to carry the same
                                    responsibility as the person and thereafter. <br><br>
                                    <b>For Non-Muslim Person Covered</b><br>
                                    To the named above. If any one of the named beneficiary predeceased the person
                                    covered his/her share will be equally shared between the survivior(s) according
                                    to the share as stated above.
                                </small>

                            </p>
                        </div>
                        <div class="col-md-6">
                            <br><br>
                            <div class="p-1 border">
                                <small>Signed for and on behalf of <b>{{$company->name }}</b> (131646-K)</small>

                                <div class="image-container">
                                    <img width="200" height="150" src="{{asset('img/signature.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</main>
<br>

<script type="text/javascript" src="{{asset('vendor/mdb/js/jquery-3.4.0.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</body>
</html>
@endsection
