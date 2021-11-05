@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Company</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/insurance/company" class="breadcrumb-link">Insurance
                        Company</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">New</a></li>

            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">Insurance Company</div>

    <div class="card-body">

        @include('admin.layouts.notification')
        <form method="POST" action="{{route('admin-insurance-company-save')}}" enctype="multipart/form-data">

            @csrf

            <div class="md-col-12">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Company Name</label>
                    <input name="name" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address 1</label>
                    <input class="form-control" type="text" name="address1" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address 2</label>
                    <input class="form-control" type="text" name="address2" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address 3</label>
                    <input class="form-control" type="text" name="address3" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Postcode</label>
                            <input name="postcode" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <select class="form-control" name="state">
                                <option>JOHOR</option>
                                <option>KEDAH</option>
                                <option>KELANTAN</option>
                                <option>MELAKA</option>
                                <option>NEGERI SEMBILAN</option>
                                <option>PAHANG</option>
                                <option>PULAU PINANG</option>
                                <option>PERAK</option>
                                <option>PERLIS</option>
                                <option>SABAH</option>
                                <option>SARAWAK</option>
                                <option>SELANGOR</option>
                                <option>TERENGGANU</option>
                                <option>WILAYAH PERSEKUTUAN KUALA LUMPUR</option>
                                <option>WILAYAH PERSEKUTUAN LABUAN</option>
                                <option>WILAYAH PERSEKUTUAN PUTRAJAYA</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email address</label>
                            <input name="email" type="email" placeholder="name@example.com" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Phone No</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fax No</label>
                            <input name="fax" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Web URL</label>
                            <input name="web" type="text" class="form-control" placeholder="www.yourcompany.com">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Logo</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" for="customFile">Select company logo image</label>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>


</div>
@endsection