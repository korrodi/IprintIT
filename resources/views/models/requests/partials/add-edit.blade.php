{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>
{{-- Email --}}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">Email</label>

    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="jonh.doe@urbanfarmers.com"  name="email" value="{{ $user->email }}{{ old('email') }}">

        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>
{{-- Presentation --}}
<div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
    <label for="descricao" class="col-md-4 control-label">Descrição</label>

    <div class="col-md-6">
    {{-- Warn textarea space sensitive --}}
    <textarea name='presentation' rows="4" cols="55">{{ old('presentation') ? old('presentation') : $user->presentation }}</textarea>

        @if ($errors->has('presentation'))
        <span class="help-block">
            <strong>{{ $errors->first('presentation') }}</strong>
        </span>
        @endif
    </div>
</div>
{{-- Sex --}}
<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
    <label> Female
        <input type="radio" name="sex" value="female">
    </label>
    <label> Male
        <input type="radio" name="sex" value="male">
    </label>
    @if ($errors->has('sex'))
    <span class="help-block">
        <strong>{{ $errors->first('sex') }}</strong>
    </span>
    @endif
</div>

<div class="form-group{{ $errors->has('profile_url') ? ' has-error' : '' }}">
    <label>Profile URL
        <input type="url" name="profile_url" value="{{-- Auth::user()->profile_url --}}">
    </label>
        @if ($errors->has('profile_url'))
        <span class="help-block">
            <strong>{{ $errors->first('profile_url') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profile_photo') ? ' has-error' : '' }}">
    <label>Profile Photo
        <input type="file" name="profile_photo">
    </label>
        @if ($errors->has('profile_photo'))
        <p class="help-block">
            <strong>{{ $errors->first('profile_photo') }}</strong>
        </p>
        @endif
</div>


