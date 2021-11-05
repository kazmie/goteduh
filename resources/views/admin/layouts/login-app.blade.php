<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyTeduh</title>
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/circular-std/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/libs/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="dashboard-main-wrapper">

        <div class="dashboard-wrapper">
            <div class="container">
                <main>
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="{{asset("vendor/concept/assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/vendor/slimscroll/jquery.slimscroll.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/libs/js/main-js.js")}}"></script>

    @yield('script')

</body>

</html>
