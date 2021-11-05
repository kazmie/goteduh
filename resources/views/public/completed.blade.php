@extends('public.layouts.app')

@section('content')

@include('public.layouts.header')     

<div class="container mt-5 pt-5">
<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h3>Thank you. Your policy successfully submitted.</h3>
            <p>Check your email include Spam folder.</p>
            <a class="btn btn-success float-middle pl-5 pr-5" href="{{route('public.home.download.policy')}}">View Policy</a>
            <a class="btn btn-success float-middle pl-5 pr-5" href="{{route('public.home')}}">Back to Home</a>
        </div>
    </div>
</div>
</div>
@endsection
