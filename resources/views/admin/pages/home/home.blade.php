@extends('admin.layouts.main')
@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right display_flex">
                <div class="col-12">
                    <div class="container-fluid py-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Tổng số bài viết</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$total}}</h5>
                                        <p class="card-text">Tất cả bài viết hiện có</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Đang hoạt động</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$list}}</h5>
                                        <p class="card-text">Còn dang hoạt động</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Đã xóa tạm</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$trash}}</h5>
                                        <p class="card-text">Có thể khôi phục lại</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- end analytic  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
