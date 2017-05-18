<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('includes.head')   
        {{-- @include('includes.js') --}}
    </head>

    <body>
        <div class="page-wrap">
            <header class="page-row">
                @include('includes.header')
            </header>
            <div id="main" class="pagerow">
                {{--  sidebar content --}}
                {{-- <div id="sidebar" class="col-md-4">@include('includes.sidebar')</div> --}}

                <!-- main content -->
                <div id="content">
                    <div class="container">
                            <div class="panel panel-default">
                                @yield('content')
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site-footer page-row">
            <div class="container">
                    @include('includes.footer')
            </div>
        </footer>
        @yield('js')
    </body>
</html>
