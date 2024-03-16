@extends('admin.layouts.main')
@section('content')
<script>
    $(document).ready(function() {

        $('#myTable').DataTable({
            "lengthMenu": [5,8, 10, 25, 50, 100],
            "pageLength": 8 // Số lượng hàng mặc định hiển thị trên mỗi trang
        });

    });
</script>
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')

            <div id="content" class="fl-right display_flex">
               
                <div class="col-12">
                    <div class="section" id="title-page">
                        
                        <div class="title_update width-300px">
                            <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                            <a href="{{ route('blog.create') }}" class="back_create">Về thêm mới</a>
                        </div>
                        
                    </div>
                    @if(!empty(session('delete')) )
                          
                        <div class="alert-box">
                            <div class="display_flex title_box_delete">
                                <p class="title_yes_no">{{ session('delete') }}</p>
                            </div>
                            <div class="yes_no_delete">
                                <a href="" class="check_delete">Xác nhận</a>
                            
                            </div>
                        </div>
                        <div class="overlay"></div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="section" id="detail-page">
                        <div class="section-detail">
                            <div class="actions">
                                <form method="POST" action="{{route('blog.status')}}" class="form-actions" style="display:flex">
                                    @csrf
                                    <select name="actions">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Tạm dừng</option>
                                    </select>
                                    <input type="submit" name="sm_action" value="Áp dụng">
                                </form>
                            </div>
                            <div class="total_all">
                                <p class="">Tổng số bài viết </p>
                                <p class="total_all_color"> {{ $total }}</p>
                            </div>
                            <div class="table-responsive">
                                {{-- class="table list-table-wp --}}
                                <table id="myTable" class="table list-table-wp">
                                    <thead class="thead_color">

                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="tfoot-text">STT</span></td>
                                            <td><span class="tfoot-text">Tên bài viết</span></td>
                                            <td><span class="tfoot-text">Danh mục</span></td>
                                            <td><span class="tfoot-text">Lượt xem</span></td>
                                            <td><span class="tfoot-text">Ngày tạo</span></td>
                                            <td><span class="tfoot-text">Thao tác</span></td>
                                            <td><span class="tfoot-text">Trạng thái</span></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @if (!empty($data))
                                            @foreach ($data as $item)
                                            @php
                                            if ($item->deleted_at === null) {
                                                $status = 'Hoạt động';
                                            } else {
                                                $status = 'Tạm dừng';
                                            }
                                        @endphp
                                                <tr>
                                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                                    <td><span class="tbody-text">{{ $stt++ }}</h3></span>
                                                    <td><span class="tbody-text">{{ $item->name }}</span></td>
                                                    <td><span class="tbody-text">{{ $item->category->name }}</span></td>
                                                    <td><span class="tbody-text">{{ $item->total }}</span></td>
                                                    <td><span class="tbody-text">{{ $item->created_at->format('d-m-Y') }}</span></td>
                                                    <td class="clearfix">

                                                        <ul class="list-operation ">
                                                            <li><a href="{{ route('blog.edit', ['blog' => $item->id]) }}"
                                                                    title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                        aria-hidden="true"></i></a>
                                                            </li>

                                                            <li><a href="{{ route('blog.destroy', ['blog' => $item->id]) }}"
                                                                    title="Xóa" class="delete"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="tbody-text">Hoạt động</span></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot class="thead_color">
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="tfoot-text">STT</span></td>
                                            <td><span class="tfoot-text">Tên bài viết</span></td>
                                            <td><span class="tfoot-text">Danh mục</span></td>
                                            <td><span class="tfoot-text">Lượt xem</span></td>
                                            <td><span class="tfoot-text">Ngày tạo</span></td>
                                            <td><span class="tfoot-text">Thao tác</span></td>
                                            <td><span class="tfoot-text">Trạng thái</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
