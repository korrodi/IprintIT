@extends('layout.master')

@section('landing')
<div class="panel-body dad">
@if(isset($statisticData))
        <div class="row" style="margin: 60px 0; text-align: center;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p style="color: #fcfcfc; font-weight: 700; font-size: 36px; font-family: 'Karla', san-serif;">FUN FACTS<span style="font-size: 16px; font-family: 'Karla', san-serif;"><br/>LETS SEE OUR SOME HISTORY OF OURS</span></p>
                </div>
        </div>
        <div class="row" style="margin: 60px 0; text-align: center;">
                <div class="col-md-15 col-xs-3" style="text-align: center;">
                                <a class="fig">
                                        <div id="shiva"><span class="count">{{ $statisticData['totalImpressoes'] }}</span></div>
                                        <span style="font-size: 14px; font-family: 'Karla', san-serif;"><br/>Total Impressoes</span>
                                </a>
                </div>
                <div class="col-md-15 col-xs-3" style="text-align: center;">
                                <a class="fig">
                                        <div id="shiva"><span class="count">{{ $statisticData['cores'] }}</span></div>
                                        <span style="font-size: 14px; font-family: 'Karla', san-serif;"><br/>Cores</span>
                                </a>
                </div>
                <div class="col-md-15 col-xs-3" style="text-align: center;">
                                <a class="fig">
                                        <div id="shiva"><span class="count">{{ $statisticData['pb'] }}</span></div>
                                        <span style="font-size: 14px; font-family: 'Karla', san-serif;"><br/>pb</span>
                                </a>
                </div>
                <div class="col-md-15 col-xs-3" style="text-align: center;">
                                <a class="fig">
                                        <div id="shiva"><span class="count">{{ $statisticData['pbpercent'] }}</span><span style="font-size: 14px; font-family: 'Karla', san-serif;">%</span></div>
                                        <span style="font-size: 14px; font-family: 'Karla', san-serif;"><br/>pbpercent</span>
                                </a>
                </div>
                <div class="col-md-15 col-xs-3" style="text-align: center;">
                                <a class="fig">
                                        <div id="shiva"><span class="count">{{ $statisticData['corespercent'] }}</span><span style="font-size: 14px; font-family: 'Karla', san-serif;">%</span></div>
                                        <span style="font-size: 14px; font-family: 'Karla', san-serif;"><br/>Cores Percent</span>
                                </a>
                </div>
        </div>
@endif
</div>
@endsection

@section('usersContent')
        @include('users.index');
@endsection

@section('departmentsContent')
        @include('departments.index');
@endsection
