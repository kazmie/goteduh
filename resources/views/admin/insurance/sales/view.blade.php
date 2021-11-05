@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Coverage Details</h3>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <h5>Product Details</h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input value="{{$enrollment->insurance->name}} ({{$enrollment->insurance->company->name}})"
                        type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Policy No</label>
                    <input value="{{$enrollment->policy_no}}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Travel Dates</label>
                    <input value="{{$enrollment->depart_date}} to {{$enrollment->return_date}}" type="text"
                        class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Journey Type</label>
                    @if ($enrollment->journey_type == 1)
                    <input value="One Way Trip" type="text" class="form-control" readonly>
                    @else
                    <input value="Return Trip" type="text" class="form-control" readonly>
                    @endif
                   
                </div>

                <div class="form-group">
                        <label>Purpose</label>
                        @if ($enrollment->purpose == 1)
                        <input value="Business" type="text" class="form-control" readonly>
                        @else
                        <input value="Social/Leisure" type="text" class="form-control" readonly>
                        @endif
                       
                    </div>
                <div class="form-group">
                    <label>Plan</label>
                    <input value="{{$enrollment->plan->name}}" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Price (RM)</label>
                    <input value="{{number_format($enrollment->amount, 2)}}" type="text" class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Traveller Details</h5>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Name</label>
                    <input value="{{$enrollment->user->name}}" type="text" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>NRIC/Passport No</label>
                    <input value="{{$enrollment->user->nric}}" type="text" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea type="text" class="form-control text-uppercase" rows="4" readonly>{{$enrollment->user->address}}&#10;{{$enrollment->user->address2}}&#10;{{$enrollment->user->postcode}},{{$enrollment->user->state}}
                    </textarea>
                </div>

                @if ($enrollment->plan_coverage == 2)
                <h5>Additional Family Details :</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">NRIC/Passport No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollment->InsuranceEnrollmentHeadcount as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->nric}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="#" class="btn btn-success float-right">Print Policy</a>
    </div>
</div>
@endsection