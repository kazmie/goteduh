<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyTeduh</title>
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/circular-std/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/libs/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">

    {{--<link href="{{asset('vendor/now-ui/assets/css/bootstrap.min.css')}}" rel="stylesheet" /> --}}
        {{--<link href="{{asset('vendor/now-ui/assets/css/now-ui-kit.min.css')}}" rel="stylesheet" /> --}}

</head>
<body>

    @include('public.layouts.main-nav')

    <div class="container">
        <main>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script src="{{asset("vendor/concept/assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/vendor/slimscroll/jquery.slimscroll.js")}}"></script>
    <script src="{{asset("vendor/concept/assets/libs/js/main-js.js")}}"></script>
    <!--   Core JS Files   -->
     <script src="{{asset("vendor/now-ui/assets/js/core/jquery.min.js")}}" type="text/javascript"></script>
     <script src="{{asset("vendor/now-ui/assets/js/core/popper.min.js")}}" type="text/javascript"></script>
     <script src="{{asset("vendor/now-ui/assets/js/core/bootstrap.min.js")}}" type="text/javascript"></script>

    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
     <script src="{{asset("vendor/now-ui/assets/js/plugins/bootstrap-switch.js")}}"></script> --}}

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
     <script src="{{asset("vendor/now-ui/assets/js/plugins/nouislider.min.js")}}" type="text/javascript"></script>


    <!--  Google Maps Plugin    -->
     <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}


    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
     <script src="{{asset("vendor/now-ui/assets/js/now-ui-kit.js")}}" type="text/javascript"></script>

     <script src="{{asset("vendor/concept/assets/vendor/datepicker/datepicker.js")}}" type="text/javascript"></script>

     <script src="{{asset("vendor/concept/assets/vendor/datepicker/moment.js")}}"></script>
     <script src="{{asset("vendor/concept/assets/vendor/datepicker/tempusdominus-bootstrap-4.js")}}"></script>
     <script src="{{asset("vendor/now-ui/assets/js/plugins/bootstrap-datepicker.js")}}" type="text/javascript"></script>
    <script src="{{asset("vendor/datepicker/js/bootstrap-datepicker.js")}}"></script>

    <script>
       $(function () {
            $('.selectpicker').selectpicker();
        });
        function scrollToDownload() {
                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }

            $('.date-picker').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                todayBtn: "linked",
            });
    </script>


    @yield('script')

</body>

</html>
