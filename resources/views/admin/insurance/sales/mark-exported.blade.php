@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Mark Sales as Exported</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="/admin/insurance/product/sales" class="breadcrumb-link">Insurance Sales</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Mark Sales as Exported</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">

    <div class="card">
       
        <div class="card-header">
            <h3>Mark Sales as Exported</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin-insurance-policy-export')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Export Group Label</label>
                    <input name="name" placeholder="Set group label for exported item" type="text" class="form-control"></input]>
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="policy_id" value={{ $enrollments->implode('id', ',') }} type="text" class="form-control" required></input]>
                </div>

                <div class="form-group">
                    <label>Selected Policy No :</label>                
                    <textarea class="form-control" name="policy_no" id="" cols="30" rows="5" readonly>{{ $enrollments->implode('policy_no', ',') }}</textarea>         
                </div>
                <button type="submit" class="btn btn-primary">Mark as Exported</button>
                {{-- <a href="{{ route('admin-insurance.download') }}" class="btn btn-dark">Download CSV</a> --}}
            </form>
            <form action="{{route('admin-insurance.download')}}" method="POST">
                @csrf
               
                <div class="form-group">
                    <input type="hidden" name="policy_id" value={{ $enrollments->implode('id', ',') }} type="text" class="form-control" required></input]>
                </div>

                <button type="submit" class="btn btn-secondary">Download CSV</button>
                {{-- <a href="{{ route('admin-insurance.download') }}" class="btn btn-dark">Download CSV</a> --}}
            </form>
            {{--
                 <form action="{{route('admin-insurance-policy-export')}}" method="GET">
                    <a href="{{ route('admin-insurance.download') }}" class="btn btn-dark">Download CSV</a>   
                </form>                       
             --}}
        </div>       
    </div>
</div>
@endsection
