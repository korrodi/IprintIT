@extends('master')

@section('content')
    <div class="panel panel-default">
        @if(count($departments))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Total of Prints</th>
                        {{--@if(!Auth::guest())
                            <th colspan="3">Actions</th>
                        @endif--}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($departments as $department)
                        <tr onclick="document.location = '{{ route('department.show',[$department->id]) }}';">
                            <td>{{ $department->name }}</td>
                            <td>{{-- $totalOfPrints --}}</td>
                            
                            {{--@if(!Auth::guest())
                                @if(Auth::user()->admin)
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('departments.edit', [$department->id]) }}">Edit</a>
                                    </td>
                                @endif
                            @endif--}}
                        </tr>
                    @endforeach 
            </tbody>
        </table>
        
        <div class="panel-heading center">
           {{ $departments->links() }}  
        </div>
        
        @else
            <h2>No departments found</h2>
        @endif
    </div>
@endsection