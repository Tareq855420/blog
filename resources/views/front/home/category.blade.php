@extends('front.master')

<!--Category Page-->

@section('body')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category List</span>
                    @foreach($allCategory as $category)
                    <h3>{{ $category->id }}</h3>
                    <p>{!! $category->description !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="entry2">
                            <a href="{{ route('post', ['id'=>$post->id]) }}"><img src="{{ asset($post->image) }}" alt="Image" class="img-fluid rounded"></a>
                            <div class="excerpt">
                                <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name}}</span>

                                <h2><a href="{{ route('post', ['id'=>$post->id]) }}">{{ $post->title }}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 mr-3 d-inline-block">
                                        <img src="{{ asset('/') }}front/images/tareq.jpg" alt="Image" class="img-fluid">
                                    </figure>
                                    <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                                    <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
                                </div>


                                <p class="text-bold">{!! Str::limit($post->description, 200) !!}</p>
                                <p><a href="{{ route('post', ['id'=>$post->id]) }}">Read More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
@endsection
