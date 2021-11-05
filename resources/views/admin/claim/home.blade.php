@extends('admin.layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="float-right">{{$claims->links()}}</div>
            <h3>Total Claims</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.claim.filter')}}" method="POST">
                @csrf
                <label>Filter by : </label>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input id="from_day" name="from_day" value="{{$from_day}}" placeholder="From" type="text"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input id="to_day" name="to_day" value="{{$to_day}}" placeholder="To" type="text"
                                class="form-control datepicker">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control form-control-sm" id="input-select" name="status">
                            <option value="-1">Filter by status</option>
                            <option value="3">Processing</option>
                            <option value="4">Approve</option>
                            <option value="99">Reject</option>
                        </select>
                    </div>


                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-sm pr-5 pl-5">Search</button>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </form>
            @include('admin.layouts.notification')
            <div class="table-responsive">
                <table class="table table-striped" id="project">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Policy No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Claim Type</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Departure</th>
                            <th scope="col">Return</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($claims as $item)

                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$item->InsuranceEnrollment->policy_no}}</td>
                            <td>{{$item->InsuranceEnrollment->insurance->name}}</td>
                            <td>{{$item->ClaimType->name}}</td>
                            <td>{{$item->InsuranceEnrollment->plan->name}}</td>
                            <td>{{$item->InsuranceEnrollment->depart_date}}</td>
                            <td>{{$item->InsuranceEnrollment->return_date}}</td>
                            <td>RM {{number_format($item->amount,2)}}</td>
                            <td>
                                @if ($item->status == 1)
                                <span class="badge badge-primary">New</span>
                                @elseif ($item->status == 2)
                                <span class="badge badge-info">Document Uploaded</span>
                                @elseif ($item->status == 3)
                                <span class="badge badge-info">Processing</span>
                                @elseif ($item->status == 4)
                                <span class="badge badge-success">Approved</span>
                                @elseif ($item->status == 99)
                                <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a class="btn btn-xs btn-success mb-1 btn-block text-white"
                                    href="/admin/claims/view/{{$item->id}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" card-footer">
            <form action="{{route('admin-insurance.download')}}" method="POST">
                @csrf
                <input id="from1" value="{{$from_day}}" name="from1" type="hidden">
                <input id="to1" value="{{$to_day}}" name="to1" type="hidden">
                <a href="{{route('admin-claim.download')}}" class="btn btn-primary">Export to CSV</a>
            </form>
            <div class="float-right">{{$claims->links()}}</div>
        </div>
    </div>
</div>
@endsection
