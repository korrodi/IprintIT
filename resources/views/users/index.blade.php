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
                <tr data-status="pagado">
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

                            @if(isset($user->profile_photo))
                                <img src="profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" />

                            @else
                                <img class="group list-group-image" src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" />
                            @endif
                            </a>
                            <div class="media-body">
                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                <h4 class="title">
                                    {{ $user->name }}
                                    <span class="pull-right pagado">{{ $user->activated }}</span>
                                </h4>
                                <p class="summary">{{ $user->presentation }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{route('users.edit',[$user->id])}}">Edit</a>
                    </td>
                </tr>
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
    <h2>No users found</h2>
@endif
@endsection
