@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Product</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/product" class="breadcrumb-link">Insurance
                        Product</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">New</a></li>

            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">Add New Insurance Product</div>

    <div class="card-body">

        @include('admin.layouts.notification')
        <form method="POST" action="{{route('admin-insurance-product-save')}}" enctype="multipart/form-data">

            @csrf

            <div class="md-col-12">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Product Name</label>
                    <input name="name" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Product Description</label>
                    <textarea class="form-control" type="text" name="description" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Insurance Company</label>
                            <select class="form-control" name="company">
                                @foreach ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Type</label>
                                <select class="form-control" name="type">
                                    @foreach ($types as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Takaful Product</label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="takaful" checked="" value="0" class="custom-control-input"><span
                                    class="custom-control-label">Yes</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="takaful" checked="" value="1" class="custom-control-input"><span
                                    class="custom-control-label">No</span>
                            </label>
                        </div>
                    </div></div><div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Disclosure</label>
                                 <input type="file" class="form-control-file" name="product_disclosure" aria-describedby="fileHelp">
                                 <small id="fileHelp" class="form-text text-muted">Please upload a valid product disclosure file. Size of file should not be more than 2MB.</small>
                            </div>
                        </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>


</div>
@endsection
