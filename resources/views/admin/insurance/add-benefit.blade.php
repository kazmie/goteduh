@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Products</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/product/edit/{{$product->id}}"
                        class="breadcrumb-link">Insurance Products</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Products Benefits</a>
                </li>
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

        <form action="{{route('admin-insurance-product-add-benefit')}}" method="POST">
            <input name="id" type="hidden" value="{{$product->id}}" class="form-control">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Insurance Benefit Type</label>
                        <select class="form-control" name="benefit_id">
                            @foreach ($types as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Value</label>
                        <input name="value" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Plan</label>
                        <select class="form-control" name="plan_id">
                            @foreach ($plans as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Category Plan</label>
                        <select class="form-control" name="category_plan_id">
                            @foreach ($categoryplans as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" id="add-benefit" class="text-white btn btn-primary float-right mb-3">Add New</button>
        </form>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Benefits</th>
                    <th scope="col">Value</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Category Plan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @foreach ($benefits as $item)

                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{$item->InsuranceBenefitType->name}}</td>
                    <td>{{$item->value}}</td>
                    <td>{{$item->Plan->name}}</td>
                    <td>{{$item->CategoryPlan->category_name}}</td>
                    <td>
                        <a class=" btn btn-xs btn-dark"
                            href="/admin/insurance/product/benefit/edit/{{$product->id}}/{{$item->id}}">Edit</a>
                        <a class="deleteBenefitRecord btn btn-xs btn-danger" data-id="{{ $item->id }}" id="delete"
                            href="#">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function()
    {
        $( ".deleteBenefitRecord" ).click(function(e) {

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
                        url:'{{route("admin-insurance-product-delete-benefit")}}',
                        data:{'id' : id, '_token' : token, 'product_id' : product_id},
                        success:function(data){
                            if(data.message == 'success'){
                                location.reload();
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
