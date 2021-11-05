@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Products</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/insurance/product/edit/{{$product_id}}" class="breadcrumb-link">Insurance Products</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Products Benefits</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Add Product Benefits
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product Name</label>
                    <input value="{{$product->name}}" type="text" class="form-control" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Insurance Company</label>
                    <input value="{{$product->company->name}}" type="text" class="form-control" readonly>
                </div>
            </div>
        </div>

        <form action="{{route('admin-insurance-product-update-benefit')}}" method="POST">
            <input name="id" type="hidden" value="{{$benefits->id}}" class="form-control">
            <input name="product_id" type="hidden" value="{{$product_id}}" class="form-control">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Insurance Benefit Type</label>
                        <select class="form-control" name="benefit_id">
                            @foreach ($types as $item)
                                @if ($benefits->insurance_benefit_type_id == $item->id)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Value</label>
                    <input name="value" type="text" value="{{$benefits->value}}"class="form-control" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Plan</label>
                        <select class="form-control" name="plan_id">
                            @foreach ($plans as $item)
                            @if ($benefits->plan_id == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Category Plan</label>
                        <select class="form-control" name="category_plan_id">
                            @foreach ($categoryplans as $item)
                            @if ($benefits->category_plan_id == $item->id)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @else
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <button type="submit" id="add-benefit" class="text-white btn btn-primary float-right mb-3">Update</button>
        </form>
        <br><br>

    </div>
</div>
@endsection
