@extends('layout.master')

@section('content')
<div class="panel-heading">{{ $title }}</div>
<div class="panel-body">
    <div class="pull-right">
        <div class="btn-group">
            <button type="button" class="btn btn-success btn-filter" data-target="pagado">Activo</button>
            <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Inativo</button>
            <button type="button" class="btn btn-success btn-filter" data-target="cancelado">Admin</button>
            <button type="button" class="btn btn-danger btn-filter" data-target="all">Blocked</button>
        </div>
    </div>
    <div class='main_search_form'> 
    <!--<form action="login" method="get"> -->
    <!-- Added url parameter to form open -->
    <form action="" method="get" class="form-group">
        <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Let's Farm" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <div class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label for="filter">Filter by</label>
                                        <select class="form-control">
                                            <option value="0" selected>All Market</option>
                                            <option value="1">Featured Products</option>
                                            <option value="2">Most popular Farmer's</option>
                                            <option value="3">Top rated Farmer</option>
                                            <option value="4">Most commented Farmer</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
    </form>
    </div>
    @if(count($users))
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-container">
        <table class="table table-filter">
            <tbody>
            @foreach ($users as $user)
                <tr onclick="document.location = '{{route('users.show',[$user->id])}}';">
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
                            <div class="image_profile">
                                <a href="#" class="pull-left">

                                @if(isset($user->profile_photo))
                                    <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>

                                @else
                                    <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                                @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                <h4 class="title">
                                    {{ $user->name }}, <span class="pull-right">{{ $user->department->name }}</span>
                                    <span class="pull-right pagado">{{ $user->activated == 1 ? 'activo' : 'desativo' }}</span>
                                </h4>
                                <p class="summary">{{ $user->email }}</p>
                                <span class="pull-right">{{ $user->activated == 1 ? 'activo' : 'desativo' }}</span>
                                <p class="summary">{{ $user->department->name }}</p>
                            </div>
                    </td>
                    @if(Auth::user())
                        @if(Auth::user()->id == $user->id)
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{route('users.edit',[$user->id])}}">Edit</a>
                        </td>
                        @endif
                    @endif
                </tr>
            @endforeach                                    
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>

<div class="panel-heading">
    {{ $users->links() }}
</div>
@else
    <h2>No users found</h2>
@endif
@endsection
