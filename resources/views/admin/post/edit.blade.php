@extends('admin.master')

@section('title')
    Edit Post
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('message'))
                            <h3 class="text-success">{{ Session::get('message') }}</h3>
                        @endif
                        <form action="{{ route('update-post', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Category</label>
                                <div class="col-md-8">
                                    <select name="category_id" class="form-control">
                                        <option value="{{$post->category_id}}" disabled selected><--- Select A Category ---></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Tag</label>
                                <div class="col-md-8">
                                    @foreach($tags as $tag)
                                        <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}">
                                            <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Main Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control-file">
                                    <img src="{{ asset($post->image) }}"alt="" style="height: 100px; width: 150px;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="editor" cols="20" rows="2" class="form-control">{!! $post->description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Post Status</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="status" value="1" {{ $post->status == 1 ? "checked" : "" }}>Published</label>
                                    <label for=""><input type="radio" name="status" value="0" {{ $post->status == 0 ? "checked" : "" }}>Unpublished</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-outline-success" value="Update Post">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
