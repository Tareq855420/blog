@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('message'))
                            <h3 class="text-success">{{ Session::get('message') }}</h3>
                        @endif
                        <form action="{{ route('update-category', ['id'=>$category->id]) }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4">Category Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Category Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="editor" cols="20" rows="2" class="form-control">{!! $category->description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Category Status</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="status" value="1" {{ $category->status == 1 ? "checked" : "" }}>Published</label>
                                    <label for=""><input type="radio" name="status" value="0" {{ $category->status == 0 ? "checked" : "" }}>UnPublished</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-outline-success" value="Update Category">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
