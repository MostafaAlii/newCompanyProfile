@extends('admin.admin_master')

@section('pageTitle')
المشاريــع / اضافة مشروع
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
            اضافة مشروع جديد
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">المشاريــع</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('projects.create') }}">اضافة مشروع جديد</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<div class="content-wrapper">
    <div class="content-body">
        <!-- Start Store Form -->
        <form class="" method="post" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Start Name -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">الاســم</label>
                        <input name="name" class="form-control" value="{{ old('name') }}" type="text" placeholder="اكتب اسم المشروع">
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
                        <option value="1" {{ old('status') == 1 ? 'selected' : null }}>فعــال</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : null }}>غير فعــال</option>
                    </select>
                    @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <!-- End Status -->
            </div>

            <div class=row>
                <!-- Start Category -->
                <div class="col-3">
                    <label for="category_id">القسم التابع</label>
                    <select name="category_id" class="form-control select2">
                        <optgroup label="اختر القسم التابع">
                            @forelse($categories as $category)
                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : null }}>{{$category->name}}</option>
                            @empty
                            @endforelse
                        </optgroup>
                    </select>
                    @error('category')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- End Category -->
            </div>

            <br>
            <!-- Start Description -->
            <div class=row>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">وصف المشروع</label>
                        <textarea name="description" class="form-control" rows="3">
                            {{ old('description') }}
                        </textarea>
                    </div>
                </div>
            </div>
            <!-- End Description -->

            <!-- Start Project Photo -->
                <div class="row pt-4">
                    <div class="col-12">
                        <label for="images">الصور</label>
                        <br>
                        <div class="file-loading">
                            <input type="file" name="images[]" id="project-images" class="file-input-overview" multiple="multiple">
                            @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            <!-- End Project Photo -->

            <div class="form-group pt-4 text-center">
                <button type="submit" name="submit" class="btn btn-primary">اضافة مشروع</button>
            </div>
        </form>
        <!-- End Store Form -->
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script>

</script>
<script>
    $(function(){
        // Categories Select
        $(".select2").select2({
            
        });
        // Product Image
        $('#project-images').fileinput({
            theme: "fas",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });

            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            })
    });
</script>
@endsection