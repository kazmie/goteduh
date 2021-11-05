@extends('public.layouts.app')

@section('content')

@include('public.layouts.header')     
<div class="container mt-5 pt-5">
<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h3>Thank you. Your claim successfully submitted and waiting for processing</h3>
            <h2>Claim Reference No : {{$claim->reference_no}}</h2>

            <a class="btn btn-success float-middle pl-5 pr-5" href="{{route('public.home')}}">Home</a>
        </div>
    </div>
</div>
</div>
@endsection