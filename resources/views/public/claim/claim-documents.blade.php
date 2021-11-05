@extends('public.layouts.app')

@section('content')

@include('public.layouts.header')     
<div class="container mt-5 pt-5">
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>User Information </h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5 class="m-0">Name</h5>
                        <p>
                            {{$user->name}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <h5 class="m-0">NRIC/ID No</h5>
                        <p>{{$user->nric}}</p>
                    </li>
                    <li class="list-group-item">
                        <h5 class="m-0">Contact No</h5>
                        <p>{{$user->contact}}</p>
                    </li>

                    <li class="list-group-item">
                        <h5 class="m-0">Email</h5>
                        <p>{{$user->email}}</p>
                    </li>

                    <li class="list-group-item">
                        <h5 class="m-0">Address</h5>
                        <p>
                            {{$user->address}} <br>
                            {{$user->address2}} <br>
                            {{$user->postcode}}, {{$user->city}} <br>
                            {{$user->state}}
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Upload Documents</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label class="form-control-label form-control-sm">Reference No</label>
                    <div class="input-group">
                        <input type="text" class="form-control  form-control-sm" value="{{$claim->reference_no}}"
                            readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-control-label form-control-sm">Claim Type</label>
                    <div class="input-group">
                        <input type="text" class="form-control  form-control-sm" value="{{$claim->ClaimType->name}}"
                            readonly />
                    </div>
                </div>
                <br>
                <label class="form-control-label form-control-sm">Document Required</label>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Document</th>
                            <th scope="col"></th>
                            {{-- <th scope="col">Age</th> --}}
                        </tr>
                    </thead> 
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($documents as $item)
                        <form action="{{route('public.claim.save.documents')}}" method="post"
                            enctype="multipart/form-data">
                            <tr>
                                <th scope="row">{{$count++}}</th>
                                <td>
                                    @csrf
                                    {{$item->ClaimDocumentType->name}}
                                    <input type="hidden" name="claim_id" value="{{$claim->id}}">
                                    <input type="hidden" name="claim_type_id" value="{{$item->claim_document_type_id}}">

                                    @if ($item->filename)
                                    <a href="{{url('storage/claim/'.$item->filename)}}">
                                        <div class="f-icon"><i class="fas fa-check"></i>
                                            {{$item->original_filename}}</div>
                                    </a>
                                    @endif

                                    <input type="file" class="form-control mt-1 mb-1" name="document" required>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-secondary btn-sm">Upload</button>
                                </td>
                                <td></td>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                <br>
            <form action="{{route('public.claim.complete')}}" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            @csrf
                            <input type="hidden" name="id" value="{{$claim->id}}" readonly />
                            <button type="submit" class="btn btn-primary btn-sm">Submit For Claims</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')

@endsection
