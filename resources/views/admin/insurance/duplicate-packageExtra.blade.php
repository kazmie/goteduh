@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Package Plan</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/product/edit/{{$product_id}}"
                        class="breadcrumb-link">Insurance Products</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/product/package/{{$product_id}}"
                        class="breadcrumb-link">Insurance Products Package</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Duplicate</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Duplicate Package Plan
    </div>
    <div class="card-body">
        <form action="{{route('admin-insurance-product-duplicatePackageExtra-package')}}" method="POST">
            <input name="id" type="hidden" value="{{$product_id}}" class="form-control">

            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Area</label>
                        <select class="form-control" name="region_id">
                            @foreach ($regions as $item)
                            @if ($packages->region_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->description}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->description}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <input name="description" type="text" class="form-control" value="{{ $packages->description }}" required placeholder="E.G World wide except USA">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Plan</label>
                        <select class="form-control" name="plan_id">
                            @foreach ($plans as $item)
                            @if ($packages->plan_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Category Plan</label>
                        <select class="form-control" name="category_plan_id">
                            @foreach ($categoryplans as $item)
                            @if ($packages->category_plan_id == $item->id)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Amount (RM)</label>
                        <input name="price" type="text" value="{{$packages->price_extra}}" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" id="add-benefit" class="text-white btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
