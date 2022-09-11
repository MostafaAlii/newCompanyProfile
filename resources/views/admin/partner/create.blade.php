@extends('admin.admin_master')

@section('pageTitle')
اضافة شريك
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="la la-plus"></i>
            اضافة شريك
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">الشركاء</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('partners.create') }}">اضافة شريك</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        @include('admin.includes._partials._errors')
        <!-- Start Create User Form -->
        <form action="{{ route('partners.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Start Name & Email -->
            <div class="row">
                <!-- Start Name -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Name -->
                <!-- Start Email -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="email">الرابط</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="الرابط ادخل" value="{{ old('link') }}">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Email -->
            </div>
            <!-- End Name & Email -->

            <!-- Start Password & Password Confirmation -->
            <div class="row pt-1">
                <div class="col-12 col-md-4">
                    <label for="status">الحالة</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : null }}>فعــال</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غير فعــال</option>
                    </select>
                    @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
            </div>
            <!-- End Password & Password Confirmation -->

            <!-- Start Image & Image Prview -->
            <div class="row pt-2">
                <!-- Start Image -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" id="image" class="form-control image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Image -->
                <!-- Start Image Preview -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <img src="{{ asset('uploads/partner_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>
                </div>
            </div>
            <!-- End Image & Image Prview -->

            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn btn-primary">اضافة شريك</button>
            </div>
        </form>
        <!-- End Create User Form -->
    </div>
</div>
@endsection

@section('js')
<script>
    // image preview
    $(".image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection