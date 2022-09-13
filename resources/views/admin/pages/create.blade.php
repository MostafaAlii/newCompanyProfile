@extends('admin.admin_master')

@section('pageTitle')
اضافة صفحة
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="la la-plus"></i>
            اضافة صفحة
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">الصفحات</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pages.create') }}">اضافة صفحة</a></li>
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
        <form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Start Page Name & Page Link -->
            <div class="row">
                <!-- Start Page Name -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Page Name -->
                <!-- Start Page Link -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="link">الرابط</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="الرابط ادخل" value="{{ old('link') }}">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Page Link -->
            </div>
            <!-- End Page Name & Page Link -->

            <!-- Start Page Primary & Secondary Title -->
            <div class="row">
                <!-- Start Page Primary Title -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="primary_title">العنوان الرئيسى</label>
                        <input type="text" name="primary_title" id="primary_title" class="form-control" placeholder="ادخل العنوان الرئيسى" value="{{ old('primary_title') }}">
                        @error('primary_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Page Primary Title -->
                <!-- Start Page Secondary Title -->
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="secondry_title">العنوان الفرعى</label>
                        <input type="text" name="secondry_title" id="secondry_title" class="form-control" placeholder="ادخل العنوان الفرعى" value="{{ old('secondry_title') }}">
                        @error('secondry_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Page Secondary Title -->
                <!-- Start Page Sorting -->
                <div class="col-12 col-md-4">
                    <label for="sorting">ترتيب عرض الصفحة</label>
                    <select name="sorting" class="form-control">
                        <option value="1" {{ old('sorting') == 1 ? 'selected' : null }}>1</option>
                        <option value="2" {{ old('sorting') == 2 ? 'selected' : null }}>2</option>
                        <option value="3" {{ old('sorting') == 3 ? 'selected' : null }}>3</option>
                        <option value="4" {{ old('sorting') == 4 ? 'selected' : null }}>4</option>
                        <option value="5" {{ old('sorting') == 5 ? 'selected' : null }}>5</option>
                        <option value="6" {{ old('sorting') == 6 ? 'selected' : null }}>6</option>
                        <option value="7" {{ old('sorting') == 7 ? 'selected' : null }}>7</option>
                        <option value="8" {{ old('sorting') == 8 ? 'selected' : null }}>8</option>
                        <option value="9" {{ old('sorting') == 9 ? 'selected' : null }}>9</option>
                        <option value="10" {{ old('sorting') == 10 ? 'selected' : null }}>10</option>
                    </select>
                    @error('sorting')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <!-- End Page Sorting -->
            </div>
            <!-- End Page Primary & Secondary Title -->

            <!-- Start Page Description -->
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" class="form-control" placeholder="ادخل الوصف">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- End Page Description -->

            <!-- Start Status -->
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
            <!-- End Status -->

            <div class="form-group pt-2 text-center">
                <button type="submit" class="btn btn-primary">اضافة صفحة</button>
            </div>
        </form>
        <!-- End Create User Form -->
    </div>
</div>
@endsection

@section('js')

@endsection