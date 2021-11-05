@extends('admin.layouts.app')

@section('content')
<div class="page-header" id="top">
    <h2 class="pageheader-title">Insurance Company</h2>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="" class="breadcrumb-link">Insurance Company</a></li>

            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header">Insurance Company</div>

    <div class="card-body">

        @include('admin.layouts.notification')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Fax</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                @foreach ($items as $item)

                <tr>
                    <th scope="row">{{$count++}}</th>
                    <td>
                        <a href="{{url('storage/logo/'. $item->image_url)}}">
                            <img style="width:100px" src="{{url('storage/logo/'. $item->image_url)}}" alt="">
                        </a>
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address1}} {{$item->address2}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->fax}}</td>
                    <td>{{$item->email}}</td>
                    <td><a class="btn btn-xs btn-dark" href="/admin/insurance/company/edit/{{$item->id}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class=" card-footer">
        <a class="btn btn-primary" href="{{route('admin-insurance-company-new')}}">Add New</a>
        <div class="float-right">{{$items->links()}}</div>
    </div>
</div>
@endsection
