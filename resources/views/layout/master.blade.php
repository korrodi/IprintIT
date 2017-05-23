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
                {{--  sidebar content --}}
                {{-- <div id="sidebar" class="col-md-4">@include('includes.sidebar')</div> --}}

                <!-- main content -->
                <div id="content">
                    @yield('landing')
                    <div class="container">
                            <div class="panel panel-default">
                                @yield('usersContent')
                            </div>
                            <div class="panel panel-default">
                                @yield('departmentsContent')

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
                @include('includes.js')

    </body>
</html>
