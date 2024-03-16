<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
          {{--  --}}
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="POST" action="{{ route('blog.search') }}">
                        @csrf
                        <input type="text" name="search" class="searchText" placeholder="nhập để tìm kiếm..."
                            autocomplete="on" fdprocessedid="xm2ecp">
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Thể loại</font>
                            </font>
                        </h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($category as $item)
                                <li><a href="{{ route('blog.list_category', ['blog' => $item->id]) }}">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">- {{ $item->name }}</font>
                                        </font>
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Bài viết gần đây</font>
                            </font>
                        </h2>
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                @foreach ($new as $item)
                                    <a href="{{ route('blog.show', ['blog' => $item->id]) }}">

                                        <h5>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $item->name }}</font>
                                            </font>
                                        </h5>
                                        <span>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $item->created_at->format('d-m-Y') }}</font>
                                            </font>
                                        </span>

                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
