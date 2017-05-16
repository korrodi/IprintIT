<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}">Logout</a>
                <a href="{{ url('/logout') }}">
                @if(isset(Auth::user()->profile_photo))
                    <img src="profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" />

                @else
                    <img class="group list-group-image" src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" />
                @endif
                {{ Auth::user()->name }}</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif

            <a href="{{ url('/users') }}">users</a>
        </div>
    @endif
</div>
