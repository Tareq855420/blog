@extends('admin.master')

@section('title')
    Manage Contact
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Contact</h3>
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
                                <th>Contact Email</th>
                                <th>Contact Number</th>
                                <th>Contact Banner Image</th>
                                <th>Contact Address</th>
                                <th>Contact Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->number}}</td>
                                    <td>
                                        <img src="{{$contact->image}}"alt="" style="height: 100px; width: 150px;">
                                    </td>
                                    <td>{!! $contact->address !!}</td>
                                    <td>{{$contact->status ==1 ? "Published" : "Unpublished" }}</td>
                                    <td>
                                        <a href="{{ route('edit-contact',['id' => $contact->id] ) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('delete-contact',['id' => $contact->id] ) }}" class="btn btn-danger btn-sm">Delete</a>
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
