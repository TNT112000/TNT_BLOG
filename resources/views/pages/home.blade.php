@extends('layouts.main')
@section('content')
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
                @foreach ($new as $item)
                    <div class="item">
                        <img src="{{ asset($item->image) }}" alt="" style="height:330px;">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span>{{ $item->category->name }}</span>
                                </div>
                                <a href="{{route('blog.show',['blog'=>$item->id])}}">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <ul class="post-info">
                                    <li><a href="{{route('blog.show',['blog'=>$item->id])}}">{{ $item->created_at->format('d-m-Y') }}</a></li>
                                    <li><a href="{{route('blog.show',['blog'=>$item->id])}}">{{ $item->total }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- Banner Ends Here -->

    @include('layouts.logo')


    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                          @foreach($new as $item)
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $item->category->name }}</span>
                                        <a href="{{route('blog.show',['blog'=>$item->id])}}">
                                            <h4>{{ $item->name }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="{{route('blog.show',['blog'=>$item->id])}}">{{ $item->created_at->format('d-m-Y') }}</a></li>
                                            <li><a href="{{route('blog.show',['blog'=>$item->id])}}">{{ $item->total }}</a></li>
                                        </ul>
                                        <div class="content-style"> {!!$item->content !!} </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="{{route('blog.list')}}">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- SIDEBAR --}}
                @include('layouts.sidebar')

            </div>
        </div>
    </section>
@endsection
