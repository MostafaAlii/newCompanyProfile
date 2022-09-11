@extends('admin.admin_master')

@section('pageTitle')
المستخدمين / تعديل مستخدم {{$user->name}}
@endsection

@section('css')

@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-user-follow"></i>
            تعديل / {{ $user->name }}
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">المستخدمين</a></li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            تعديل / {{ $user->name }}
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <!-- Start Create User Form -->
        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Start Name -->
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" value="{{ old('name', $user->name) }}">
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
                        <input type="email" name="email" id="email" class="form-control" placeholder="ادخل البريد الالكتروني" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Email -->
            </div>

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
                        <img src="{{ $user->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="{{$user->name}}">
                    </div>
                </div>
            </div>

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
                                        <input type="checkbox" {{ $user->hasPermission($model . '_' . $map) ? 'checked' : '' }} name="permissions[]" value="{{ $model . '_' . $map }}">
                                        {{trans('permission.' . $map) . ' ' . trans('permission.' . $model)}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    <!-- End Role -->
                    @endforeach
                </div>
            </div>

            <div class="form-group pt-2 text-center">
                <button type="submit" name="submit" class="btn btn-primary">تعديل مستخدم</button>
            </div>
        </form>
        <!-- End Create User Form -->
    </div>
</div>
@endsection

@section('js')

@endsection