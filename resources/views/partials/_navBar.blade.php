<div id="header" class="fixed-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="{{ route('home') }}">DC<span>AL</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                {{-- <a href="index.html" class="logo mr-auto"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a> --}}

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('mou') }}">M0U</a></li>
                        @guest
                            <li class="drop-down"><a href="#"><i class="icofont-ui-user icofont-lg"></i></a>
                                <ul>
                                    <li class="">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="drop-down dropdown">
                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre> <i class="icofont-ui-user icofont-lg"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav><!-- .nav-menu -->
                @yield('navBtn')

            </div>
        </div>
    </div>
</div>
