@extends('master')

@section('content')
    <div class="panel panel-default">
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
                @if(!Auth::guest())
                    <div class="btn-group" role="group">
                        <a class="btn" id="my-products" href="{{-- route('profile.products' )--}}">
                            <span class="glyphicon glyphicon-grain" aria-hidden="true"></span>
                            <div class="hidden-xs">Os Meus Requisitos</div>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <a id="market" class="btn btn-default" href="{{-- route('profile.market' )--}}">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <div class="hidden-xs">Adicionar Requesitos</div>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        @if(Auth::user()->admin || Auth::user())

                            <a type="button" id="settings" class="btn btn-default" href="{{ route('users.edit', [$user->id] ) }}">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                <div class="hidden-xs">Definições</div>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Presentation</th>
                    <th>Profile Url</th>
                    @if(!Auth::guest())
                        <th colspan="3">Actions</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                <tr onclick="document.location = '{{ route('user.show',[$user]) }}';">
                    <td>
                        @if(isset($user->profile_photo))
                            <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>
                        @else
                            <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                        @endif
                    </td>
                    <td><a href='mailto:{{ $user->email }}'>{{ $user->email }}</a></td>
                    <td>{{ $user->getName() }}</td>
                    <td>{{ $user->phone? $user->phone : '...' }}</td>
                    <td>{{ $user->department->name }}</td>
                    <td>{{ $user->presentation? $user->resumeText(30) : '...' }}</td>
                    <td>{{ $user->profile_url? $user->profile_url : '...' }}</td>

                    @if(!Auth::guest())
                        @if(Auth::user()->id == $user->id ||  Auth::user()->admin)
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('users.edit', [$user->id]) }}">Edit</a>
                            </td>
                        @endif
                    @endif
                </tr>
            </tbody>
        </table>
        </div> 
    </div>       
@endsection