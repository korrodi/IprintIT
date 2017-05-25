
<nav class="navbar navbar-default navbar-static-top">
    
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Top Navbar -->
            <div class="navbar-top">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Authentication Links -->
                    <li><a href="tel:917253044"><i class="fa fa-phone" aria-hidden="true"></i>917253044</a></li>
                    <li><a href="mailto:iprintit.ainet@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>iprintit.ainet@gmail.com</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="{{-- route('users.show',[Auth::user()->id]) --}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(isset(Auth::user()->profile_photo))
                                    <img src="profiles/{{ Auth::user()->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>

                                @else
                                    <img class="group list-group-image" src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                                @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>            
    </div>
    <div class="container">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a href="{{ url('/') }}" alt="{{ config('app.name') }}">              
                    <img src="/images/logo/printIt-logo.svg" onerror="this.onerror=null; this.src='/images/logo/printIt-logo.png'" class="logo">
                </a>
            </div>
            <!-- Navbar -->
            <ul class="nav navbar-nav navbar-menu">
                    <li><a href="#statistics{{-- route('departments.list') --}}">Statistics</a></li>
                    <li style="margin-left: auto !important;"><a href="#users{{-- route('users.list') --}}">Users</a></li>
                    <li style="margin-left: auto !important;"><a href="#departments{{-- route('departments.list') --}}">Departments</a></li>
                    <li style="margin-left: auto !important;"><a href="#">Contacts</a></li>
            </ul>
        </div>
    </div>
</nav>