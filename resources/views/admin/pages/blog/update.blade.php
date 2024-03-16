@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="title_update">
                        <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                        <a href="{{ route('blog.index') }}" class="back_create">Xem danh sách</a>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('blog.update',['blog'=>$data->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('Put')
                           
                            <div class="request_input">
                                <label for="title">Tiêu đề</label>
                                <textarea name="name" id="title" style="width: 400px; height: 100px;">{{ old('name') ? old('name') : $data->name }}</textarea>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="request_input">
                                <label for="title">Chọn danh mục </label>
                                <select class="select_list" name="category_id" id="category_id">
                                    <option value="{{ old('category_id') ? old('category_id') : $data->category_id }}">
                                        {{ old('category_id') ? App\Models\category::find(old('category_id'))->name : $data->category->name }}
                                    </option>
                                    @foreach ($category as $item)
                                        @if ( old('category_id') ? ($item->id != old('category_id')) : ($item->id != $data->category_id))
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>


                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="request_input">
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image" multiple id="upload-thumb"
                                        class="image_input image_input_main" style="display:none">
                                   

                                    <div class="image_product_box_main">
                                        <img id="image_main_add" class="image_main_add"
                                        src="{{ asset($data->image) }}">
                                    <div atr="{{ $data->id }}" class="delete-icon_main">X</div>
                                       
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="request_input">
                                <label for="content">Mô tả</label>
                                <textarea name="content" id="mytextarea" >{{ old('content') ? old('content') : $data->content }}</textarea>
                                
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" name="btn-submit" id="btn-submit" class="btn_submit">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
    
        $(document).ready(function() {
    
            $(document).on('click', '#image_main', function() {
               
                $('.image_input_main').click();
            });
    
            $('.image_input_main').change(function() {
                var newImages = this.files;
               
    
                if (newImages.length >= 1) {
    
                    var newImageElement = $('<img>');
    
                  
                    newImageElement.attr('id', 'image_main_add');
                    newImageElement.attr('class', 'image_main_add');
    
                    
                    var imageURL = URL.createObjectURL(newImages[0]);
                    newImageElement.attr('src', imageURL);
    
                    
                    $('.image_product_box_main').append(newImageElement);
                    $('.image_product_box_main').append('<div class="delete-icon_main">X</div>')
                    $('#image_main').remove();
    
                }
    
            });
    
            $(document).on('click', '.delete-icon_main', function() {
                
                $('#image_main_add').remove();
                $('.delete-icon_main').remove();
                var imgThumbPath = "{{ asset('admin/images/img-thumb.png') }}";
                $('.image_product_box_main').prepend("<img src=" + imgThumbPath +
                    " id='image_main' class='image_main_add'>");
            });
        })
    </script>
@endsection