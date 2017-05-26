@extends('master')

@section('content')
    <div class="col-lg-16 col-sm-16">
        <div class="card hovercard">
            <div class="card-background">
                <img src="http://lorempixel.com/400/200/" alt="Lorempixel Image" />
            </div>
            <div class="useravatar">
                @if(isset($user->profile_photo))
                    <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>

                @else
                    <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                @endif
            </div>
            <div class="card-info">
                <span class="card-title">{{ $user->name }}</span>
                @if($user->admin == 1)
                    <span class="card-title">Admin</span></p>
                @endif
            </div>
        </div>
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group">
            <div class="btn-group" role="group">
                <a class="btn" id="my-products" href="{{-- route('profile.products' )--}}">
                    <span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
                    <div class="hidden-xs">Os Meus Requisitos</div>
                </a>
            </div>
            <div class="btn-group" role="group">
                <a id="market" class="btn btn-default" href="{{-- route('profile.market' )--}}">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                    <div class="hidden-xs">Mercado</div>
                </a>
            </div>
            <div class="btn-group" role="group">
                @if(!Auth::guest())
                    @if(Auth::user()->admin || Auth::user())

                        <a type="button" id="settings" class="btn btn-default" href="{{ route('users.edit', [$user->id] ) }}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <div class="hidden-xs">Definições</div>
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="card-info">
            <p><span class="card-title">{{ $user->email }}</span></p>
            <p><span class="card-title">{{ $user->phone }}</span></p>
            <p><span class="card-title">{{ $user->profile_url }}</span></p>
            <p><span class="card-title">{{ $user->admin }}</span></p>
            <p><span class="card-title">{{ $user->prints_eval }}</span></p>


            @if(isset($user->presentation))
                <span class="card-title">{{ $user->presentation }}</span>
            @endif
        </div>
        <div class="well">
            <div class="tab-content">
                <div id="wellwell" class="well well-products well-sm">
                    <strong>Categoria de Produtos</strong>
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-th-list">
                        </span>Lista</a> 
                        <a href="#" id="grid" class="btn btn-default btn-sm" ><span
                            class="glyphicon glyphicon-th"></span>Grelha</a>
                        </span></a> 
                        <a href="{{-- route ('advertisements.create') --}}" id="add" class="btn btn-default btn-sm" ><span
                            class="glyphicon glyphicon-plus"></span>Adicionar</a>
                    </div>
                </div>
               {{-- @yield('profile') --}}
            </div>
        </div>
    </div>        
@endsection