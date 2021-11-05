@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Products Benefit</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Benefits</a></li>

            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">Insurance Product Benefits</div>

    <div class="card-body">

        @include('admin.layouts.notification')
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @foreach ($items as $item)

                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <a class="btn btn-xs btn-dark" href="/admin/benefit/edit/{{$item->id}}">Edit</a>
                        <a class="deleteRecord btn btn-xs btn-danger" data-id="{{ $item->id }}" id="delete"
                            href="#">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" card-footer">
        <a class="btn btn-primary" href="{{route('admin-insurance-benefit-new')}}">Add New</a>
        <div class="float-right">{{$items->links()}}</div>
    </div>
</div>
@endsection


@section('script')
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {
        $( ".deleteRecord" ).click(function(e) {
           
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
                        $.ajax({
                            type:'POST',
                            url:'{{route("admin-insurance-benefit-delete")}}',
                            data:{'id' : id, '_token' : token},
                            success:function(data){
                                if(data.message == 'success'){
                                    location.href = "{{route('admin-insurance-benefit')}}";
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