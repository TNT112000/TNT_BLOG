@extends('layouts.main')
@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    @include('layouts.logo')

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset($blog->image) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $blog->category->name }}</span>
                                        <a href="{{ route('blog.show', ['blog' => $blog->id]) }}">
                                            <h4>{{ $blog->name }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a
                                                    href="{{ route('blog.show', ['blog' => $blog->id]) }}">{{ $blog->created_at->format('d-m-Y') }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('blog.show', ['blog' => $blog->id]) }}">{{ $blog->total }} lượt xem</a>
                                            </li>
                                        </ul>
                                        <div class=""> {!! $blog->content !!} </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul id="cm">
                                          @foreach($comment as $item)
                                            <li>
                                                <div class="author-thumb">
                                                    <img src="{{asset($item->image)}}" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>{{$item->name}}<span>{{ $item->created_at->format('d-m-Y') }}</span></h4>
                                                    <p>{{$item->content}}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="{{route('comment',['comment'=>$blog->id])}}" method="post">
                                            @csrf
                                          <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name"
                                                            placeholder="Your name" required="">
                                                    </fieldset>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="content" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit"
                                                            class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @include('layouts.sidebar')


            </div>
        </div>
    </section>
@endsection
