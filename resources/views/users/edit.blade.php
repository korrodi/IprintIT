@extends('layout.master')

@section('container')

<form action="{{ route('users.update', [$user->id]) }}" method="post" class="form-group"  enctype="multipart/form-data" >                        
{{ method_field('PATCH') }}

     @include('users.partials.add-edit')
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="ok">Save</button>
         <a class="btn btn-default" name="cancel" href="{{-- route('profile.products') --}}">Cancel</a>
    </div>
</form>

@endsection