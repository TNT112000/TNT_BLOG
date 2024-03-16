@extends('admin.layouts.main')
@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')

            <div id="content" class="fl-right display_flex">
                <div class="col-4">
                    <div class="section" id="title-page">
                        <div class="title_update">
                            <h3 id="index" class="fl-left">Liên hệ</h3>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="section" id="detail-page">
                        <div class="section-detail">
                            <form method="POST" action="{{ route('contact.update', ['contact' => $contact->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="request_input">
                                    <label for="title">Số điện thoại</label>
                                    <input type="text" name="phone" id="title" class="with_input"
                                        value="{{ old('phone') ? old('phone') : $contact->phone }}" >
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="request_input">
                                    <label for="title">Địa chỉ email</label>
                                    <input type="text" name="email" id="title" class="with_input"
                                        value="{{ old('email') ? old('email') : $contact->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="request_input">
                                    <label for="title">Địa chỉ đường</label>
                                    <textarea name="address" id="title" style="width: 400px; height: 100px;">{{ old('address') ? old('address') : $contact->address }}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="display_flex box_btn">
                                    <button type="submit" name="btn-submit" class="btn_submit" id="btn-submit">Cập
                                        nhập</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
