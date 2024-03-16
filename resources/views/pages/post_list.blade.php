@extends('layouts.main')
@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
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
                            @foreach ($data as $item)
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ asset($item->image) }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $item->category->name }}</span>
                                            <a href="{{ route('blog.show', ['blog' => $item->id]) }}">
                                                <h4>{{ $item->name }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">{{ $item->created_at->format('d-m-Y') }}</a></li>
                                                <li><a href="#">{{ $item->total }}</a></li>
                                            </ul>
                                            <div class="content-style"> {!! $item->content !!} </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-12">
                              <ul class="page-numbers">
                                  {{-- Liên kết trang trước --}}
                                  @if ($data->onFirstPage())
                                      <li class="disabled"><span><i class="fa fa-angle-double-left"></i></span></li>
                                  @else
                                      <li><a href="{{ $data->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
                                  @endif
                          
                                  {{-- Liên kết các trang --}}
                                  @for ($i = 1; $i <= $data->lastPage(); $i++)
                                      @if ($i == $data->currentPage())
                                          <li class="active"><span>{{ $i }}</span></li>
                                      @else
                                          <li><a href="{{ $data->url($i) }}">{{ $i }}</a></li>
                                      @endif
                                  @endfor
                          
                                  {{-- Liên kết trang kế tiếp --}}
                                  @if ($data->hasMorePages())
                                      <li><a href="{{ $data->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
                                  @else
                                      <li class="disabled"><span><i class="fa fa-angle-double-right"></i></span></li>
                                  @endif
                              </ul>
                          </div>
                          
                        </div>
                    </div>
                </div>


                @include('layouts.sidebar')


            </div>
        </div>
    </section>
@endsection
