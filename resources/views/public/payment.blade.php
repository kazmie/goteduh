@extends('public.layouts.app')

@section('content')

@include('public.layouts.header')     
<div class="container mt-5 pt-5">

<div class="row">
    <div class="col-md-12">
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <span><strong>Comfirmation and Payment</strong></span>
                <div class="progress mt-2" style="height: 5px">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100" style="width: 75%;">
                        <span class="progress-value"></span>
                    </div>
                </div>                
            </div>
        </div> 
       

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Plan
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            {{-- <li class="list-group-item">
                                <h5 class="m-0">Destination/Region</h5>
                                <p>
                                    {{$region_name}}
                                </p>
                            </li> --}}
                            <li class="list-group-item">
                                <h5 class="m-0">Travel Date</h5>
                                <p>{{ $departure }} to {{ $arrival }}</p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="m-0">Plan</h5>
                                @if ($plan == 1)
                                <p>Individual</p>
                                @else
                                <p>Family</p>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Journey</h5>
                                @if ($journey == 1)
                                <p>One Way</p>
                                @else
                                <p>Return</p>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Purpose</h5>
                                @if ($purpose == 1)
                                <p>Business</p>
                                @else
                                <p>Social/Leisure</p>
                                @endif
                            </li>
                            <li class="list-group-item bg-danger m-0 p-0 text-center">
                                <h1 class="text-white mt-2">RM {{number_format($price,2)}}</h2>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h2 class="slim-card-title">Declaration</h2><br>
                        <form action="{{route('public.open.payment')}}" method="POST">
                            <h3 class="slim-card-title">Product Disclosure Sheet</h3>
                            
                            @csrf
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="" required>
                                    <strong>
                                    I have read and understood the product disclosure sheet.
                                    <br> You are advised to view and read the Policy Contract before buying any of the Insurance/Takaful products.</strong>
                                    <span><a href="{{url('storage/'. $insurance->file_url)}}"><span><i class="fas fa-file-alt"></i></span></a></span>
                                </label>
                                
                            </div>
                            <br>
                            <h3 class="slim-card-title mt-3">Important Notice and Declaration</h3>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" required>
                                  <strong>I have read and and aggree with the terms and conditions in important Notice and Declaration.</strong>
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" required>
                                  <strong>I agree to receive whatsapp from Gabungan Baiduri Sdn Bhd</strong>
                                </label>
                            </div>
                            <br>
                            <h3 class="slim-card-title mt-3">Personal Data Protection Act (PDPA) Consent</h3>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" required>
                                  <strong>Yes. I expressly agree to MyTeduh and/or External Parties processing my personal data for promotional and marketing purposes.</strong>
                                </label>
                            </div>
                           

                            <input type="hidden" name="enrollment_id" value="{{$enrollment_id}}">
                            <button type="submit" class="genric-btn danger circle  btn-lg bd-0 mt-5">PROCEED TO PAYMENT</button> 
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

@endsection
