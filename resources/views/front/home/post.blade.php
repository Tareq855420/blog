@extends('front.master')

<!--Post Page-->

@section('body')
    <div class="site-cover site-cover-md overlay single-page" style="max-width: 100%;background-image: url('{{ asset($post->image) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                        <h1 class="mb-4"><a href="javascript:void(0)">{{ $post->title }}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{ asset('/') }}front/images/tareq.jpg" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p class="text-bold">{!! $post->description !!}</p>
                    </div>


                    <div class="pt-5">
                        @foreach($categories as $category)
                        <p>Categories:
                            <a href="{{ route('category',['id']) }}">{{ $category->name }}</a>
                        </p>
                        @endforeach
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ asset('/') }}front/images/tareq.jpg" alt="Image Placeholder" class="img-fluid mb-5">
                            <div class="bio-body">
                                <h2>{{ $post->user->name }}</h2>
                                <p class="mb-4">I am a student at Daffodil International University studying Computer Science and Technology (CSE).

                                    As I am interested in software and website development, I have learned Object-Oriented Program (OOP). I have mastery in HTML, CSS, PHP, Laravel.

                                    For leisure period, I mostly learn new programming languages and read articles about new software technology.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach($posts as $post)
                                    <li>
                                        <a href="">
                                            <img src="{{ asset($post->image) }}" alt="Image placeholder" class="mr-4">
                                            <div class="text">
                                                <h4> {{ $post->title }} </h4>
                                                <div class="post-meta">
                                                    <span class="mr-2"> {{ $post->created_at->format('M d, Y')}} </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a href="{{ route('category', ['id' =>$category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach($tags as $tag)
                                <li><a href="javascript:void(0)">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12">
                    <h2>More Related Posts</h2>
                </div>
            </div>

            <div class="row align-items-stretch retro-layout">

                <div class="col-md-5 order-md-2">
                    @foreach($lastRelatedPost as $post)
                        <a href="{{ route('post', ['id'=>$post->id]) }}" class="hentry img-1 h-100 gradient"
                           style="background-image: url('{{ asset($post->image) }}');">
                            <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
                            <div class="text">
                                <h2>{{ $post->title }}</h2>
                                <span>{{ $post->created_at->format('M d, Y')}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-7">
                    @foreach($firstRelatedPost as $post)
                        <a href="{{ route('post', ['id'=>$post->id]) }}" class="hentry img-2 v-height mb30 gradient"
                           style="background-image: url('{{ asset($post->image) }}');">
                            <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
                            <div class="text text-sm">
                                <h2>{{ $post->title }}</h2>
                                <span>{{ $post->created_at->format('M d, Y')}}</span>
                            </div>
                        </a>
                    @endforeach

                    <div class="two-col d-block d-md-flex justify-content-between">
                        @foreach($firstRelatedPosts2 as $post)
                            <a href="{{ route('post', ['id'=>$post->id]) }}" class="hentry v-height img-2 gradient"
                               style="background-image: url('{{ asset($post->image) }}');">
                                <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
                                <div class="text text-sm">
                                    <h2>{{ $post->title }}</h2>
                                    <span>{{ $post->created_at->format('M d, Y')}}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
