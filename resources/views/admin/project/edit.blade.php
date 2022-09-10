@extends('admin.admin_master')

@section('pageTitle')
المشاريع / تعديل مشروع {{$project->name}}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endsection

@section('content')
<!-- Start Breadcrumbs -->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">
            <i class="icon-puzzle"></i>
            تعديل / {{ $project->name }}
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">المشاريع</a></li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            تعديل / {{ $project->name }}
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
        <!-- Start Store Form -->
        <form class="" method="post" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PATCH')
            <div class="row pt-1">
                <!-- Start Name -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">الاســم</label>
                        <input name="name" class="form-control" value="{{ old('name', $project->name) }}" type="text" placeholder="اكتب اسم القسم">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Name -->

                <!-- Start Status -->
                <div class="col-3">
                    <label for="status">حالة المشروع</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $project->status) == 1 ? 'selected' : null }}>فعــال</option>
                        <option value="0" {{ old('status', $project->status) == 0 ? 'selected' : null }}>غير فعــال</option>
                    </select>
                    @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <!-- End Status -->
            </div>

            <div class="row pt-1">
                <!-- Start Project Category Select -->
                <div class="col-4">
                    <div class="form-group">
                        <label for="category_id">القسم</label>
                        <select name="category_id" class="form-control select2">
                            <option value="">اختر القسم</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                            @empty
                                <option value="">لا يوجد اقسام</option>
                            @endforelse
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- Start Project Category Select -->
            </div>

            <!-- Start Project Photo -->
            <div class="row pt-1 col-4">
                <div class="form-group">
                    {{--<label for="images">الصور</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="images[]" id="" class="" multiple="multiple">
                        @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>--}}
                    @if($project->firstMedia)
                        <img src="{{ asset('images/projects/' . $project->firstMedia->file_name) }}" class="rounded-circle" width="50px" height="50px" alt="{{$project->name}}">
                    @else
                        <img src="{{ asset('images/projects/default.jpg') }}" class="rounded-circle" width="50px" height="50px" alt="default.jpg">
                    @endif
                </div>
                <br>
                <div class="custom-file">
                    <input type="file" name="images[]" class="custom-file-input" onchange="loadFile(event)" id="output">
                    <label class="custom-file-label" for="output"></label>
                </div>
            </div>
            <!-- End Project Photo -->

            <div class="row pt-1">
                <!-- Start Description -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea name="description" class="form-control" placeholder="اكتب وصف المشروع">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- End Description -->
            </div>

            <div class="form-group pt-4 text-center">
                <button type="submit" name="submit" class="btn btn-primary">تعديل مشروع</button>
            </div>
        </form>
        <!-- End Store Form -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
     };
</script>
@endsection