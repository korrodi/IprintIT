@extends('master')

@section('content')
    @if(count($printers))
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
                @foreach ($printers as $printer)
                    <tr onclick="document.location = '{{ route('printer.show',[$printer->id]) }}';">
                        <td>{{ $printer->name }}</td>
                        <td>{{-- $totalOfPrints --}}</td>
                        
                        {{--@if(!Auth::guest())
                            @if(Auth::user()->admin)
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('printers.edit', [$printer->id]) }}">Edit</a>
                                </td>
                            @endif
                        @endif--}}
                    </tr>
                @endforeach 
        </tbody>
    </table>
    
    <div class="panel-heading center">
       {{ $printers->links() }}  
    </div>
    
    @else
        <h2>No printers found</h2>
    @endif
@endsection