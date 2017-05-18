{{ csrf_field() }}
<!-- PATCH nao me parece estar a trabalhar :O usar Auth::user() -->
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label>Name
        <input type="text" class="form-control" placeholder="Jonh Doe" name="name" value="{{ Auth::user()->name }}">
    </label>
    @if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
</div>
{{-- Email --}}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label>Email
        <input type="text" class="form-control" placeholder="jonh.doe@urbanfarmers.com"  name="email" value="{{ Auth::user()->email }}" >
    </label>
    @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
</div>
{{-- Location --}}
<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
    <label>Location
        <select name="location" class="form-control">
            <option disabled selected>Portugal</option>
            @if (is_array($data))
                @foreach ($data as $places)
                    @if (Auth::user()->location == $places && Auth::user()->location != null)
                        <option value="{{ $places }}" selected>{{ $places }}</option>
                    @else
                        <option value="{{ $places }}">{{ $places }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </label>
    @if ($errors->has('location'))
    <span class="help-block">
        <strong>{{ $errors->first('location') }}</strong>
    </span>
    @endif                            
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
        <input type="url" name="profile_url" value="{{ Auth::user()->profile_url }}">
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
{{-- Presentation --}}
<div class="form-group{{ $errors->has('presentation') ? ' has-error' : '' }}">
    <label>Descrição</label>
    <textarea name='presentation' rows="4" cols="50">
@if(!old('presentation'))
{{ Auth::user()->presentation }}
@endif
{{ old('presentation') }}
    </textarea>
    @if ($errors->has('presentation'))
    <span class="help-block">
        <strong>{{ $errors->first('presentation') }}</strong>
    </span>
    @endif
</div>

