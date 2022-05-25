@extends('admin.master')

@section('title')
    Manage Tags
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Tag</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('message'))
                            <h3 class="text-success">{{ Session::get('message') }}</h3>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tag Name</th>
                                <th>Tag Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->description}}</td>
                                    <td>{{$tag->status ==1 ? "Published" : "Unpublished" }}</td>
                                    <td>
                                        <a href="{{ route('edit-tag',['id' => $tag->id] ) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('delete-tag',['id' => $tag->id] ) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
