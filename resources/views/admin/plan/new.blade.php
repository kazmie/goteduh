@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Product Travel Plan</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin-insurance-plan') }}" class="breadcrumb-link">Travel Plan</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">New</a></li>

            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">Add New Insurance Product</div>

    <div class="card-body">

        @include('admin.layouts.notification')
        <form method="POST" action="{{route('admin-insurance-plan-save')}}">

            @csrf
            <div class="md-col-12">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Travel Plan Type</label>
                    <input name="name" type="text" class="form-control">
                </div>                          
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>


</div>
@endsection