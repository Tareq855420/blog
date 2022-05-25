@extends('front.master')

<!--Contact Page-->

@section('body')
    @foreach($contacts as $contact)
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset($contact->image) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="javascript:void(0)">Contact Me</h1>
                        <p class="lead mb-4 text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
                    <form action="{{ route('contact') }}" method="post" class="p-5 bg-white">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 mb-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('message-send'))
                            <div class="alert alert-success">{{ Session::get('message-send') }}</div>
                        @endif
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="fname">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" id="subject" name="subject" class="form-control" placeholder="Subject">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-5">
                    @foreach($contacts as $contact)
                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">{!! $contact->address !!}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="">{{ $contact->number }}</p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="">{{ $contact->email }}</a></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
