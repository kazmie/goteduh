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
<link href="{{asset('vendor/print/print.min.css')}}" rel="stylesheet" type="text/css">
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

    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row noprint mt-5"></div>

        <form action="{{route('public.home.download.claimpolicy')}}" method="POST">
            <div class="container">
                <div class="row text-center noprint">
                <a  href="#" onClick="window.print()" class="btn btn-primary bd-0 ">PRINT POLICY</a>
                    <a href="{{route('admin.claim')}}" class="btn btn-success bd-0 ">HOME</a>
                </div>
                    <br>
                    <div class="row p-1 m-0 border">
                        <div class="col-md-12">
                            {{-- header --}}
                            <div class="row">
                                <div class="col-md-9">
                                    <img height="50" src="{{url('storage/logo/'. $claims->InsuranceEnrollment->insurance->company->image_url)}}" alt="">
                                </div>
                                <div class="col-md-3" style="float: right;">
                                    <img height="50" src="{{asset('img/my-teduh-logo-blue.png')}}" alt="">
                                </div>
                            </div>

                    <div class="row">
                        <div class="col-md-1">
                            <small>
                            </small>
                        </div>
                        <div class="col-md-8">
                            <small>
                                <b> {{ $claims->InsuranceEnrollment->insurance->company->name }} </b><br>
                                    {{ $claims->InsuranceEnrollment->insurance->company->address1 }}, {{ $claims->InsuranceEnrollment->insurance->company->address2 }}<br>
                                    {{ $claims->InsuranceEnrollment->insurance->company->address3 }}, {{ $claims->InsuranceEnrollment->insurance->company->postcode }}, {{ $claims->InsuranceEnrollment->insurance->company->state }}<br>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small>
                                <b>W </b>   {{ $claims->InsuranceEnrollment->insurance->company->web }}<br>
                                <b>T </b>   {{ $claims->InsuranceEnrollment->insurance->company->phone }}<br>
                                <b>F </b>   {{ $claims->InsuranceEnrollment->insurance->company->fax }}<br>
                                <b>E </b>   {{ $claims->InsuranceEnrollment->insurance->company->email }}<br>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="line"></div>
                    </div>

                    <br>
                    <div class="col-md-11" style="float: right;">
                        <center><h3><span style="background-color: #b5b58b"> TRAVEL CLAIM FORM</span><h3></center>
                            <center>
                                <small>Please (1) Complete this form, (2) Prepare the relevant documents listed on page two, and (3)
                                        Mail them to our office immediately to fasten the claim process. Thank you.
                                </small>
                            </center>
                    <div class="col-md-4" style="float: right;">
                            <div>
                                Certificate No. {{$claims->reference_no}} <br>
                            </div>
                    </div>
                    </div><br><br>
                    <br><br>    <br><br>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div>
                                    <b> A. DETAILS OF CERTIFICATE </b><br><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Participant's Full Name :  <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->name}} <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <br>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div><br>
                                    <b> B. DETAILS OF COVERED PERSON / CLAIMANT </b><br><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Full Name   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->name}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Mobile No.   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->contact}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    MyKad / Passport No.   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->nric}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Email   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->email}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Address   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->address}}, {{$claims->InsuranceEnrollment->user->address2}}, {{$claims->InsuranceEnrollment->user->postcode}} {{$claims->InsuranceEnrollment->user->city}}, {{$claims->InsuranceEnrollment->user->state}}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br>    <br><br><br>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div><br>
                                    <b> C. DETAILS OF TRAVEL & LOSS </b><br><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Travel Period (DD/MM/YYYY)  <br>
                                </div>
                                <div class="col-md-1">
                                    From  <br>
                                </div>
                                <div class="col-md-8">
                                 :   {{$claims->InsuranceEnrollment->depart_date}}  <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    <br>
                                </div>
                                <div class="col-md-1">
                                    To  <br>
                                </div>
                                <div class="col-md-8">
                                 :   {{$claims->InsuranceEnrollment->return_date}}  <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Date and Time of Loss / Accident   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->accident_date}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Location  <br>
                                </div>
                                <div class="col-md-9">
                                 :  <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Type of Loss / Accident  <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->ClaimType->name}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Description of Loss / Accident / Nature of Illness   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->description}}<br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Amount   <br>
                                </div>
                                <div class="col-md-9">
                                 : RM{{number_format($claims->InsuranceEnrollment->amount, 2)}}<br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Do you have other insurance / takaful covering this loss?  <br>
                                </div>
                                <div class="col-md-9">
                                 : <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Insurance Company / Takaful Operator   <br>
                                </div>
                                <div class="col-md-9">
                                 : <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Policy / Certificate No.   <br>
                                </div>
                                <div class="col-md-9">
                                 : <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div><br>
                                    <b> D. BANK ACCOUNT DETAILS </b><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-12">
                                    <small>Please provide your bank account details in order for us to expedite your claims
                                   payment process by direct credit to your account.</small> <br><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Name (as per bank account)   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->bank_account_name}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    MyKad / Passport No. (as per bank account) <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->InsuranceEnrollment->user->nric}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Bank Name  <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->bank_name}} <br>
                                </div>
                            </div>
                            <div class="row justify-content-md-right">
                                <div class="col-md-3">
                                    Account No.   <br>
                                </div>
                                <div class="col-md-9">
                                 : {{$claims->bank_account_no}}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div><br>
                                    <b> E. DECLARATION, AUTHORISATION & CUSTOMER'S DATA PRIVACY NOTICE </b><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-left">
                                <div class="col-md-12">
                                    <small><b>[Declaration]</b> I/We hereby declare that the above statements and facts are true, copies of documents are identical with the original one,
                                        and that I/We have not withheld from Company, any information within my/our knowledge connected with the accident.
                                    </small><br><small>
                                <b>[Authorisation] </b>We hereby authorise any physician, nurse, medical staff, hospital, clinic, organization, institution or individual that has any
                            records or knowledge of me / us all information pertaining to my health/medical history/claims and to provide copies of all
                            medical records/certifications, including any earlier medical history to Syarikat Takaful Berhad in order to process my/our claims. Syarikat
                            Takaful Malaysia Berhad may use the above medical information for any and all purposes pertaining to or arising out of the undersigned.
                            This authorisation shall remain valid until the above referenced claim has been finalised, but in no event longer than 7 years from date
                            below. I/We have the right to receive a copy of this authorisation. Photocopies of this authorisation shall be considerred as valid as the original.
                        </small><br><small>
                            <b>[Customer's Data Privacy Notice]</b> Syarikat Takaful Malaysia Berhad is committed to protect the personal data submitted by and collected from you.
                            For further details, please read our "Data Privacy Notice" published on our website.</small><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="col-md-12" style="float: left;">
                            <div class="row justify-content-md-right">
                                <div><br>
                                    <b> DOCUMENTS TO BE MADE AVAILABLE AT THE TIME OF REGISTRATION </b><br>
                                </div>
                            </div>
                            <div class="row justify-content-md-left">
                                <div class="col-md-12">
                                    <small>Below is a list of minimum documents required to process your claim. The request is not
                                        intended to be all inclusive as the need for any additional documents and/or information arise in the course of our claim analysis.</small>

                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#d3d3d3">
                                    <th scope="col"></th>
                                    <th scope="col">Documents Required</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;?>
                                @foreach ($claims->ClaimDocuments as $item)
                                <tr>
                                    <td scope="row">{{$count++}}</td>
                                    <td>{{$item->ClaimDocumentType->name}}</td>
                                    <td>
                                    <a href="{{url('storage/claim/'. $item->filename)}}" onclick="printJS('{{$item->original_filename}}')">{{$item->original_filename}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
<script type="text/javascript" src="{{asset('vendor/print/print.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</body>
</html>
@endsection
