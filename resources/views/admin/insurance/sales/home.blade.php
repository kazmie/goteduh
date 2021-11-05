@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Total Sales</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Total Sales</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    
    <div class="card">       
        <div class="card-header">
            <div class="float-right">{{$items->links()}}</div>
            <h3>Total Sales</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin-insurance.filter')}}" method="POST">
                @csrf
                <label>Filter by date : </label>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" name="date_type">
                                <option value="1" >Travel Date</option>
                                <option value="2">Issued Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input id="from_day" name="from_day" value="{{$from_day}}" placeholder="From" type="text"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input id="to_day" name="to_day" value="{{$to_day}}" placeholder="To" type="text"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control" name="insurance_id">
                                <option value=-1">ALL</option>
                                @foreach ($insurances as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="form-group">
                            <select class="form-control" name="exported">
                                    <option value="-1">ALL</option>
                                    <option value="1">CHECKED</option>
                                    <option value="2">UNCHECKED</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-sm pr-5 pl-5">Search</button>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </form>
            @include('admin.layouts.notification')
            <form action="{{route('admin-insurance.enrollment.exported')}}" method="POST">
            <div class="table-responsive">
                <table class="table table-striped" id="project">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Policy No</th>
                            <th scope="col">Product Name</th>
                            {{-- <th scope="col">Region</th> --}}
                            <th scope="col">Package</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Enroll Date</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Return</th>
                            <th scope="col">Price</th>
                            <th scope="col">Exported</th>
                            <th scope="col">Group Label</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($items as $item)

                        <tr>
                            <td scope="row">{{$count++}}</td>
                            <td> 
                                @if ($item->exported == 0)
                                    <div class="custom-control custom-checkbox">                                
                                        <input type="checkbox" name="id[]" value="{{ $item->id }}" class="custom-control-input" 
                                        id="customCheck{{ $count }}" {{ $item->exported == 0 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck{{ $count }}">{{$item->policy_no}}</label>                                    
                                    </div>
                                @else
                                    {{$item->policy_no}}
                                @endif
                            </td>                            
                            <td>{{$item->insurance->name}}</td>
                            {{-- <td>{{$item->region->name}}</td> --}}
                            <td>{{$item->insurance->name}}</td>
                            <td>{{$item->plan->name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->depart_date}}</td>
                            <td>{{$item->return_date}}</td>
                            <td>RM {{number_format($item->amount,2)}}</td>
                            <td>
                                @if ($item->exported == 0)
                                    <strong>NO</strong>
                                @else
                                    <strong>YES</strong>
                                @endif
                            </td>
                            <td>
                                @if ($item->exported == 1)
                                    {{ $item->exportgroup->name }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success mb-1 btn-block text-white"
                                    href="/admin/insurance/product/sales/{{$item->id}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
                @csrf
                <input id="from1" value="{{$from_day}}" name="from1" type="hidden">
                <input id="to1" value="{{$to_day}}" name="to1" type="hidden">
                <input id="insurance_id" value="{{$insurance_id}}" name="insurance_id" type="hidden">
                <input id="exported" value="{{$exported}}" name="exported" type="hidden">
                {{-- <a href="{{route('admin-insurance.download')}}" class="btn btn-primary">Export to CSV</a> --}}
                {{-- <a href="/admin/insurance/product/mark-exported" class="btn btn-success">Mark as Exported</a> --}}
                <button type="submit" class="btn btn-primary mt-3" >Export</button>
            </form>
            <div class="float-right">{{$items->links()}}</div>
        </div>                        
    </div>
</div>

@endsection
