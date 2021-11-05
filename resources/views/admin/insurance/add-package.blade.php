@extends('admin.layouts.app')

@section('content')
    <div class="page-header" id="top">
        <h2 class="pageheader-title">Insurance Package Plan</h2>
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/insurance/product/edit/{{ $product->id }}"
                            class="breadcrumb-link">Insurance Products</a></li>
                    <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Package Plan</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Add Product Plan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input value="{{ $product->name }}" type="text" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Insurance Company</label>
                        <input value="{{ $product->company->name }}" type="text" class="form-control" readonly>
                    </div>
                </div>
            </div>
            @include('admin.layouts.notification')
            <div class="simple-card">
                <ul class="nav nav-tabs" id="myTab5" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab"
                            href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Normal Days Package
                            Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple"
                            role="tab" aria-controls="profile" aria-selected="false">More than 31 Days Price</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent5">
                    <div class="tab-pane fade active show" id="home-simple" role="tabpanel"
                        aria-labelledby="home-tab-simple">
                        <form action="{{ route('admin-insurance-product-add-package') }}" method="POST">
                            <input name="id" type="hidden" value="{{ $product->id }}" class="form-control">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control" name="region_id">
                                            @foreach ($regions as $item)
                                                <option value="{{ $item->id }}" selected>{{ $item->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Check Country</label>
                                        <button id="add-benefit" class="checkCountry text-white btn btn-primary" data-id="{{ $item->id }}">Check</button>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="description" type="text" class="form-control" required
                                            placeholder="E.G World wide except USA">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Plan</label>
                                        <select class="form-control" name="plan_id">
                                            @foreach ($plans as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Plan</label>
                                        <select class="form-control" name="category_plan_id">
                                            @foreach ($categoryplans as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Day</label>
                                        <input name="from_day" type="number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Day</label>
                                        <input name="to_day" type="number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount (RM)</label>
                                        <input name="price" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="add-benefit" class="text-white btn btn-primary">Add
                                New</button>
                        </form>
                        <div> &nbsp; </div>

                        <form action="{{ route('admin-insurance-product-package.filter') }}" method="POST">
                            @csrf
                            <label>Filter by : </label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input name="package_id" type="hidden" value="{{ $product->id }}"
                                            class="form-control">
                                        <select class="form-control" name="region_id">
                                            <option value=-1">Region</option>
                                            @foreach ($regions as $item)
                                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                        
                                        <select class="form-control" name="category_id">
                                            <option value=-1">Category Plan</option>
                                            @foreach ($categoryplans as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">                                       
                                        <select class="form-control" name="plan_id">
                                            <option value=-1">Plan</option>
                                            @foreach ($plans as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-sm btn-block"">Search</button>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </form>                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Category Plan</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Amount (RM)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($packages as $item)

                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->Region->description }}</td>
                                        <td>{{ $item->Plan->name }}</td>
                                        <td>{{ $item->CategoryPlan->category_name }}</td>
                                        <td>{{ $item->from_day }}</td>
                                        <td>{{ $item->to_day }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-dark mt-1"
                                                href="/admin/insurance/product/package/edit/{{ $product->id }}/{{ $item->id }}">Edit</a>
                                            <a class="deletePlanRecord btn btn-xs btn-danger mt-1" data-id="{{ $item->id }}"
                                                id="delete" href="#">Delete</a>
                                            <a class="btn btn-xs btn-dark mt-1"
                                                href="/admin/insurance/product/package/duplicate/{{ $product->id }}/{{ $item->id }}">Duplicate</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                        <form action="{{ route('admin-insurance-product-add-package-extra') }}" method="POST">
                            <input name="id" type="hidden" value="{{ $product->id }}" class="form-control">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <select class="form-control" name="region_id">
                                            @foreach ($regions as $item)
                                                <option value="{{ $item->id }}" selected>{{ $item->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="description" type="text" class="form-control" required
                                            placeholder="E.G World wide except USA">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Plan</label>
                                        <select class="form-control" name="plan_id">
                                            @foreach ($plans as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category Plan</label>
                                        <select class="form-control" name="category_plan_id">
                                            @foreach ($categoryplans as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount (RM)</label>
                                        <input name="price" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="add-benefit" class="text-white btn btn-primary">Add New</button>
                        </form>
                        <div> &nbsp; </div>

                        <form action="{{ route('admin-insurance-product-package.filter') }}" method="POST">
                            @csrf
                            <input name="package_id" type="hidden" value="{{ $product->id }}">
                            <label>Filter by : </label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">                                
                                        <select class="form-control" name="region_id">
                                            <option value=-1">Region</option>
                                            @foreach ($regions as $item)
                                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                        
                                        <select class="form-control" name="category_id">
                                            <option value=-1">Category Plan</option>
                                            @foreach ($categoryplans as $item)
                                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">                                       
                                        <select class="form-control" name="plan_id">
                                            <option value=-1">Plan</option>
                                            @foreach ($plans as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-sm btn-block">Search</button>
                                </div>
                               
                            </div>
                        </form>

                        <br><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    {{-- <th scope="col">Region/Destination</th> --}}
                                    <th scope="col">Description</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Category Plan</th>
                                    <th scope="col">Amount (RM)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach ($packageExtras as $item)

                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        {{-- <td>{{$item->Region->name}}</td> --}}
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->Region->description }}</td>
                                        <td>{{ $item->Plan->name }}</td>
                                        <td>{{ $item->CategoryPlan->category_name }}</td>
                                        <td>{{ $item->price_extra }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-dark mt-1"
                                                href="/admin/insurance/product/packageExtra/edit/{{ $product->id }}/{{ $item->id }}">Edit</a>
                                            <a class="deletePlanExtraRecord btn btn-xs btn-danger mt-1"
                                                data-id="{{ $item->id }}" id="delete" href="#">Delete</a>
                                            <a class="btn btn-xs btn-dark mt-1"
                                                href="/admin/insurance/product/packageExtra/duplicate/{{ $product->id }}/{{ $item->id }}">Duplicate</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $(document).ready(function() {
            $(".deletePlanRecord").click(function(e) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        e.preventDefault();
                        var id = $(this).data("id");
                        var token = $("input[name=_token]").val();
                        var product_id = $("input[name=id]").val();
                        console.log(id);
                        console.log(token);
                        console.log(product_id);
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin-insurance-product-delete-package') }}',
                            data: {
                                'id': id,
                                '_token': token,
                                'product_id': product_id
                            },
                            success: function(data) {
                                if (data.message == 'success') {
                                    location.reload();
                                }
                            },
                            error: function(jqXHR, textStatus,
                            errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' +
                                    errorThrown);
                            }
                        });
                    }
                })
            });

            $(".deletePlanExtraRecord").click(function(e) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        e.preventDefault();
                        var id = $(this).data("id");
                        var token = $("input[name=_token]").val();
                        var product_id = $("input[name=id]").val();
                        console.log(id);
                        console.log(token);
                        console.log(product_id);
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin-insurance-product-delete-package-extra') }}',
                            data: {
                                'id': id,
                                '_token': token,
                                'product_id': product_id
                            },
                            success: function(data) {
                                if (data.message == 'success') {
                                    location.reload();
                                }
                            },
                            error: function(jqXHR, textStatus,
                            errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' +
                                    errorThrown);
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
