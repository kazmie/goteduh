@extends('public.layouts.app')

@section('content')

    @include('public.layouts.header')
    <div class="container mt-5 pt-5">
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <span><strong>Travellers Details</strong></span>
                <div class="progress mt-2" style="height: 5px">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100" style="width: 50%;">
                        <span class="progress-value"></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- progress end --}}
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Plan
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            {{-- <li class="list-group-item">
                                <h5 class="m-0">Destination/Region</h5>
                                <p>
                                    {{$items['region_name']}}
                                </p>
                            </li> --}}
                            <li class="list-group-item">
                                <h5 class="m-0">Travel Date</h5>
                                <p>{{ $items['departure'] }} to {{ $items['arrival'] }}</p>
                            </li>
                            <li class="list-group-item">
                                <h5 class="m-0">Plan</h5>
                                @if ($items['plan'] == 1)
                                    <p>Individual</p>
                                @else
                                    <p>Family</p>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Journey</h5>
                                @if ($items['journey'] == 1)
                                    <p>One Way</p>
                                @else
                                    <p>Return</p>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <h5 class="m-0">Purpose</h5>
                                @if ($items['purpose'] == 1)
                                    <p>Business</p>
                                @else
                                    <p>Social/Leisure</p>
                                @endif
                            </li>
                            <li class="list-group-item bg-danger m-0 p-0 text-center">
                                <h1 class="text-white mt-2"><small>RM </small>{{ number_format($items['price'], 2) }}</h1>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                {{-- search card --}}
                <div class="accrodion-regular">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header bg-dark" id="headingOne">
                                <a class="btn collapsed text-white" data-toggle="collapse" role="button"
                                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Existing MyTeduh customer ?
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    <form action="{{ route('public.search.detail') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input name="searchNric" type="text" placeholder="Search by NRIC/Passport No"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <button type="submit"
                                            class="genric-btn danger circle mb-3 pl-5 pr-5">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- search card --}}

                <br>
                <form action="{{ route('public.payment') }}" method="POST">
                    @csrf
                    {{-- personal detail card --}}
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Traveller Details
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="col-form-label text-dark">Name</label>
                                <input name="name" type="text" value="{{ $user->name }}"
                                    class="form-control text-uppercase" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DOCUMENT TYPE</label>
                                        <select class="form-control" id="id_type">
                                            <option value="1" selected>NRIC</option>
                                            <option value="2">OLD NRIC</option>
                                            <option value="3">ARMY IC</option>
                                            <option value="4">POLICE IC</option>
                                            <option value="5">PASSPORT</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label text-dark">NRIC/PASSPORT NO</label>
                                        <input id="nric" name="nric" type="text" value="{{ $user->nric }}"
                                            class="form-control  text-uppercase" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label text-dark">Date of Birth</label>
                                        <input type="text" class="form-control datepicker" id="birthdate" name="birthdate"
                                            data-datepicker-color="primary" value="{{ $user->birthdate }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>MALE</option>
                                            <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>FEMALE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label text-dark">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label text-dark">Contact No</label>
                                        <input type="text" name="contact" class="form-control"
                                            value="{{ $user->contact }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- personal detail card --}}
                    {{-- mailing --}}
                    <div class="card mt-1 pt-0">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label text-dark">Address 1</label>
                                <textarea name="address1" type="text" placeholder=""
                                    class="form-control form-control-sm text-uppercase"
                                    required>{{ $user->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label text-dark">Address 2</label>
                                <textarea name="address2" type="text" placeholder=""
                                    class="form-control form-control-sm text-uppercase">{{ $user->address2 }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Postcode</label>
                                    <input id="postcode" type="text" class="form-control text-uppercase" name="postcode"
                                        value="{{ $user->postcode }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">City</label>
                                    <input id="city" type="text" class="form-control text-uppercase" name="city"
                                        value="{{ $user->city }}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="state" name="state" class="form-control">
                                        @if ($user->state)
                                            <option value="{{ $user->state }}" selected>{{ $user->state }}</option>
                                        @endif
                                        <option value="JOHOR" {{ $user->state == 'JOHOR' ? 'selected' : '' }}>JOHOR
                                        </option>
                                        <option value="KEDAH" {{ $user->state == 'KEDAH' ? 'selected' : '' }}>KEDAH
                                        </option>
                                        <option value="KELANTAN {{ $user->state == 'KELANTAN' ? 'selected' : '' }}">
                                            KELANTAN</option>
                                        <option value="MELAKA {{ $user->state == 'MELAKA' ? 'selected' : '' }}">MELAKA
                                        </option>
                                        <option value="NEGERI SEMBILAN"
                                            {{ $user->state == 'NEGERI SEMBILAN' ? 'selected' : '' }}>NEGERI SEMBILAN
                                        </option>
                                        <option value="PAHANG" {{ $user->state == 'PAHANG' ? 'selected' : '' }}>PAHANG
                                        </option>
                                        <option value="PULAU PINANG"
                                            {{ $user->state == 'PULAU PINANG' ? 'selected' : '' }}>PULAU PINANG</option>
                                        <option value="PERAK" {{ $user->state == 'PERAK' ? 'selected' : '' }}>PERAK
                                        </option>
                                        <option value="PERLIS" {{ $user->state == 'PERLIS' ? 'selected' : '' }}>PERLIS
                                        </option>
                                        <option value="SABAH" {{ $user->state == 'SABAH' ? 'selected' : '' }}>SABAH
                                        </option>
                                        <option value="SARAWAK" {{ $user->state == 'SARAWAK' ? 'selected' : '' }}>SARAWAK
                                        </option>
                                        <option value="SELANGOR" {{ $user->state == 'SELANGOR' ? 'selected' : '' }}>
                                            SELANGOR</option>
                                        <option value="TERENGGANU" {{ $user->state == 'TERENGGANU' ? 'selected' : '' }}>
                                            TERENGGANU</option>
                                        <option value="WP KUALA LUMPUR"
                                            {{ $user->state == 'WP KUALA LUMPUR' ? 'selected' : '' }}>
                                            WP KUALA LUMPUR</option>
                                        <option value="WP LABUAN" {{ $user->state == 'WP LABUAN' ? 'selected' : '' }}>WP
                                            LABUAN</option>
                                        <option value="WP PUTRAJAYA"
                                            {{ $user->state == 'WP PUTRAJAYA' ? 'selected' : '' }}>
                                            WP PUTRAJAYA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- mailing end --}}

                    {{-- adult list --}}

                    @if ($items['adult'] > 1)
                        <br>
                        @for ($i = 1; $i < $items['adult']; $i++)
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn text-left" data-toggle="collapse"
                                        href="#collapseAdult{{ $i }}" role="button" aria-expanded=""
                                        aria-controls="collapseMailing">
                                        + Adults Traveller {{ $i }}
                                    </a>
                                    <div class="collapse" id="collapseAdult{{ $i }}">

                                        <div class="form-group">
                                            <label class="col-form-label text-dark">Name</label>
                                            <input name="adultName[]" type="text" class="form-control " required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">NRIC/ID</label>
                                                    <select class="form-control" id="id_type">
                                                        <option value="1" selected>NRIC</option>
                                                        <option value="2">OLD NRIC</option>
                                                        <option value="3">ARMY IC</option>
                                                        <option value="4">POLICE IC</option>
                                                        <option value="5">PASSPORT</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label text-dark">NRIC/ID No</label>
                                                    <input id="adultNric{{ $i }}" name="adultNric[]" type="text"
                                                        class="form-control form-control-sm" required
                                                        onfocusout="getAdultNric({{ $i }})">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label text-dark">Birth Date</label>
                                                    <input id="adultBirthdate{{ $i }}" type="text"
                                                        class="form-control datepicker" name="adultBirthdate[]"
                                                        data-datepicker-color="primary" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Gender</label>
                                                    <select id="adultGender{{ $i }}" class="form-control"
                                                        name="adultGender[]">
                                                        <option value="1" selected>MALE</option>
                                                        <option value="2">FEMALE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endif
                    {{-- adult list end --}}

                    {{-- child list --}}
                    @if ($items['child'] > 0)
                        <br>
                        @for ($i = 0; $i < $items['child']; $i++)
                            <div class="card">
                                <div class="card-body">
                                    <a class="btn text-left" data-toggle="collapse"
                                        href="#collapseChild{{ $i }}" role="button" aria-expanded=""
                                        aria-controls="collapseMailing">
                                        + Child Traveller {{ $i + 1 }}
                                    </a>
                                    <div class="collapse" id="collapseChild{{ $i }}">
                                        <div class="form-group">
                                            <label class="col-form-label text-dark">Name</label>
                                            <input name="childName[]" type="text" class="form-control form-control-sm"
                                                required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">NRIC/ID</label>
                                                    <select class="form-control" id="id_type">
                                                        <option value="1" selected>NRIC</option>
                                                        <option value="2">OLD NRIC</option>
                                                        <option value="3">ARMY IC</option>
                                                        <option value="4">POLICE IC</option>
                                                        <option value="5">PASSPORT</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label text-dark">NRIC/ID No</label>
                                                    <input id="childNric{{ $i }}" name="childNric[]" type="text"
                                                        class="form-control form-control-sm" required
                                                        onfocusout="getChildNric({{ $i }})">
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label text-dark">Birth Date</label>
                                                    <input id="childBirthdate{{ $i }}" type="text"
                                                        class="form-control datepicker" name="childBirthdate[]"
                                                        data-datepicker-color="primary" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Gender</label>
                                                    <select id="childGender{{ $i }}" class="form-control"
                                                        name="childGender[]">
                                                        <option value="1" selected>MALE</option>
                                                        <option value="2">FEMALE</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endif
                    {{-- child list end --}}

                    {{-- next of kin --}}
                    <br>
                    <div class="card mt-1 mb-5 pt-0">
                        <div class="card-header bg-dark text-white">
                            Next Of Kin Details
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label text-dark">Name</label>
                                <input name="nextOfKinName" type="text" class="form-control form-control-sm text-uppercase"
                                    required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label text-dark">Contact No</label>
                                <input type="text" class="form-control text-uppercase" name="nextOfKinContact" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="genric-btn danger circle pl-5 pr-5">Next</button>
                            <br><small><span class="text-danger">*Please check all Travellers details is
                                    correct</span></small>
                        </div>
                    </div>
                    {{-- next of kin end --}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getGender(ic) {
            if (ic.match(/^(\d{2})(\d{2})(\d{2})(\d{2})(\d{4})$/)) {
                var gender = RegExp.$5;

                if (gender % 2)
                    return 1; //female
                return 2;
            } else {
                return null;
            }
        }

        function geBirthDate(ic) {
            if (ic.match(/^(\d{2})(\d{2})(\d{2})(\d{2})(\d{4})$/)) {
                var year = RegExp.$1;
                var month = RegExp.$2;
                var day = RegExp.$3;
                var country = RegExp.$4;
                var gender = RegExp.$5;

                var now = new Date().getFullYear().toString();

                var decade = now.substr(0, 2);
                if (now.substr(2, 2) > year) {
                    year = parseInt(decade.concat(year.toString()), 10);
                }

                var date = new Date(year, (month - 1), day);

                return date;
            } else {
                return null;
                // not a proper IC format
            }
        }

        function getAdultNric(id) {
            console.log(id);
            var nric = $('#adultNric' + id).val();
            var birthDate = geBirthDate(nric);
            console.log(birthDate);
            $('#adultBirthdate' + id).datepicker("update", birthDate);
            var gender = getGender(nric);
            if (gender) {
                $('#adultGender' + id).val(gender);
            }
        }

        function getChildNric(id) {
            console.log(id);
            var nric = $('#childNric' + id).val();
            var birthDate = geBirthDate(nric);
            console.log(birthDate);
            $('#childBirthdate' + id).datepicker("update", birthDate);
            var gender = getGender(nric);
            if (gender) {
                $('#childGender' + id).val(gender);
            }
        }

        $(document).ready(function() {
            $("#nric").focusout(function() {
                var nric = $('#nric').val();
                var birthDate = geBirthDate(nric);
                console.log(birthDate);
                $('#birthdate').datepicker("update", birthDate);
                var gender = getGender(nric);
                if (gender) {
                    $('#gender').val(gender);
                }
            });


            $("#postcode").focusout(function() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ asset('storage/postcode.json') }}",
                    complete: function(data) {
                        console.log(data.responseJSON);
                        var allPostcodes = data.responseJSON.state;
                        let result = {
                            found: false
                        };
                        var postcode = $('#postcode').val();
                        console.log(postcode);
                        $('#city').val('');
                        $('#state').val('');
                        // find state and city based on postcode
                        allPostcodes.filter(state => {
                            state.city.map(city => {
                                if (city.postcode.includes(postcode)) {
                                    result.found = true;
                                    result.state = state.name;
                                    result.city = city.name;

                                    $('#city').val(city.name);
                                    $('#state').val(state.name.toUpperCase());
                                }
                            });
                        });
                        console.log(result);
                        return result;

                    }
                });
            });
        })
    </script>
@endsection
