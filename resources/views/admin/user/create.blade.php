@extends('admin.admin_master')

@section('pageTitle')
اضافة مستخدم
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-user-follow"></i>
            اضافة مستخدم
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">المستخدمين</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.create') }}">اضافة مستخدم</a></li>
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
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ادخل البريد الالكتروني" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Email -->
            </div>
            <!-- End Name & Email -->

            <!-- Start Password & Password Confirmation -->
            <div class="row">
                <!-- Start Password -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="ادخل كلمة المرور">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Password -->
                <!-- Start Password Confirmation -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">تاكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="ادخل تاكيد كلمة المرور">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Password Confirmation -->
            </div>
            <!-- End Password & Password Confirmation -->

            <!-- Start Image & Image Prview -->
            <div class="row">
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
                        <img src="{{ asset('uploads/user_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>
                </div>
            </div>
            <!-- End Image & Image Prview -->

            <!-- Start Permissions -->
            <div class="col-12 col-md-8">
                <lable>الصلاحيات</lable>
                <div class="form-group pt-1">
                    @php
                        $models = ['users', 'categories', 'projects', 'teams', 'partners', 'about', 'contact', 'settings'];
                        $maps = ['create', 'read', 'update', 'delete'];
                    @endphp
                    <!-- Start Role -->
                    <ul class="nav nav-justified nav-tabs" id="justifiedTab" role="tablist">
                        @foreach($models as $index=>$model)
                            <li class="nav-item">
                                <a aria-controls="{{ $model }}" aria-selected="true" class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab" href="#{{ $model }}" id="{{ $model }}-tab" role="tab">@lang('permission.' . $model)</a>
                            </li>
                        @endforeach
                    </ul>
                    @foreach($models as $index=>$model)
                        <div class="tab-content" id="justifiedTabContent">
                            <div aria-labelledby="{{$model}}-tab" class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{$model}}" role="tabpanel">
                                @foreach($maps as $map)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="permissions[]" value="{{ $model . '_' . $map }}">
                                        {{trans('permission.' . $map) . ' ' . trans('permission.' . $model)}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    <!-- End Role -->
                    @endforeach
                </div>
            </div>
            <!-- End Permissions -->

            <div class="form-group pt-2 text-center">
                <button type="submit" name="submit" class="btn btn-primary">اضافة مستخدم</button>
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