@extends('public.layouts.main-app')

@section('content')

<br>
<div class="row">
    <div class="col-md-12">
        <div class="progress-container">
            <span class="progress-badge">Comfirmation and Payment</span>
            <div class="progress progress-sm">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100" style="width: 75%;">
                    <span class="progress-value"></span>
                </div>
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
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

                        <h3>+ Next of Kin details</h3>
                        <form action="{{route('public.store.benificiary')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-form-label text-dark">Name</label>
                                <input name="name" type="text" placeholder="E.G KHAIRUL AZMI IDRIS"
                                    class="form-control form-control-sm" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">NRIC/ID</label>
                                        <select class="form-control form-control-sm" id="id_type">
                                            <option value="1" selected>NRIC</option>
                                            <option value="2">OLD NRIC</option>
                                            <option value="3">ARMY IC</option>
                                            <option value="4">POLICE IC</option>
                                            <option value="5">PASSPORT</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label text-dark">NRIC/ID No</label>
                                        <input name="nric" type="text" placeholder="E.G 800101146001"
                                            class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label text-dark">Contact No</label>
                                <input type="text" class="form-control date-picker" name="contact"
                                    placeholder="E.G 0123456789" data-datepicker-color="primary" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg bd-0">Complete</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection