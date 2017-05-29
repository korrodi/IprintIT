@extends('master')

@section('content')
    <div class="panel panel-default">
        @if(count($users))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Presentation</th>
                        <th>Profile Url</th>
                        @if(!Auth::guest())
                            <th colspan="3">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr onclick="document.location = '{{ route('user.show',[$user->id]) }}';">
                            <td>
                                @if(isset($user->profile_photo))
                                    <img src="/profiles/{{ $user->profile_photo }}"  width="55" height="55" alt="" class="img-circle"/>
                                @else
                                    <img src="http://placehold.it/55x55/000/fff" width="55" height="55" alt="" class="img-circle"/>
                                @endif
                            </td>
                            <td><a href='mailto:{{ $user->email }}'>{{ $user->email }}</a></td>
                            <td>{{ $user->getName() }}</td>
                            <td>{{ $user->phone? $user->phone : '...' }}</td>
                            <td>{{ $user->department->name }}</td>
                            <td>{{ $user->presentation? $user->resumeText(30) : '...' }}</td>
                            <td>{{ $user->profile_url? $user->profile_url : '...' }}</td>

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