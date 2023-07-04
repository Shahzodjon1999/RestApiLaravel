@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create')}}" title="Create a Book"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Auther</th>
            <th>Publish Data</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->auther }}</td>
                <td>{{ $project->publish_data }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ url('/books')}}" method="POST">

                        <a href="{{route('show',$project->id)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('edit',$project->id)}}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                       
                        <a href="{{route('delete',$project->id)}}" title="delete" >
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </a>
                        
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
