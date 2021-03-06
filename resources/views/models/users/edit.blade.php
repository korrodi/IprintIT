@extends('master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit User</div>
        <div class="panel-body">
                <form action="{{ route('users.update', [$user]) }}" method="post" class="form-horizontal"  enctype="multipart/form-data" >                        
                {{ method_field('PATCH') }}

                     @include('models.users.partials.add-edit')
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="ok">Save</button>
                                <a class="btn btn-default" name="cancel" href="{{ route('landing.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection