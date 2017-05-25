@extends('master')

@section('content')
    <a id="users"></a>
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">
        <div class="container">
            <div class="well well-sm">
                <strong>Category Title</strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                    </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                        class="glyphicon glyphicon-th"></span>Grid</a>
                </div>
            </div>
            @if(count($users))
                @foreach ($users as $user)
                    <div id="products" class="list-group">
                        <div class="item  col-xs-4 col-lg-4" onclick="document.location = '{{route('users.show',[$user->id])}}'">
                            <div class="thumbnail">
                                <div class="pull-left">
                                    @if(isset($user->profile_photo))
                                        <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>

                                    @else
                                        <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                                    @endif
                                </div>
                                <div class="caption">
                                    <h4 class="group inner list-group-item-heading">{{ $user->name }}</h4>
                                    @if(isset($user->presentation))
                                        <p class="group inner list-group-item-text">{{ $user->presentation }}</p>
                                    @endif
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <p class="summary">{{ $user->email }}</p>
                                            <p class="summary">{{ $user->department->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>No users found</h2>
            @endif
        </div>
        <div class="panel-heading">
            {{ $users->links() }}
        </div>
    </div>
@endsection