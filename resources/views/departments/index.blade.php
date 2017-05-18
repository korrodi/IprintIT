@extends('layout.master')

@section('content')
<div class="panel-heading">{{ $title }}</div>
<div class="panel-body">
    <div class="pull-right">
        <div class="btn-group">
            <button type="button" class="btn btn-success btn-filter" data-target="pagado">Activo</button>
            <button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Inativo</button>
            <button type="button" class="btn btn-success btn-filter" data-target="cancelado">Admin</button>
            <button type="button" class="btn btn-danger btn-filter" data-target="all">Blocked</button>
        </div>
    </div>
    <div class='main_search_form'> 
    <!--<form action="login" method="get"> -->
    <!-- Added url parameter to form open -->
    <form action="" method="get" class="form-group">
        <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Let's Farm" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <div class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label for="filter">Filter by</label>
                                        <select class="form-control">
                                            <option value="0" selected>All Market</option>
                                            <option value="1">Featured Products</option>
                                            <option value="2">Most popular Farmer's</option>
                                            <option value="3">Top rated Farmer</option>
                                            <option value="4">Most commented Farmer</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
    </form>
    </div>
    @if(count($departments))
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="table-container">
        <table class="table table-filter">
            <tbody>
            @foreach ($departments as $department)
                <tr onclick="document.location = '{{-- route('departments.show',[$department->id]) --}}';">
                    <td>
                        <div class="ckbox">
                            <input type="checkbox" id="checkbox1">
                            <label for="checkbox1"></label>
                        </div>
                    </td>
                    <td>
                        <a href="javascript:;" class="star">
                            <i class="glyphicon glyphicon-star"></i>
                        </a>
                    </td>
                    <td>
                        <div class="media">
                            <div class="media-body">
                                <span class="media-meta pull-right">Febrero 13, 2016</span>
                                <h4 class="title">
                                    <span class="pull-right">{{ $department->name }}</span>
                                </h4>
                            </div>
                    </td>
                </tr>
            @endforeach                                    
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</section>

<div class="panel-heading">
    {{-- $departments->links() --}}
</div>
@else
    <h2>No departments found</h2>
@endif
@endsection
