<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('includes.head')   
    </head>
    <body>
        <div class="page-wrap">
            <header class="page-row">
                @include('includes.header')
            </header>
            <div id="main" class="pagerow">
                @if(Session::has('msg'))
                    {{ Session::get('msg') }}
                @endif
                <!-- main content -->
                <div id="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <footer class="site-footer page-row">
            <div class="container">
                    @include('includes.footer')
            </div>
        </footer>
                @include('includes.js')
    </body>
</html>