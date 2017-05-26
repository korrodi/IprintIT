@extends('master')

@section('content')
    <div class="panel panel-default">
        @if(count($requests))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Paper_Size</th>
                    <th>Paper_Type</th>
                    <th>File</th>
                    <th>Closed Date </th>
                    <th>Refused Reason</th>
                    <th>Satisfaction Grade</th>
                    <th>Colored</th>
                    <th>Stapled</th>
                    <th>Owner By</th>
                    <th>Printer By</th>
                    <th>Closed By</th>
                    @if(!Auth::guest())
                        <th colspan="3">Actions</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                    @foreach ($requests as $request)
                        <tr onclick="document.location = '{{ route('request.show',[$request->id]) }}';">
                            <td class="{{ $request->getStatus() }}">{{ $request->getStatus() }}</td>
                            <td>{{ $request->due_date }}</td>
                            <td>{{ $request->description? $request->resumeText('description', 30) : '...' }}</td>
                            <td>{{ $request->quantity }}</td>
                            <td>{{ $request->paper_size }}</td>
                            <td>{{ $request->paper_type }}</td>
                            <td>{{ $request->file }}</td>
                            <td>{{ $request->closed_date }}</td>
                            <td>{{ $request->refused_reason? $request->resumeText('refused_reason', 30) : '...' }}</td>
                            <td>{{ $request->satisfaction_grade }}</td>
                            <td>{{ $request->colored }}</td>
                            <td>{{ $request->stapled }}</td>
                            <td>{{ $request->owner->getName() }}</td>
                            <td>{{ !empty($request->printer)? $request->printer->getName() : '...' }}</td>
                            <td>{{ !empty($request->closer)? $request->closer->getName() : '...' }}</td>

                            {{--@if(!Auth::guest())
                                @if(Auth::user()->id == $request->id ||  Auth::user()->admin)
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('requests.edit', [$request->id]) }}">Edit</a>
                                    </td>
                                @endif
                            @endif--}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="panel-heading center">
                {{ $requests->links() }}
            </div>
        
        @else

            <h2>No requests found</h2>
        @endif
    </div>
@endsection