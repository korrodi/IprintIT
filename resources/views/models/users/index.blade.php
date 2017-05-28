@extends('master')

@section('content')
    <div class="panel panel-default">
        @if(count($users))
            <div class="panel-heading center">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>
                            <a href="{{ route('users.list', [isset($iconName)]) }}">
                                Name <span class="glyphicon {{ isset($iconName)? 'glyphicon-triangle-bottom' : 'glyphicon-triangle-top' }}" aria-hidden="true"></span>
                            </a>
                        </th>
                        <th>Phone</th>
                        <th>Department <span class="glyphicon {{ isset($iconName)? 'glyphicon-triangle-bottom' : 'glyphicon-triangle-top' }}" aria-hidden="true"></span></th>
                        <th>Presentation</th>
                        <th>Profile Url</th>
                        @if(!Auth::guest())
                            <th colspan="3">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr onclick="document.location = '{{ route('user.show',[$user]) }}';">
                            <td>
                                @if(isset($user->profile_photo))
                                    <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>
                                @else
                                    <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                                @endif
                            </td>
                            <td><a href='mailto:{{ $user->email }}'>{{ $user->email }}</a></td>
                            <td>{{ $user->getName() }}</td>
                            {{-- string will auto escape when you perform {{ }} --}}
                            <td>{!! $user->phone? '<a href="' . $user->phone . '">' .$user->phone . '</a>' : '...' !!}</td>
                            <td><a href="{{ route('department.show',[$user->department->id]) }}">{{ $user->department->name }}</a></td>
                            <td>{{ $user->presentation? $user->resumeText(30) : '...' }}</td>
                            <td>{!! $user->profile_url? '<a href="' . $user->profile_url . '">' . $user->profile_url . '</a>' : '...' !!}</td>

                            @if(!Auth::guest())
                                @if(Auth::user()->id == $user->id ||  Auth::user()->admin)
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('users.edit', [$user->id]) }}">Edit</a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="panel-heading center">
                {{ $users->links() }}
            </div>
            
        @else
            <h2>No users found</h2>
        @endif
    </div>
@endsection