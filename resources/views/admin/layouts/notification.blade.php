@if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{Session::get('message')}}
        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </a>
    </div>
@endif