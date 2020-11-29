<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src='{{ asset("images/logo.png") }}' class="mobile_logo_width"
                                                  alt="img"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontSite.home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('blog') ? 'active' : '' }}">
                        <a class="nav-link" href='{{ route('frontSite.blog') }}'>Blog <span class="sr-only">(current)</span></a>

                    </li>
                    <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('single') ? 'active' : '' }}">
                        <a class="nav-link" href='{{ route('frontSite.single') }}'>Single <span class="sr-only">(current)</span></a>
                    </li>

{{--                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">World <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>--}}

{{--                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Community<span
                                class="sr-only">(current)</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                            <a class="dropdown-item" href="#">Action in</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>--}}

                    <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href='{{ route('frontSite.contact') }}'>Contact <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
