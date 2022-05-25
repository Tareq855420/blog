@extends('admin.master')

@section('title')
    Manage Posts
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('message'))
                            <h3 class="text-success">{{ Session::get('message') }}</h3>
                        @endif
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Name</th>
                                <th>Post Category</th>
                                <th>Post Tag</th>
                                <th>Post Main Image</th>
                                <th>Post Description</th>
                                <th>Post Author</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td>{{$post->id}}</td>
                                    <td>
                                        <img src="{{$post->image}}"alt="" style="height: 100px; width: 150px;">
                                    </td>
                                    <td>{!! $post->description !!}</td>
                                    <td>{{$post->user_id}}</td>
                                    <td>{{$post->status == 1 ? "Published" : "Unpublished" }}</td>
                                    <td>
                                        <a href="{{ route('edit-post',['id' => $post->id] ) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('delete-post',['id' => $post->id] ) }}" class="btn btn-danger btn-sm">Delete</a>
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
