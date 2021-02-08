<div class="flash">
    <div class="container">
        {{-- display errors --}}
        @include('partials.errors')

       

    </div>
</div>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            {{--<span class="navbar-toggler-icon"></span>--}}
            <i class="fas fa-bars"></i>
        </button>

        @include('partials.search')


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-lik-login" href="{{ route('login') }}">{{ __('Prihlásenie') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link nav-lik-register" href="{{ route('register') }}">{{ __('Registrácia') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ url('user/' . Auth::user()->id . '/' . strtolower( urlencode( iconv("UTF-8", "ASCII//TRANSLIT", Auth::user()->name)) ))   }}">
                                {{ __('Moje recepty') }}
                            </a>
                            
                            @if(Auth::user()->hasRole('administrator'))
                                <a class="dropdown-item" href="{{  url('admin/all')  }}">
                                    {{ __('Admin-portal') }}
                                </a>
                            @endif
                            
                            @if(Auth::user()->hasRole('administrator'))
                                <a class="dropdown-item" href="{{  route('blog')  }}">
                                    {{ __('Blog') }}
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ url('user/' . Auth::user()->id . '/' . strtolower( urlencode( iconv("UTF-8", "ASCII//TRANSLIT", Auth::user()->name)) )) . '/edit-profil'   }}">
                                {{ __('Môj profil') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Odhlásiť') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>



        </div>

    </div>
</nav>
