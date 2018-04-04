<nav class="navbar  navbar-expand-lg navbar-dark bg-dark" >
            <div class="container">
                <a class="navbar-brand custom" href="{{ url('/home') }}">
                    {{ config('app.name', 'Home') }}
                </a>
                 @guest
                 <a class="nav-link myg" href="{{ route('login') }}">Prisijungti</a>
                 @else
                 <a class="nav-link myg" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Atsijungti
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{ route('cars.index') }}">Automobiliai</a></li>
                        <li><a class="nav-link" href="{{-- route('contact') --}}">Kontaktai</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                            @if(Auth::check())
                            <li><a class="nav-link" href="{{-- route('reservations.index') --}}">Rezervacijos</a></li>
                            <li><a class="nav-link" href="{{-- route('orders.index') --}}">Orders</a></li>
                            @endif

                        <!-- Authentication Links -->
                        @guest

                           

                          

                            

                            <li><a class="nav-link" href="{{-- route('register')--}}">Registruotis</a></li>
                        @else
                            <li class="nav-item dropdown">


                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(Auth::check() && Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{-- route('users.index') --}}">
                                        Users
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="{{-- route('users.edit', Auth::user()->id) --}}">
                                        My profile
                                    </a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Atsijungti
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        @endguest
                            <li id="cart">
                                <a class="nav-link" href="{{--  route('cart') --}}">
                                    Cart (<span id="cart_size" class="cart-size">{{--Cart::count(csrf_token())--}}</span>)
                                    <small>
                                        <span id="cart_total" class="cart-total">{{--Cart::total(csrf_token())--}}</span>
                                    </small>
                                </a>
                            </li>
                    </ul>
                </div>
               
            </div>
        </nav>

