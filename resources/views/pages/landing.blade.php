@extends('master')

@section('landing')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active green">
                <img src="/images/background-image-01.png" alt="We work" align="right">
                <h2 class="h2-slide">Print<span class="text-black">IT</span><br>
                <span class="text-size-slide">READY TO COVER YOUR <span class="text-black">EVENT!</span></span></h2>
            </div>
            <div class="item orange">
                <img src="/images/background-image-03.jpg" alt="Power" align="right">
                <h2 class="h2-slide">Print<span class="text-black">IT</span><br>
                <span class="text-size-slide">READY TO COVER YOUR <span class="text-black">EVENT!</span></span></h2>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @include('models.statistics.index')
    @include('models.users.index')
    @include('models.departments.index')
@endsection