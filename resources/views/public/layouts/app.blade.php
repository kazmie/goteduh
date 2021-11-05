<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="icon" href="image/favicon.png" type="image/png"> --}}
    <title>GoTeduh</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/royal/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/royal/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/royal/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/royal/vendors/owl-carousel/owl.carousel.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/royal/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('vendor/royal/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/royal/vendors/bootstrap-datepicker/daterangepicker.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/royal/vendors/nice-select/css/nice-select.css') }}"> --}}
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('vendor/royal/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/royal/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    <style>
        body {
            background-color: whitesmoke;
        }

        ul.list-group.list-group-striped li:nth-of-type(even) {
            background: whitesmoke;
        }

        .custom-input {
            /* border: 1px solid lightgray; */
        }

    </style>
</head>

<body>
    @yield('content')

    {{-- footer --}}
    <footer class="footer-area section_gap mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">About goteduh</h6>
                        <p>GoTeduh helps you compare and purchase travel insurance with smart comparison technology. 
                            With just a few clicks, you’ll have your insurance quotation in no time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Navigation</h6>
                        <div class="row">
                            <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li><a href="#">Services</a></li>
                                    
                                </ul>
                            </div>
                            {{-- <div class="col-4">
                                <ul class="list_style">
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Contacts</h6>
                        <p><i class="fas fa-building mr-3"></i>Suite 2-1-4, 1st Flr, D'Vida Commercial Centre, Jalan Bazar U8/101, Bukit Jelutong, 40150 Shah Alam, Selangor</p>
                        <p><i class="fas fa-phone-square-alt mr-3"></i>+6 03-7848 1111</p>
                        <p><i class="fas fa-envelope-open mr-3"></i>support@goteduh.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('vendor/royal/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/mail-script.js') }}"></script>
    {{-- <script src="{{ asset('vendor/royal/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/royal/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/vendors/bootstrap-datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/vendors/bootstrap-datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/royal/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/stellar.js') }}"></script>
    <script src="{{ asset('vendor/royal/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/royal/js/custom.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        AOS.init({
            duration: 1000
        });
    </script>
    @yield('script')
</body>

</html>
