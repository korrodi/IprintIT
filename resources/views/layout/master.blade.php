<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('includes.head')   
        {{-- @include('includes.js') --}}
        
    </head>

    <body>
        <header class="page-row">
            @include('includes.header')
        </header>
            <div id="main" class="pagerow">
                {{--  sidebar content --}}
                {{-- <div id="sidebar" class="col-md-4">@include('includes.sidebar')</div> --}}

                <!-- main content -->
                <div id="content" class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="page-row">
                @include('includes.footer')
            </footer>

    </body>
</html>
