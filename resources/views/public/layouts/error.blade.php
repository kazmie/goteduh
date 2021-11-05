@extends('public.layouts.app')

@section('content')

@include('public.layouts.header')     
<div class="container mt-5 pt-5">
<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h3>Something wrong with your request. Please retry again</h3>
            <a class="btn btn-success float-middle pl-5 pr-5" href="{{route('public.home')}}">Back to Home</a>
        </div>
    </div>
</div>
</div>
@endsection