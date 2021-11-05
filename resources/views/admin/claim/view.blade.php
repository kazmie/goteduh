@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Claim Details</h3>
    </div>
    <div class="card-body">
        
        <div class="card">
            <div class="card-header">
                <h5>Product Details</h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input
                        value="{{$claims->InsuranceEnrollment->insurance->name}} ({{$claims->InsuranceEnrollment->insurance->company->name}})"
                        type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Policy No</label>
                    <input value="{{$claims->InsuranceEnrollment->policy_no}}" type="text" class="form-control"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Travel Dates</label>
                    <input
                        value="{{$claims->InsuranceEnrollment->depart_date}} to {{$claims->InsuranceEnrollment->return_date}}"
                        type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Journey Type</label>
                    @if ($claims->InsuranceEnrollment->journey_type == 1)
                    <input value="One Way Trip" type="text" class="form-control" readonly>
                    @else
                    <input value="Return Trip" type="text" class="form-control" readonly>
                    @endif

                </div>

                <div class="form-group">
                    <label>Purpose</label>
                    @if ($claims->InsuranceEnrollment->purpose == 1)
                    <input value="Business" type="text" class="form-control" readonly>
                    @else
                    <input value="Social/Leisure" type="text" class="form-control" readonly>
                    @endif

                </div>
                <div class="form-group">
                    <label>Plan</label>
                    <input value="{{$claims->InsuranceEnrollment->plan->name}}" type="text" class="form-control"
                        readonly>
                </div>
                <div class="form-group">
                    <label>Price (RM)</label>
                    <input value="{{number_format($claims->InsuranceEnrollment->amount, 2)}}" type="text"
                        class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Traveller Details</h5>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label> Name</label>
                    <input value="{{$claims->InsuranceEnrollment->user->name}}" type="text" class="form-control"
                        readonly>
                </div>

                <div class="form-group">
                    <label>NRIC/Passport No</label>
                    <input value="{{$claims->InsuranceEnrollment->user->nric}}" type="text" class="form-control"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea type="text" class="form-control text-uppercase" rows="4" readonly>{{$claims->InsuranceEnrollment->user->address}}&#10;{{$claims->InsuranceEnrollment->user->address2}}&#10;{{$claims->InsuranceEnrollment->user->postcode}},{{$claims->InsuranceEnrollment->user->state}}
                    </textarea>
                </div>

               
                @if ($claims->InsuranceEnrollment->plan_coverage == 2)
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
                            @foreach ($claims->InsuranceEnrollment->InsuranceEnrollmentHeadcount as $item)
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

        <div class="card">
            <div class="card-header">
                Claims Documents
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Document Type</th>
                                <th scope="col">Document Link</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;?>
                            @foreach ($claims->ClaimDocuments as $item)
                            <tr>
                                <th scope="row">{{$count++}}</th>
                                <td>{{$item->ClaimDocumentType->name}}</td>
                                <td>
                                <a href="{{url('storage/claim/'. $item->filename)}}">{{$item->original_filename}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
           
            <input value="{{$claims->id}}" name="id" type="hidden" class="form-control" readonly>
            <div class="card-header">
                Claim Details
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Claim Type</label>
                    <input value="{{$claims->ClaimType->name}}" type=" text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Claim Reference No</label>
                    <input value="{{$claims->reference_no}}" type=" text" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Accident Date</label>
                    <input value="{{$claims->accident_date}}" type=" text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Estimated Amount (RM)</label>
                    <input value="{{number_format($claims->amount,2)}}" type=" text" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" class="form-control" readonly>{{$claims->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>
                        Status :
                        @if ($claims->status == 1)
                            <span class="badge badge-primary">New</span>
                        @elseif ($claims->status == 2)
                            <span class="badge badge-info">Document Uploaded</span>
                        @elseif ($claims->status == 3)
                            <span class="badge badge-info">Processing</span>
                        @elseif ($claims->status == 4)
                            <span class="badge badge-success">Approved</span>
                        @elseif ($claims->status == 99)
                            <span class="badge badge-danger">Rejected</span>
                        @endif
                    </label>                
                </div>              
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                Update Claim Status
            </div>
            <div class="card-body">
                <form action="{{route('admin.claim.updatestatus')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" value="{{ $claims->id }}" name="id">
                    <select class="form-control" id="input-select" name="status">
                        <option value="3" {{ $claims->status == 3 ? 'selected' : '' }}>Processing</option>
                        <option value="4" {{ $claims->status == 4 ? 'selected' : '' }}>Approve</option>
                        <option value="99" {{ $claims->status == 99 ? 'selected' : '' }}>Reject</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea type="text" name="remarks" class="form-control">{{$claims->remarks}}</textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        
    <div class="card-footer">
        <a class="btn btn-success float-middle pl-5 pr-5" href="{{route('public.home.download.claimpolicy')}}">View Policy</a>
    </div>
</div>
@endsection
