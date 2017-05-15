@extends('layout.master')

@section('title', $title)

@section('content')

@if(Session::has('message_error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
    {{Session::get('message_error')}}
    </div>
@elseif(Session::has('message_success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
    {{Session::get('message_success')}}
    </div>
@endif
@if(count($departments))
    <div class="row">

        <section class="content">
            <h1>Table Filter</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-filter" data-target="pagado">Activo</button>
                                <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Inativo</button>
                                <button type="button" class="btn btn-success btn-filter" data-target="cancelado">Admin</button>
                                <button type="button" class="btn btn-danger btn-filter" data-target="all">Blocked</button>
                                <a href="{{route('users.index')}}">All</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                    @foreach ($departments as $department)
                                    <tr>
                                        <td>         
                                            {{ $department->name }}    
                            @foreach ($department->users() as $user)     
                            <table class="table table-filter">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="ckbox">
                                                <input type="checkbox" id="checkbox1">
                                                <label for="checkbox1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="star">
                                                <i class="glyphicon glyphicon-star"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left">

                                                @if (isset($user->profile_photo))
                                                    <img src="profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="$user->profile_photo" />

                                                @else
                                                    <img class="group list-group-image" src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" />
                                                @endif
                                                </a>
                                                <div class="media-body">
                                                    <span class="media-meta pull-right">Febrero 13, 2016</span>
                                                    <h4 class="title">
                                                        {{ $user->name }}
                                                        <span class="pull-right pagado">(Pagado)</span>
                                                    </h4>
                                                    <p class="summary">{{ $user->presentation }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="{{route('users.edit',[$user->id])}}">Edit</a>
                                            <form action="{{ route('users.delete', $user->id) }}" method="post" class="inline">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                                @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <div><a class="btn btn-primary" href="{{route('users.create')}}">Add user</a></div>
 

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@else
    <h2>No departments found</h2>
@endif
@endsection
