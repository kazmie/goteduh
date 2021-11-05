@extends('public.layouts.app')

@section('content')

    @include('public.layouts.header')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="m-0">User Information </h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="m-0">Name</h5>
                                <p>
                                    {{ $user->name }}
                                </p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="m-0">NRIC/ID No</h5>
                                <p>{{ $user->nric }}</p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="m-0">Contact No</h5>
                                <p>{{ $user->contact }}</p>
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Email</h5>
                                <p>{{ $user->email }}</p>
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Address</h5>
                                <p>
                                    {{ $user->address }} <br>
                                    {{ $user->address2 }} <br>
                                    {{ $user->postcode }}, {{ $user->city }} <br>
                                    {{ $user->state }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="influence-profile-content pills-regular">
                    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-packages-tab" data-toggle="pill"
                                href="#pills-insurance" role="tab" aria-controls="pills-packages"
                                aria-selected="true">Insurance Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-campaign-tab" data-toggle="pill" href="#pills-claim"
                                role="tab" aria-controls="pills-campaign" aria-selected="false">Claims Status</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade  active show" id="pills-insurance" role="tabpanel"
                            aria-labelledby="pills-campaign-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="m-0">Insurance List</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Policy No</th>
                                                <th scope="col">Product Name</th>
                                                {{-- <th scope="col">Region</th> --}}
                                                <th scope="col">Plan</th>
                                                <th scope="col">Departure</th>
                                                <th scope="col">Return</th>
                                                <th scope="col">Price</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; ?>
                                            @foreach ($items as $item)

                                                <tr>
                                                    <th scope="row">{{ $count++ }}</th>
                                                    <td>{{ $item->policy_no }}</td>
                                                    <td>{{ $item->insurance->name }}</td>
                                                    {{-- <td>{{$item->region->name}}</td> --}}
                                                    <td>{{ $item->plan->name }}</td>
                                                    <td>{{ $item->depart_date }}</td>
                                                    <td>{{ $item->return_date }}</td>
                                                    <td>RM {{ number_format($item->amount, 2) }}</td>

                                                    <td>
                                                        <a class="btn btn-xs btn-info mb-1 btn-block text-white"
                                                            href="/claims/new/{{ $user->id }}/{{ $item->id }}">Claim</a>
                                                        <a class="btn btn-xs btn-success  btn-block" href="#">Print
                                                            Policy</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class=" card-footer">
                                    {{-- <a class="btn btn-primary" href="{{route('admin-insurance-company-new')}}">Add
                            New</a> --}}
                                    <div class="float-right">{{ $items->links() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-claim" role="tabpanel" aria-labelledby="pills-packages-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Insurance List</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Policy No</th>
                                                <th scope="col">Ref No</th>
                                                <th scope="col">Package</th>

                                                <th scope="col">Est. Amount</th>

                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; ?>
                                            @foreach ($claims as $item)

                                                <tr>
                                                    <th scope="row">{{ $count++ }}</th>
                                                    <td>{{ $item->InsuranceEnrollment->policy_no }}</td>
                                                    <td>{{ $item->reference_no }}</td>
                                                    <td>{{ $item->InsuranceEnrollment->Insurance->name }}</td>

                                                    <td>RM {{ number_format($item->amount, 2) }}</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <span class="badge badge-dark badge-sm">Pending Documents</span>
                                                        @elseif ($item->status == 2)
                                                            <span class="badge badge-success"> Pending Approval</span>
                                                        @elseif ($item->status == 3)
                                                            Processing
                                                        @elseif ($item->status == 4)
                                                            Approved
                                                        @elseif ($item->status == 99)
                                                            <span class="badge badge-danger"> Rejected </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <a class="btn btn-xs btn-danger"
                                                                href="/claims/documents/{{ $item->id }}">Upload
                                                                Documents</a>
                                                        @else
                                                            None
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class=" card-footer">
                                    {{-- <a class="btn btn-primary" href="{{route('admin-insurance-company-new')}}">Add
                            New</a> --}}
                                    <div class="float-right">{{ $items->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
