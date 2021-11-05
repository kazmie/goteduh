@extends('admin.layouts.app')

@section('content')

    <style>
        @media screen {
            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 500;
                src: local('Cabin Medium'), local('Cabin-Medium'), url('http://themes.googleusercontent.com/static/fonts/cabin/v4/km2iCywk7CnC11BE8pBNVPesZW2xOQ-xsNqO47m55DA.woff') format('woff');
            }
        }

        .page-count {
            font-family: 'Cabin', sans-serif;
            font-size: 1em;
            padding: 20px
        }

    </style>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">MyTeduh Dashboard </h2>
                <div class="float-right"></div>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">MyTeduh Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="ecommerce-widget">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Number Of Sales <b>
                                <p id="demo"></p>
                            </b></h5>
                        {{ csrf_field() }}
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1"> {{ $countSales }} </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Total Sales <b>
                                <p id="demo1"></p>
                            </b></h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">RM {{ number_format($totalsales, 2) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Number Of Claims <b>
                                <p id="demo2"></p>
                            </b></h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $countClaims }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Total Claims <b>
                                <p id="demo3"></p>
                            </b></h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">RM {{ number_format($totalClaims, 2) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Products</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $countProduct }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Companies</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $countCompany }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Users</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{ $countUser }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <h5 class="text-muted">Total Visitors</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">
                                <script type="text/javascript">
                                    if (localStorage.pagecount) {
                                        localStorage.pagecount = Number(localStorage.pagecount) + 1;
                                    } else {
                                        localStorage.pagecount = 1;
                                    }
                                    document.write(localStorage.pagecount);
                                </script>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Recent Sales</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Policy No</th>
                                        <th class="border-0">Product Name</th>
                                        <th class="border-0">Package</th>
                                        <th class="border-0">Plan</th>
                                        <th class="border-0">Enroll Date</th>
                                        <th class="border-0">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($items as $item)

                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $item->policy_no }}</td>
                                            <td>{{ $item->insurance->name }}</td>
                                            <td>{{ $item->insurance->name }}</td>
                                            <td>{{ $item->plan->name }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>RM {{ number_format($item->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Recent Claims</h5>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Policy No</th>
                                        <th class="border-0">Product Name</th>
                                        <th class="border-0">Claim Type</th>
                                        <th class="border-0">Plan</th>
                                        <th class="border-0">Departure</th>
                                        <th class="border-0">Return</th>
                                        <th class="border-0">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($item1 as $item)

                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $item->InsuranceEnrollment->policy_no }}</td>
                                            <td>{{ $item->InsuranceEnrollment->insurance->name }}</td>
                                            <td>{{ $item->ClaimType->name }}</td>
                                            <td>{{ $item->InsuranceEnrollment->plan->name }}</td>
                                            <td>{{ $item->InsuranceEnrollment->depart_date }}</td>
                                            <td>{{ $item->InsuranceEnrollment->return_date }}</td>
                                            <td>RM {{ number_format($item->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- </div>
            </div>
        </div>
    </div> --}}

    <script>
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";

        var d = new Date();
        var n = month[d.getMonth()];
        document.getElementById("demo").innerHTML = n;
        document.getElementById("demo1").innerHTML = n;
        document.getElementById("demo2").innerHTML = n;
        document.getElementById("demo3").innerHTML = n;
    </script>
    {{-- {!! Charts::scripts() !!}
    {!! $saleschart->script() !!}
    {!! $claimschart->script() !!}
    {!! $Claims_pie_chart->script() !!}
    {!! $Insurances_pie_chart->script() !!} --}}
@endsection
