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
            <div class="card-body">
                <h3 class="m-0">Fill in claims details</h3>
            </div>
                @include('public.layouts.notification')
            <div class="card-body">
                <form action="{{route('public.claim.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$enrollment->id}}">
                    <input type="hidden" name="user_id" value="{{$user->id}}">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Policy No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm" name="policy_no"
                                        value="{{$enrollment->policy_no}}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Travel Period</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm" name="plan"
                                        value="{{$enrollment->depart_date}} to {{$enrollment->return_date}}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Plan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm" name="plan"
                                        value="{{$enrollment->plan->name}}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($headcounts )
                    <label class="form-control-label form-control-sm">Additional Person Covered(s)</label>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NRIC/ID No</th>
                                <th scope="col">Name</th>
                                {{-- <th scope="col">Age</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($headcounts as $item)
                            <tr>
                                <th scope="row">{{$count++}}</th>
                                <td>{{$item->nric}}</td>
                                <td>{{$item->name}}</td>
                                <td></td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    @endif

                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Claim Type</label>

                        <select class="form-control" name="type_id">
                            <option value="">-Please select one-</option>
                            @foreach ($types as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="datepicker-container">
                                <div class="form-group">
                                    <label class="form-control-label form-control-sm">Accident Date</label>
                                    <div class="input-group">
                                    <input type="text" placeholder=""
                                        class="form-control datepicker"
                                        data-datepicker-color="primary" name="accident_date" required>
                                </div>
                            </div>
                        </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Estimated Amount (RM)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm" placeholder="E.G RM 1000"
                                        name="amount" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label form-control-sm">Description</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control  form-control-sm" name="description"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Bank Account No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm"
                                        placeholder="E.G 164400990099" name="account_no" required />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Bank Account Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control  form-control-sm"
                                        placeholder="E.G KHAIRUL AZMI IDRIS" name="account_name" required/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label form-control-sm">Bank Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="E.G Maybank"
                                        name="bank_name" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right pl-5 pr-5" type="submit">Next</button>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
@endsection



@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#plan').on('change', function() {
            if ( this.value == 2)
            {
                $("#child-div").show();
            }
            else
            {
                $("#child-div").hide();
            }
        });

        $("#region option").each(function(i){
            if (i>-1) {
                var title = $(this).attr("data-value");
                $(this).attr("title", title);
            }
        });
    });
</script>
@endsection
