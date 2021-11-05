<nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent " color-on-scroll="500">
    <div class="container">
        <div class="navbar-translate">
            {{-- <a class="navbar-brand">
                <img style="width:100px" src="{{asset('img/my-teduh-logo-white.png')}}" />
            </a> --}}

            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation"
            data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                        <i class="now-ui-icons ui-2_favourite-28"></i>
                        <p>Why Us?</p>
                    </a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="{{route('public.claim')}}">
                            <i class="now-ui-icons education_paper"></i>
                            <p>Claims</p>
                        </a>
                    </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
                        <i class="now-ui-icons design_app"></i>
                        <p>Products</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                        <a class="dropdown-item" href="#">
                            <i class="now-ui-icons arrows-1_minimal-right"></i>Motor
                        </a>
                        <a class="dropdown-item" target="_blank" href="#">
                            <i class="now-ui-icons arrows-1_minimal-right"></i> General
                        </a>

                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-round btn-neutral"
                        href="#" target="_blank">
                        <p>Partner Login</p>
                    </a>
                </li>



            </ul>
            <div class="ml-5">
                <a href="{{route('public.home')}}">
                    <img style="width:100px" src="{{asset('img/myteduh-logo-oren.png')}}" />
                </a>
            </div>

        </div>
    </div>
</nav>
