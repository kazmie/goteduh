@extends('public.layouts.app')

@section('content')

    @include('public.layouts.header')
    <div class="container mt-5 pt-5">

        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <span><strong>Select Product Package</strong></span>
                <div class="progress mt-2" style="height: 5px">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100" style="width: 25%;">
                        <span class="progress-value"></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('public.packages.filter') }}" method="POST">
                                @csrf
                                <h5 class="card-header bg-dark text-white">
                                    Sort By
                                </h5>
                                <div class="card-body m-3">
                                    <h5 class="mb-3">Filter by Price</h5>
                                    <div class="form-check form-group">
                                        <input class="form-check-input" type="radio" name="priceOrder" value="asc" checked>
                                        <label>
                                            Low to High
                                        </label>
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input" type="radio" name="priceOrder" value="desc">
                                        <label>
                                            High to Low
                                        </label>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="genric-btn danger circle  btn-block">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <h5 class="card-header bg-dark text-white">
                                Travel Details
                            </h5>
                            <div class="card-body">
                                <ul class="list-group">

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

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    @foreach ($packages as $item)
                        <div class="col-md-4 mt-3">
                            <form action="{{ route('public.details') }}" method="POST">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $item->id }}">
                                <input type="hidden" name="insurance_id" value="{{ $item->insurance_id }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">

                                <div class="card">
                                    <div class="card-header text-center text-white"
                                        style="background-color: {{ $item->categoryplan->color }}">
                                        <h3>{{ $item->CategoryPlan->category_name }}</h3>
                                    </div>
                                    <div class="card-body text-center text-dark">
                                        <div class="campaign-img">
                                            <img style="height: 50px" class="img-fluid"
                                                src="{{ url('/storage/logo/' . $item->insurance->company->image_url) }}"
                                                alt="Logo" class="user-avatar-xl">
                                        </div>
                                        {{-- <small class="float-left">From</small> --}}
                                        <p id="product-info" class="float-right"><i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $item->description}}"></i></p>
                                        <h1 class="mb-1">RM {{ number_format($item->price, 2) }}</h1>
                                        <h4 class="card-title mb-1 p-1">{{ $item->name }}</h4>
                                        {{-- <p class="mb-3">{{$item->description}}</p>
                                    <p class="mb-3">{{$item->short_description}}</p> --}}
                                        {{-- <ul class="list-group list-group-striped">
                                        @foreach ($item->insurance->InsuranceProductBenefit as $benefit)
                                        <li  class="list-group-item p-2"> 
                                            <p>{{$benefit->InsuranceBenefitType->name}}</p>
                                            <p>{{$benefit->value}}</p>
                                        </li>
                                        @endforeach
                                    </ul> --}}
                                        <button class="genric-btn primary circle  btn-block btn mt-3">Get Now</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
@endsection
