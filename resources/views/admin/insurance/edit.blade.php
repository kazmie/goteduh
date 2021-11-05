@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Product Benefits</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/product" class="breadcrumb-link">Insurance
                        Product</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Edit</a></li>

            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('admin.layouts.notification')
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add New Insurance Product Benefits</div>
            <div class="card-body">
                <form method="POST" action="{{route('admin-insurance-product-update')}}" enctype="multipart/form-data">

                    @csrf

                    <input name="id" id="id" type="hidden" value="{{$product->id}}" class="form-control">

                    <div class="md-col-12">
                        <div class="form-group">
                            <label class="col-form-label">Product Name</label>
                            <input name="name" type="text" value="{{$product->name}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Product Description</label>
                            <textarea class="form-control" type="text" name="description"
                                rows="3">{{$product->description}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Insurance Company</label>
                            <input name="company" value="{{$product->company->name}}" type="text" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Takaful Product</label>
                        @if ($product->takaful == 0)
                        <input type="text" value="Yes" class="form-control" readonly>
                        @else
                        <input type="text" value="No" class="form-control" readonly>
                        @endif
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Product Disclosure</label>
                         <input type="file" class="form-control-file" name="product_disclosure" aria-describedby="fileHelp">
                         <small id="fileHelp" class="form-text text-muted">Please upload a valid product disclosure file. Size of file should not be more than 2MB.</small>
                    </div>
                </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="/admin/insurance/product/benefit/{{$product->id}}" class="text-white btn btn-secondary">Add
                        Benefits</a>
                    <a href="/admin/insurance/product/package/{{$product->id}}" class="text-white btn btn-secondary">Add
                        Package Plan</a>
                    <a href="#" class="deleteProductRecord text-white btn btn-danger" data-id="{{ $product->id }}" id="delete">Delete Product</a>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function()
    {
        $( ".deleteProductRecord" ).click(function(e) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                if (result.value)
                {
                    e.preventDefault();
                    var id = $(this).data("id");
                    var token = $("input[name=_token]").val();
                    var product_id = $("input[name=id]").val();
                    console.log(id);
                    console.log(token);
                    console.log(product_id);
                    $.ajax({
                        type:'POST',
                        url:'{{route("admin-insurance-product-delete")}}',
                        data:{'id' : id, '_token' : token, 'product_id' : product_id},
                        success:function(data){
                            if(data.message == 'success'){
                                window.location = "/admin/insurance/product";
                                console.log(data.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                }
            })
        });


    });

</script>
@endsection
