@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Product Category Plan</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin-insurance-category') }}" class="breadcrumb-link">Category Plan</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">New</a></li>

            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-header">Add New Product Category Plan</div>

    <div class="card-body">
        <form method="POST" action="{{route('admin-insurance-category-save')}}">
            @csrf
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Category Name</label>
                            <input name="category_name" type="text" class="form-control">
                        </div>                          
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Label Color</label>
                            <input id="color-input" name="color" type="text" value="#1b7ced" class="form-control">
                        </div>                          
                    </div>
                    
                </div>
                
                    <button class="btn btn-primary" type="submit">Save</button>
                
            </div>            
        </form>
    </div>


</div>
@endsection

@section('script')
<script>
    $(function () {
      // Basic instantiation:
      $('#color-input').colorpicker();
      
      // Example using an event, to change the color of the #demo div background:
      $('#color-input').on('colorpickerChange', function(event) {
        $('#demo-input').css('background-color', event.color.toString());
      });
    });
  </script>
@endsection