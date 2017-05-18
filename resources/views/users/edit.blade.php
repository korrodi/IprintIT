@extends('layout.master')

@section('content')
<div class="panel-heading">Edit User</div>
<div class="panel-body">
        <form action="{{ route('users.update', [$user->id]) }}" method="post" class="form-horizontal"  enctype="multipart/form-data" >                        
        {{ method_field('PATCH') }}

             @include('users.partials.add-edit')
                <div class="panel-body">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="ok">Save</button>
                         <a class="btn btn-default" name="cancel" href="{{ route('users.index') }}">Cancel</a>
                    </div>
                </div>
        </form>
</div>
@endsection