@extends('admin.layouts.app')
@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Products</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Products</a></li>

            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">Insurance Product</div>

    <div class="card-body">

        @include('admin.layouts.notification')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Company</th>
                    <th scope="col">Takaful ?</th>
                    <th scope="col">Product Disclosure</th>
                    <th scope="col">Action</th>
                    <th scope="col">Enable Sale</th>
                </tr>
            </thead>
            <tbody>

                    <?php $count = 1; ?>
                @foreach ($items as $item)
                @if ($item->status == 1)
                <tr class="table-success">

                @else
                <tr class="table-danger">
                @endif

                    <th scope="row">{{$count++}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->company->name}}</td>
                    <td>
                        @if ($item->takaful == 0)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td>{{$item->file_url}}</td>
                <td><a class="btn btn-xs btn-dark" href="/admin/insurance/product/edit/{{$item->id}}">Edit</a></td>
                <td> <label class="switch">
                     <input data-id="{{$item->id}}"  class="toggle-class" type="checkbox" data-onstyle="success"
                      data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $item->status ? 'checked' : '' }}>
                 </label>
             </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" card-footer">
        <a class="btn btn-primary" href="{{route('admin-insurance-product-new')}}">Add New</a>
        <div class="float-right">{{$items->links()}}</div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function()
    {
        $('.toggle-class').change(function() {
       var status = $(this).prop('checked') == true ? 1 : 0;
       var id = $(this).data("id");
       console.log(id);
       console.log(status);

       $.ajax({
           type:'GET',
           dataType: "json",
           url:'{{route('admin-insurance-product-changeStatus')}}',
           data:{'id' : id, 'status' : status},
           success: function(data){
               window.location.reload(true);
              console.log(data.success)
           }
       });
   });


    });

</script>
@endsection
