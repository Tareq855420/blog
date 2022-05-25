@extends('admin.master')

@section('title')
    Edit Contact
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Contact</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('message'))
                            <h3 class="text-success">{{ Session::get('message') }}</h3>
                        @endif
                        <form action="{{ route('update-contact', ['id'=>$contact->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-4">Contact Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" value="{{$contact->email}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Contact Number</label>
                                <div class="col-md-8">
                                    <input type="number" name="number" value="{{$contact->number}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Contact Banner Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control-file">
                                    <img src="{{ asset($contact->image) }}"alt="" style="height: 100px; width: 150px;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Contact Address</label>
                                <div class="col-md-8">
                                    <textarea name="address" id="editor" cols="20" rows="2" class="form-control">{!! $contact->address !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4">Contact Status</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" name="status" value="1" {{ $contact->status == 1 ? "checked" : "" }}>Published</label>
                                    <label for=""><input type="radio" name="status" value="0" {{ $contact->status == 0 ? "checked" : "" }}>Unpublished</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-outline-success" value="Update Contact">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
