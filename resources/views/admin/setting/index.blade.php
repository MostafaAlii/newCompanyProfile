@extends('admin.admin_master')

@section('pageTitle')
الاعدادات العامة
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-settings"></i>
            الاعدادات العامة
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('settings.index') }}"> الاعدادات العامة</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <form action="{{ route('settings.update','test') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Start Site Name -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_name">اسم الموقع</label>
                        <input type="text" name="site_name" id="site_name" class="form-control" placeholder="ادخل اسم الموقع" value="{{ old('site_name', $setting['site_name']) }}">
                        @error('site_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Name -->
                <!-- Start Site Title -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_title">الاسم المختصر للموقع</label>
                        <input type="text" name="site_title" id="site_title" class="form-control" placeholder="ادخل الاسم المختصر للموقع" value="{{ old('site_title', $setting['site_title']) }}">
                        @error('site_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Title -->
                <!-- Start Site Email -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_email">البريد الالكتروني للموقع</label>
                        <input type="email" name="site_email" id="site_email" class="form-control" placeholder="ادخل البريد الالكتروني للموقع" value="{{ old('site_email', $setting['site_email']) }}">
                        @error('site_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Email -->
            </div>

            <div class="row">
                <!-- Start Site Facebook Social Link -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="facebook">رابط الفيسبوك</label>
                        <input type="text" name="site_facebook" id="site_facebook" class="form-control" placeholder="ادخل رابط الفيسبوك" value="{{ old('site_facebook', $setting['site_facebook']) }}">
                        @error('site_facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Facebook Social Link -->
                <!-- Start Site Twitter Social Link -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="site_twitter">رابط تويتر</label>
                        <input type="text" name="site_twitter" id="site_twitter" class="form-control" placeholder="ادخل رابط تويتر" value="{{ old('site_twitter', $setting['site_twitter']) }}">
                        @error('site_twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Twitter Social Link -->
            </div>

            <div class="row">
                <!-- Start Site Phone Number -->
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="site_phone">رقم الهاتف</label>
                        <input type="text" name="site_phone" id="site_phone" class="form-control" placeholder="ادخل رقم الهاتف" value="{{ old('site_phone', $setting['site_phone']) }}">
                        @error('site_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Phone Number -->
                <!-- Start Site Address -->
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label for="site_address">العنوان</label>
                        <input type="text" name="site_address" id="site_address" class="form-control" placeholder="ادخل العنوان" value="{{ old('site_address', $setting['site_address']) }}">
                        @error('site_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Address -->
            </div>

            <div class="row">
                <!-- Start Site Logo -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_logo">شعار الموقع</label>
                        <input type="file" name="site_logo" id="site_logo" class="form-control site_logo_image">
                        @error('site_logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Logo -->
                <!-- Start Site Icon -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_favicon">ايقونة الموقع</label>
                        <input type="file" name="site_favicon" id="site_favicon" class="form-control site_favicon_image">
                        @error('site_favicon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Icon -->
                <!-- Start Site Home Banner -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="site_home_banner">صورة الصفحة الرئيسية</label>
                        <input type="file" name="site_home_banner" id="site_home_banner" class="form-control site_home_banner_image">
                        @error('site_home_banner')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Site Home Banner -->
            </div>

            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <img src="{{ URL::asset('uploads/setting_images/'.$setting['site_logo']) }}"  style="width: 100px" class="img-thumbnail logo-image-preview" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <img src="{{ URL::asset('uploads/setting_images/'.$setting['site_favicon']) }}"  style="width: 100px" class="img-thumbnail favicon-image-preview" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <img src="{{ URL::asset('uploads/setting_images/'.$setting['site_home_banner']) }}"  style="width: 100px" class="img-thumbnail home-banner-image-preview" alt="">
                    </div>
                </div>
            </div>

            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    // Site Logo image preview
    $(".site_logo_image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.logo-image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    // Site Favicon image preview
    $(".site_favicon_image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.favicon-image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    // Site Home Banner image preview
    $(".site_home_banner_image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.home-banner-image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection