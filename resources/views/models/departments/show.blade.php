@extends('master')

@section('content')
    <div class="panel panel-default">
        <div class="col-lg-16 col-sm-16">
            <div class="card hovercard">
                <div class="card-background">
                    <img src="http://lorempixel.com/400/200/" alt="Lorempixel Image" />
                </div>
                <div class="departmentavatar">
                        <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>{{ $department->id }}
                </div>
                <div class="card-info">
                    <span class="card-title">{{ $department->name }}</span>
                </div>
            </div>
            @include('models.statistics.department')
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group">
                <div class="btn-group" role="group">
                    <a class="btn" id="my-products" href="{{ route('department.users.list', [$department->id] ) }}">
                        <span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
                        <div class="hidden-xs">Utilizadores</div>
                    </a>
                </div>
                @if(!Auth::guest())
                    @if(Auth::user()->admin)
                        <div class="btn-group" role="group">
                            <a id="market" class="btn btn-default" href="{{ route('requests.list' ) }}">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                                <div class="hidden-xs">Requesitos</div>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>  
    </div>      
@endsection