{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">name</label>

    <div class="col-md-6">
        <input  type="text" class="form-control" name="name" value="{{ $user->name }}{{ old('name') }}" required autofocus>

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
        <input type="email" class="form-control" placeholder="jonh.doe@urbanfarmers.com" name="name"  id="email" value="{{ $user->email }}{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
{{-- Presentation --}}
<div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
    <label for="presentation" class="col-md-4 control-label">Presentation</label>

    <div class="col-md-6">
        {{-- Warn textarea space sensitive --}}
        <textarea id='presentation' name="name" rows="4" cols="55">{{ old('presentation') ? old('presentation') : $user->presentation }}</textarea>

        @if ($errors->has('presentation'))
            <span class="help-block">
                <strong>{{ $errors->first('presentation') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profile_url') ? ' has-error' : '' }}">
    <label for="profile_url" class="col-md-4 control-label">Profile URL</label>
    <div class="col-md-6">

        <input type="url" class="form-control" id="profile_url" name="name" value="{{ $user->profile_url }}{{ old('profile_url') }}">

        @if ($errors->has('profile_url'))
            <span class="help-block">
                <strong>{{ $errors->first('profile_url') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profile_photo') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Profile Photo</label>
    <div class="col-md-6">
        <form id="form1" runat="server">
            <label for="profile_photo">
                @if(isset($user->profile_photo))
                    <img id="image" src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>
                @else
                    <img id="image" src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                @endif
            </label>
            <input type="file" id="profile_photo" >

            @if ($errors->has('profile_photo'))
            <p class="help-block">
                <strong>{{ $errors->first('profile_photo') }}</strong>
            </p>
            @endif
        </form>
    </div>
</div>