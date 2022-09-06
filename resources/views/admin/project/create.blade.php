@extends('admin.admin_master')

@section('pageTitle')
الاقسام / اضافة قسم
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-drawer"></i>
            اضافة قسم جديد
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الاقســـام</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.store') }}">اضافة قسم جديد</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <!-- Start Store Form -->
        <form class="" method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="row">
                <!-- Start Name -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">الاســم</label>
                        <input name="name" class="form-control" value="{{ old('name') }}" type="text" placeholder="اكتب اسم القسم">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Name -->

                <!-- Start Status -->
                <div class="col-3">
                    <label for="status">حالة القســم</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status') == 1 ? 'selected' : null }}>فعــال</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غير فعــال</option>
                    </select>
                    @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <!-- End Status -->
            </div>

                <div class="form-group pt-4 text-center">
                    <button type="submit" name="submit" class="btn btn-primary">اضافة قســم</button>
                </div>
        </form>
        <!-- End Store Form -->
    </div>
</div>
@endsection

@section('js')

@endsection