@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Category</h3>
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
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status ==1 ? "Published" : "Unpublished" }}</td>
                                    <td>
                                        <a href="{{ route('edit-category',['id' => $category->id] ) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('delete-category',['id' => $category->id] ) }}" class="btn btn-danger btn-sm">Delete</a>
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
